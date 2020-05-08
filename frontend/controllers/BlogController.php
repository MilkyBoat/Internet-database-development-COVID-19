<?php

namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use common\models\Article;
use common\models\Category;
use common\models\ArticleTag;

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
        return $this->render('view', [
            'article' => $article,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
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
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


}
