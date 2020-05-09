<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<?= Html::cssFile('@web/public/index.css') ?>
<?= Html::cssFile('@web/public/css/bootstrap.min.css') ?>
<?= Html::cssFile('@web/public/css/font-awesome.min.css') ?>
<?= Html::cssFile('@web/public/css/animate.min.css') ?>
<?= Html::cssFile('@web/public/css/owl.carousel.css') ?>
<?= Html::cssFile('@web/public/css/owl.theme.css') ?>
<?= Html::cssFile('@web/public/css/owl.transitions.css') ?>
<?= Html::cssFile('@web/public/css/style.css') ?>
<?= Html::cssFile('@web/public/css/responsive.css') ?>
<?= Html::jsFile('@web/js/jquery.min.js') ?>
<?= Html::jsFile('public/js/bootstrap.min.js') ?>
<?= Html::jsFile('public/js/owl.carousel.min.js') ?>
<?= Html::jsFile('public/js/jquery.stickit.min.js') ?>
<?= Html::jsFile('public/js/menu.js') ?>
<?= Html::jsFile('public/js/scripts.js') ?>

<div class="blog-view">
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post">
                        <div class="post-thumb">
                            <a href="blog.html"><img src="<?= Url::to($article->getImage()) ?>" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= Url::toRoute(['blog/category', 'id' => $article->category->id]) ?>"> <?= $article->category->title ?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]) ?>"><?= $article->title ?></a></h1>


                            </header>
                            <div class="entry-content">
                                <?= $article->content ?>
                            </div>
                            <div class="decoration">
                                <a href="#" class="btn btn-default">Decoration</a>
                                <a href="#" class="btn btn-default">Decoration</a>
                            </div>

                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <?= $article->createdBy->username ?> <?= $article->getDate(); ?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <div class="leave-comment">
                            <!--leave comment-->
                            <h4>Leave a reply</h4>
                            <?php if (Yii::$app->session->getFlash('comment')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= Yii::$app->session->getFlash('comment'); ?>
                                </div>
                            <?php endif; ?>
                            <?php $form = \yii\widgets\ActiveForm::begin([
                                'action' => ['blog/comment', 'id' => $article->id],
                                'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']
                            ]) ?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?= $form->field($commentForm, 'comment')->textarea(['class' => 'form-control', 'placeholder' => 'Write Message'])->label(false) ?>
                                </div>
                            </div>
                            <button type="submit" class="btn send-btn">Post Comment</button>
                            <?php \yii\widgets\ActiveForm::end(); ?>
                        </div>
                        <!--end leave comment-->
                    <?php endif; ?>

                    <?php if (!empty($comments)) : ?>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="bottom-comment">
                                <!--bottom comment-->


                                <div class="comment-img">
                                    <img class="img-circle" src="<?= Yii::getAlias('@web'); ?>/public/images/comment-img.jpg" alt="">
                                </div>

                                <div class="comment-text">
                                    <a href="#" class="replay btn pull-right"> Replay</a>
                                    <h5><?= $comment->user->username; ?></h5>

                                    <p class="comment-date">
                                        <?= $comment->getDate(); ?>
                                    </p>


                                    <p class="para"><?= $comment->text; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>



                    <!-- end bottom comment-->


                    
                </div>
                <div class="col-md-4" data-sticky_column>
                    <div class="primary-sidebar">

                        <aside class="widget">
                            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
                            <?php foreach ($popular as $article) : ?>
                                <div class="popular-post">


                                    <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>" class="popular-img"><img src="<?= Url::to($article->getImage()) ?>" alt="">

                                        <div class="p-overlay"></div>
                                    </a>

                                    <div class="p-content">
                                        <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>" class="text-uppercase"><?= $article->title ?></a>
                                        <span class="p-date"><?= $article->getDate() ?></span>

                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </aside>
                        <aside class="widget pos-padding">
                            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
                            <?php foreach ($recent as $article) : ?>
                                <div class="thumb-latest-posts">


                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>" class="popular-img"><img src="<?= Url::to($article->getImage()) ?>" alt="">
                                                <div class="p-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="p-content">
                                            <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>" class="text-uppercase"><?= $article->title ?></a>
                                            <span class="p-date"><?= $article->getDate(); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </aside>
                        <aside class="widget border pos-padding">
                            <h3 class="widget-title text-uppercase text-center">Categories</h3>
                            <ul>
                                <?php foreach ($categories as $category) : ?>
                                    <li>
                                        <a href="<?= Url::toRoute(['blog/category', 'id' => $category->id]); ?>"><?= $category->title ?></a>
                                        <span class="post-count pull-right"> (<?= $category->getArticlesCount(); ?>)</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>