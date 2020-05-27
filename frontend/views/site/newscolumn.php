<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by Sun Jiayi 1810756,202005010
 */

use yii\helpers\Html;
use common\models\CovNews;
use yii\data\Pagination;
use yii\web\Response;
use yii\web\Controller;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<?= Html::cssFile('@web/news/css/font-awesome.min.css') ?>
<?= Html::cssFile('@web/news/css/fontawesome-all.min.css') ?>
<?= Html::cssFile('@web/news/css/material-design-iconic-font.min.css') ?>
<?= Html::cssFile('@web/news/css/animate.css') ?>
<?= Html::cssFile('@web/news/css/hamburgers.min.css') ?>
<?= Html::cssFile('@web/news/css/animsition.min.css') ?>
<?= Html::cssFile('@web/news/css/util.min.css') ?>
<?= Html::cssFile('@web/news/css/main.css') ?>
<?= Html::jsFile('@web/news/js/jquery-3.2.1.min.js') ?>
<?= Html::jsFile('@web/news/js/animsition.min.js') ?>
<?= Html::jsFile('@web/news/js/popper.js') ?>
<?= Html::jsFile('@web/news/js/bootstrap.min.js') ?>
<?= Html::jsFile('@web/news/js/main.js') ?>

<div class="news-index">
	<!-- Page heading -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<h2 class="f1-l-1 cl2">
					相关新闻
				</h2>
			</div>			
		</div>
	</div>
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(../../../frontend/web/news/img/huo.png);">
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                专栏
                            </a>							
							<h3 class="how1-child2 m-t-14 m-b-10">                                
								<a href="<?= Url::toRoute(['site/column01']); ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									抗疫传奇之火神山雷神山
								</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(../../../frontend/web/news/img/zhong.jpg);">
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">	
                            <a class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                专栏
                            </a>						
							<h3 class="how1-child2 m-t-14 m-b-10">                               
								<a href="<?= Url::toRoute(['site/column02']); ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									抗疫传奇之钟南山
								</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(../../../frontend/web/news/img/kangyi.jpeg);">
                        
                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								    专栏
							    </a>							
							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="<?= Url::toRoute(['site/column03']); ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									2020年将是史书上浓墨重彩的一笔
								</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-18 how-overlay1" style="background-image: url(../../../frontend/web/news/img/image2.jpg);">
						<div class="container s-full flex-col-e-c p-b-58">
							<a href="<?= Url::toRoute(['site/news']); ?>" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
								···点击去看更多新闻···
							</a>							
						</div>
					</div>		
				</div>
			</div>
		</div>
	</section>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>
</div>