<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by Sun Jiayi 1810756,202005010
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
		<div class="bg-img1 size-a-18 how-overlay1" style="background-image: url(../../../frontend/web/news/img/zhong.jpg);">
			<div class="container h-full flex-col-e-c p-b-58">
				<a href="#" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
					专栏
				</a>

				<h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
					钟南山
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
								钟南山（1936年10月-），福建厦门人，毕业于北京大学，中国工程院院士，著名呼吸病学专家，现任国家呼吸系统疾病临床医学研究中心主任，国家卫健委高级别专家组组长。[4]他长期从事呼吸内科的医疗、教学、科研工作，重点开展哮喘、慢阻肺疾病、间质性肺炎等呼吸系统疑难杂症方面的研究。其在2003年非典型肺炎（SARS）肆虐时期主持了广东省的非典防治工作，是中国抗击非典型肺炎的领军人物。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
								1月20日，历史或将记住，对于防控“武汉肺炎”疫情而言，这是具有转折意义的一天。
							</p>

							<p class="f1-s-11 cl6 p-b-25">
								肯定存在人传人，14名医务人员感染，病毒很可能来自野味……钟南山接受采访时的回答，改变了人们的认知，也在很大程度上改变了局面。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
								“看到钟南山就安心了”“有钟南山在，稳住我们不慌”……在这次重大公共卫生事件中，84岁的他临危受命，又一次扮演了关键角色。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
								人们自然而然地，想到了17年前——
							</p>
							<p class="f1-s-11 cl6 p-b-25">
								“按照你们的看法，是不是疫情已经得到了控制？”“什么现在已经控制？根本就没有控制！”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							“中国医护人员的防护有没有到位？”“没有！”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							那是2003年的4月，北京。面对中外记者，钟南山的“耿直”，引来全国哗然。很快，卫生部和北京市政府的主要领导被撤换。我国抗非战役打开了新局面。
							</p>

							<p class="f1-s-11 cl6 p-b-25">
							在2015年出版的《钟南山传》里， 透露了当年的一个细节。2003年清明节，钟南山与家人一起为父母亲扫墓。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							“爸爸，怎么办？我想说出事实，可又不能……”他双手下意识地握在胸前，喃喃低语。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							心中纠结，可想而知。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							钟南山出生于1936年10月20日。以年轻人热衷的星座划分，他是天秤座。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							这一星座，以擅长平衡“著称”。一边是听话，一边是人命——钟南山，不愿意平衡。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							2003年4月，钟南山接受央视《面对面》采访。王志问他：“你关心政治吗？”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							他没有正面回答：“我只想搞好自己的业务工作，以及做好防治疾病的工作，这本身就是我们最大的政治。一个人在他的岗位上能够做到最好，这就是他的最大政治。”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							钟南山赶赴武汉金银潭医院了解病人收治情况。通讯员苏越明 摄公开质疑非典病原是衣原体，请缨“将最危重的病人送到我们这里来”，创下最高的非典危重病人抢救成功率……钟南山在自己的岗位上做到了最好，也因此获得了极高声誉。年度“感动中国人物”、广东省委省政府授予的唯一一项特等功、广州市授予的“抗非英雄”、国内卫生系统的最高荣誉称号——白求恩奖章……
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							挺身而出，冒死犯险。那一年，他67岁。建议在全国展开PM2.5监测；养殖业滥用抗生素普遍，我不吃又肥又大的鱼；医生工资不能与创收挂钩；中药注射剂“良莠不齐”……SARS过后，钟南山仍然以敢说著称。2016年，钟南山80岁。那年生日，他收到一份礼物。一幅字，四个字，“敢医敢言”。这份礼物，一直挂在他的办公室里。
							</p>
							<strong>-追梦狂人-</strong>
							<p class="f1-s-11 cl6 p-b-25">
							“在我的生活中，对我影响最大的是我的父亲钟世藩。”
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