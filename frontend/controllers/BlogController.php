<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200509
 */

namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use common\models\Article;
use common\models\Category;
use common\models\ArticleSearch;
use common\models\ArticleTag;
use common\models\CommentFormB;
use yii\web\UploadedFile;
use common\models\Tag;

/**
 * Site controller
 */
class BlogController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */


    public function actionView($id)
    {
        $article = Article::findOne($id);

        $popular = Article::getPopular();

        $recent = Article::getRecent();

        $categories = Category::find()->all();

        $comments=$article->getArticleComments();
        $commentForm= new CommentFormB();

        $article->viewedCounter();
        
        return $this->render('view', [
            'article' => $article,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'comments'=>$comments,
            'commentForm'=>$commentForm
        ]);
    }

    public function actionMypost()
    {
        $this->layout='blog';
        $searchModel = new ArticleSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->creator(Yii::$app->user->id)->latest(),
        ]);

        return $this->render('mypost', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionInfo($id)
    {
        $this->layout="blog";
        return $this->render('info', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $this->layout="blog";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionBlog()
    {

        $this->layout='blog';
        $data = Article::getAll(5);

        $popular = Article::getPopular();

        $recent = Article::getRecent();

        $categories = Category::find()->all();

 
        

        return $this->render("blog", [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
        ]);
    }

    public function actionCategory($id)
    {
        $data = Category::getArticlesByCategory($id);

        $popular = Article::getPopular();

        $recent = Article::getRecent();

        $categories = Category::find()->all();

        return $this->render("category", [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
        ]);
    }

    public function actionCreate()
    {
        $this->layout='blog';
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['info', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSetImage($id)
    {
        $this->layout='blog';
        $model = new \common\models\ImageUpload();

        if (Yii::$app->request->isPost) {

            $article = $this->findModel($id);

            $model->image = UploadedFile::getInstance($model, 'image');

            if ($article->saveImage($model->uploadFile($model->image, $article->image))) {
                return $this->redirect(['info', 'id' => $article->id]);
            }
        }

        return $this->render('image', ['model' => $model]);
    }

    public function actionSetCategory($id)
    {
        $this->layout='blog';
        $article = $this->findModel($id);

        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        $selectedCategory = $categories[1];

        if (Yii::$app->request->isPost) {
            $category = Yii::$app->request->post('category');
            if ($article->saveCategory($category)) {
                return $this->redirect(['info', 'id' => $article->id]);
            }
        }


        return $this->render('scategory', [
            'article' => $article,
            'selectedCategory' => $selectedCategory,
            'categories' => $categories
        ]);
    }

    public function actionSetTags($id)
    {
        $this->layout='blog';
        $article = $this->findModel($id);
        var_dump($article->tags);die;

        $selectedTags = $article->getSelectedTags();
        $tags = ArrayHelper::map(Tag::find()->all(), 'id', 'title');

        if (Yii::$app->request->isPost) {
            $tags = Yii::$app->request->post('tags');
            $article->saveTags($tags);
            return $this->redirect(['info','id'=>$article->id]);
        }

        return $this->render('tags', [
            'selectedTags' => $selectedTags,
            'tags' => $tags
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['mypost']);
    }

    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionComment($id)
    {
        $model = new CommentFormB();
        
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['blog/view','id'=>$id]);
            }
        }
    }
}
