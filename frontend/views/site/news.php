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
				<h2 style="padding-bottom:20px;font-family:华文中宋;" portletmode="simpleColumnAnchor">
					<span class="Column_Anchor">相关新闻</span> <img src="news/img/covid19.jpg" style="width:100px;">
				</h2>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
	
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
					<?php $CovNewss = CovNews::find()->orderBy('pubdate DESC')->all(); ?>
					<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
							$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?>
					
					<?php foreach ($articles as $CovNews) : ?>
						<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image1.jpg" style="width:1050px;"></a>
						
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="how-txt1 size-a-6 f1-l-1 cl5 hov-cl10 trans-03">
									<?= Html::encode("· {$CovNews->title}") ?>
								</a>
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
					
				</div>
				<!--2-->
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
							$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
					<?php foreach ($articles as $CovNews) : ?>
						<a href="<?= Url::toRoute(['site/newsdetail', 'id' => (($CovNews->id)+1)]); ?>"><img src="news/img/image2.jpg" style="width:250px;"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">							
							<h3 class="how1-child2 m-t-14">
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => (($CovNews->id)+1)]); ?>" class="how-txt1 size-h-1 f1-m-1 cl5 hov-cl10 trans-03">
									<?= Html::encode("· {$CovNews->title}") ?>
								</a>
							</h3>
						</div>
						<div class="cl8 txt-center p-b-17">
							<a class="f1-s-4 cl8 hov-cl10 trans-03">
								Date
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								<?= Html::encode("{$CovNews->pubDate}") ?>
							</span>
						</div>

					<?php endforeach; ?>
				</div>
				<!--3-->
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
						$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
					<?php foreach ($articles as $CovNews) : ?>
						<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image3.jpg" style="width:250px;"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<h3 class="how1-child2 m-t-14">
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="how-txt1 size-h-1 f1-m-1 cl5 hov-cl10 trans-03">
									<?= Html::encode("· {$CovNews->title}") ?>
								</a>								
							</h3>
						</div>
						<div class="cl8 txt-center p-b-17">
							<a class="f1-s-4 cl8 hov-cl10 trans-03">
								Date
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								<?= Html::encode("{$CovNews->pubDate}") ?>
							</span>
						</div>
					<?php endforeach; ?>
				</div>
				<!--4-->
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
							$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
					<?php foreach ($articles as $CovNews) : ?>
						<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image4.jpg" style="width:250px;"></a>
						
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">							
							<h3 class="how1-child2 m-t-14">
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="how-txt1 size-h-1 f1-m-1 cl5 hov-cl10 trans-03">
									<?= Html::encode("· {$CovNews->title}") ?>
								</a>							
							</h3>
						</div>
						<div class="cl8 txt-center p-b-17">
							<a class="f1-s-4 cl8 hov-cl10 trans-03">
								Date
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								<?= Html::encode("{$CovNews->pubDate}") ?>
							</span>
						</div>
					<?php endforeach; ?>
				</div>
				<!--5-->
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
							$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
					<?php foreach ($articles as $CovNews) : ?>
						<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image5.png" style="width:250px;"></a>						

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">							
							<h3 class="how1-child2 m-t-14">
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="how-txt1 size-h-1 f1-m-1 cl5 hov-cl10 trans-03">
									<?= Html::encode("· {$CovNews->title}") ?>
								</a>							
							</h3>
						</div>
						<div class="cl8 txt-center p-b-17">
							<a class="f1-s-4 cl8 hov-cl10 trans-03">
								Date
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								<?= Html::encode("{$CovNews->pubDate}") ?>
							</span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-110 p-b-25">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item 1-->
							<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
								$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
							<?php foreach ($articles as $CovNews) : ?>
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image6.jpg" style="width:320px;"></a>

								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?= Html::encode("· {$CovNews->title}") ?>
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											Date
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?= Html::encode("{$CovNews->pubDate}") ?>
										</span>
									</div>
									
									<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-s-3 cl9 hov-cl10 trans-03">
										Read More										
									</a>
								</div>
							<?php endforeach; ?>

							<!-- Item 2-->
							<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
								$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
							<?php foreach ($articles as $CovNews) : ?>
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image7.jpg" style="width:320px;"></a>								

								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?= Html::encode("· {$CovNews->title}") ?>
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											Date
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?= Html::encode("· {$CovNews->pubDate}") ?>
										</span>
									</div>

									<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-s-3 cl9 hov-cl10 trans-03">
										Read More										
									</a>
								</div>
							<?php endforeach; ?>

							<!-- Item 3-->
							<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
								$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
							<?php foreach ($articles as $CovNews) : ?>
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image8.jpg" style="width:320px;"></a>
								
								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?= Html::encode("· {$CovNews->title}") ?>
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											Date
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?= Html::encode("· {$CovNews->pubDate}") ?>
										</span>
									</div>									

									<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-s-3 cl9 hov-cl10 trans-03">
										Read More										
									</a>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item 4-->
							<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
								$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
							<?php foreach ($articles as $CovNews) : ?>
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image9.jpg" style="width:320px;"></a>

								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?= Html::encode("· {$CovNews->title}") ?>
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											Date
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?= Html::encode("· {$CovNews->pubDate}") ?>
										</span>
									</div>									

									<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-s-3 cl9 hov-cl10 trans-03">
										Read More										
									</a>
								</div>
							<?php endforeach; ?>

							<!-- Item 5-->
							<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
								$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
							<?php foreach ($articles as $CovNews) : ?>
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image10.jpg" style="width:320px;"></a>								

								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?= Html::encode("· {$CovNews->title}") ?>
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											Date
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?= Html::encode("· {$CovNews->pubDate}") ?>
										</span>
									</div>									

									<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-s-3 cl9 hov-cl10 trans-03">
										Read More										
									</a>
								</div>
							<?php endforeach; ?>

							<!-- Item 6-->
							<?php $count = CovNews::find()->count(); $pagination = new Pagination(['totalCount' => $count,'pageSize' => 1]);
								$articles = CovNews::find()->offset($pagination->offset)->limit($pagination->limit)->all();?> 
							<?php foreach ($articles as $CovNews) : ?>
								<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>"><img src="news/img/image11.jpg" style="width:320px;"></a>
								
								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?= Html::encode("· {$CovNews->title}") ?>
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											Date
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?= Html::encode("· {$CovNews->pubDate}") ?>
										</span>
									</div>
									<a href="<?= Url::toRoute(['site/newsdetail', 'id' => $CovNews->id]); ?>" class="f1-s-3 cl9 hov-cl10 trans-03">
										Read More
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Pagination -->
					<div class="flex-wr-c-c m-rl--7 p-t-28">
						<ul class="wp_paging clearfix">
						总共&nbsp;<?= Html::encode("{$count}") ?>&nbsp;条新闻&nbsp;<?php  echo LinkPager::widget(['pagination' => $pagination]);?>
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
	<?php //endforeach; ?>
</div>