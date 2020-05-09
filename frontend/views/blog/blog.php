<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200509
 */

use yii\widgets\LinkPager;
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

<div class="site-blog">
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php foreach ($articles as $article) : ?>

                        <article class="post">
                            <div class="post-thumb">
                                <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>"><img src="<?= Url::to($article->getImage()) ?>" alt=""></a>

                                <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                            <div class="post-content">
                                <header class="entry-header text-center text-uppercase">
                                    <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]); ?>"><?= $article->category->title; ?> </a></h6>

                                    <h1 class="entry-title"><a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>"><?= $article->title ?></a></h1>


                                </header>
                                <div class="entry-content">
                                    <p><?= $article->description ?>
                                    </p>

                                    <div class="btn-continue-reading text-center text-uppercase">
                                        <a href="<?= Url::toRoute(['blog/view', 'id' => $article->id]); ?>" class="more-link">Continue Reading</a>
                                    </div>
                                </div>
                                <div class="social-share">
                                    <span class="social-share-title pull-left text-capitalize" style="margin">By <a href="#"> <?=$article->createdBy->username?></a><span style="margin-left:10px"><?= $article->getDate() ?></span></span>
                                    <ul class="text-center pull-right">
                                        <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed ?>
                                    </ul>
                                </div>
                            </div>
                        </article>


                    <?php endforeach; ?>

                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                    ?>
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
    <!-- end main content-->
</div>