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
	
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
					<?php $CovNewss = CovNews::find()->orderBy('pubdate DESC')->all(); ?>
					<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 10]);
							$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?>
					
					<?php foreach ($articles as $CovNews) : ?>
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<h3 class="how1-child2 m-t-14 m-b-10">
                                <a class="how-txt1 size-a-6 f1-m-1 cl5 hov-cl10 trans-03" href="<?= Html::encode("{$CovNews->sourceUrl}") ?>">
                                    <?= Html::encode("·{$CovNews->title}·") ?>
                                </a>
							</h3>
                            <h3 class="how1-child2 m-t-10 m-b-10">
                                <?= Html::encode("{$CovNews->summary}") ?>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									Date
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>
									
								<span class="f1-s-3 cl11">
									<?= Html::encode("{$CovNews->pubDate}") ?>
								</span>
							</span>
						</div>
					<?php endforeach; ?>

					<!-- Pagination -->
					<div class="flex-wr-c-c m-rl--7 p-t-28">
                        <ul class="wp_paging clearfix">
						    总共&nbsp;<?= Html::encode("{$count}") ?>&nbsp;条新闻&nbsp;
						</ul>
						<ul class="wp_paging clearfix">
						    <?php  echo LinkPager::widget(['pagination' => $pagination]);?>
						</ul>
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