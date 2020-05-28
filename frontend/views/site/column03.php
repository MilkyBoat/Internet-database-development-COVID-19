<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 孙家宜 1810756,202005010
 */

use yii\widgets\LinkPager;
use common\models\CovNews;
use yii\web\Response;
use yii\web\Controller;
use yii\helpers\Url;
use yii\helpers\Html;


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


<div class="site-newsdetail">
	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<h2 class="f1-l-1 cl2">
					专栏
				</h2>
			</div>			
		</div>
	</div>
			
	<!-- Content -->
	<section class="bg0 p-b-70 p-t-5">
		<!-- Title -->
		<div class="bg-img1 size-a-18 how-overlay1" style="background-image: url(../../../frontend/web/news/img/kangyi.jpeg);">
			<div class="container h-full flex-col-e-c p-b-58">
				<a href="#" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
					专栏
				</a>

				<h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
					后世记载，荆楚大疫
				</h3>
			</div>
		</div>

		<!-- Detail -->
		<div class="container p-t-82">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-100">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<p class="f1-s-11 cl6 p-b-25">
							后世记载：
							</p>

							<p class="f1-s-11 cl6 p-b-25">
							已亥末，庚子鼠年。
							</p>

							<p class="f1-s-11 cl6 p-b-25">
							荆楚大疫。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							为一国而封一城。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							有医甲钟南山
							</p>
							
							<p class="f1-s-11 cl6 p-b-25">
							携雷火二神，率三十万白衣
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							战疫区
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							誓守生死玄关。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							大将李文亮以身殉国
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							举国悲乎。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							众白衣，死战不退
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							誓死保我华夏。
							</p>							
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