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
		<div class="bg-img1 size-a-18 how-overlay1" style="background-image: url(../../../frontend/web/news/img/huo.png);">
			<div class="container h-full flex-col-e-c p-b-58">
				<a href="#" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
					专栏
				</a>

				<h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
					火神山雷神山
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
								“与雷神山医院相伴，永生难忘！”4月15日晚，中建三局员工章干抑制不住一整天激动的心情，发了这样一条朋友圈。从建设到维保，他在雷神山医院战斗了79天。
							</p>

							<p class="f1-s-11 cl6 p-b-25">
							　　当天上午，雷神山医院举行休舱仪式，站在建设者代表队伍里，骄傲和自豪从章干的内心深处升腾：“时间作证，我们把不可能变成了可能！”
							</p>

							<p class="f1-s-11 cl6 p-b-25">
							　　为了打赢湖北保卫战、武汉保卫战，4万多名医护人员逆行出征，约4万名建设者从八方赶来，并肩奋战，抢建火神山和雷神山医院。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　他们日夜鏖战，与病毒竞速，创造了10天左右时间建成两座传染病医院的“中国速度”！
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　他们不畏风险，同困难斗争，充分展现团结起来打硬仗的“中国力量”！
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　武汉不会忘记，历史终将铭记这个英雄的群体——火线上的建设者！
							</p>
							<strong>　　速度——</strong>
							<strong>　　“早一分钟建成医院，就能早一分钟挽救生命”</strong>
							<p class="f1-s-11 cl6 p-b-25">
							　　“这是救命工程，早一分钟建成医院，就能早一分钟挽救生命！”中建集团党组书记周乃翔表示。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　中建三局牵头火神山医院建设。1月23日晚10时，队伍火速进场，一场和时间赛跑的战斗打响。“我们进场时，图纸还在争分夺秒的设计之中。”中建三局党委副书记、总经理陈卫国说。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　很快，寒风凛冽的知音湖畔，变成了热火朝天的施工现场，轮班作业，24小时施工。管理人员从160人增加到1500余人，作业人员从240人到1.2万多人，大型机械设备、车辆从300台到近千台，快速推进局面迅速形成。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　作为火神山医院安装项目部总工程师，金晖白天在现场协调生产，晚上到设计院沟通优化设计方案，连续10天高强度作战……
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　湖北十堰的30岁小伙儿徐飞，刚到家3天，大年初一接到返岗通知，二话不说驾车4个多小时，直奔火神山医院工程现场。他召集工友用三天的时间赶制出火神山医院所需要的暖通风管……
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　1月25日，火神山医院激战正酣，武汉市决定再建一所雷神山医院，中建集团独立承建，开启“双线作战”模式。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　“这几乎是不可能完成的任务！”有专家表示，3.39万平方米的火神山医院，按照常规建设至少要2年，
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　搭建临时建筑都得1个月，更何况还有一个两倍于火神山医院体量、工期却与之相当的雷神山医院。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　陈应是医院智能设备安装的负责人，现场留给她的时间只有48个小时，“医院设计了大量基于5G和云平台技术的诊疗信息化系统，我们运用BIM技术现场按编号拼装，平时需要2个月安装调试的工作我们48小时就完成了；36万米各类管线、6000多个信息点位通过模拟铺搭，现场一次安装到位，大大加快了施工进度。”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　2月2日至6日，建筑工人钟巍巍带着父亲、哥哥来到工地，每天连续施工20多个小时，吃饭蹲在工地上，困了靠在材料堆上打个盹，下雨时就钻到管子里睡十几分钟。材料一运到，马上又爬出来干活。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　时间紧、任务重、人员物资有限、参与单位众多，如何协同作战？中国建筑集团党组副书记、总经理郑学选介绍，制定“小时制”作战地图，倒排工期，将每一步施工计划精确到小时乃至分钟，大量运用装配式建造、BIM建模、智慧建造等前沿技术，根据现场情况实时纠偏，使数百家分包、上千道工序、4万多名建设者都能统一协调、密切配合，确保规划设计、方案编制、现场施工、资源保障无缝衔接、同步推进。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　1月23日10时，连夜基础施工；1月24日除夕，完成场平；1月25日，正式开工……2月2日，火神山医院交付使用。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　1月25日16时，项目启动；1月26日，开始场平等工作；1月27日，正式开工……2月6日，雷神山医院开展验收并逐步移交。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　在24小时“云监工”的注视下，火神山医院、雷神山医院拔地而起——这是与疫情赛跑的“中国速度”。
							</p>
							<strong>　　难度——</strong>
							<strong>　　“危难险重，首战用我，用我必胜！”</strong>
							<p class="f1-s-11 cl6 p-b-25">
							　　尽管有心理准备，进场施工时，还是发现困难远超想象。带着200多人的场地平整团队进场后，中建三局的余南山倒吸一口凉气：超过7万平方米的场地上，高差最大处近10米，还有大片芦苇荡要清淤、鱼塘要回填、既有建筑物要拆除，土方开挖、砂石换填量近40万立方米，而这些必须在两天之内完成！
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　郑学选说，建设者们要在极短时间内完成人力召集、资源调集、图纸细化等工作，任何一个环节都绝不能出问题，每天都处于极限作战的状态。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　受疫情和春节假期的影响，工人、材料、设备不足，是施工面临最大的难题。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　在火神山医院工地协调人力资源的韩建英，每天要接打200多个电话：“必须调动一切资源帮助工友们来武汉上岗，很多时候要派车到外地一个个接。”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　“危难险重，首战用我，用我必胜！举全集团之力，确保迅速建成火神山、雷神山医院！”周乃翔率工作组从北京来到武汉，统筹解决人员、物资、资金等方面的关键问题，并组织协调11家下属单位超4000人驰援建设。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　依托中建集团全产业链，2500余台大型设备及运输车辆、4900余个集装箱、20万平方米的防渗膜，以及大量的电缆电线、配电箱柜、卫生洁具等物资在短短几天里抵达武汉，为医院建设的全面提速提供了保障。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　两所医院是应急工程，往往“计划赶不上变化”。雷神山医院3次扩容，面积从5万平方米增加到7.99万平方米，火神山医院前后经历了5次方案变更。“记忆最深刻的是火神山医院交付前一天，晚上8点多，根据防疫需要对功能分区进行再调整。”陈卫国说。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　传染病医院施工的精细度要求极高，配套建设污水处理站和垃圾焚烧池，任何有毒气体、污染水源、医疗垃圾都必须全程封闭处理。“决不让污水渗漏出去！”项目技术负责人闵红平举例，仅仅为了防止可能夹带病毒的雨水渗入地下，医院隔离区地面全部硬化处理，设置有混凝土基层、防渗膜和钢筋混凝土地面层三道防护，确保了雨水全部进入院内调蓄池，经消毒后再排入城市污水系统。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　4万多名建设者大规模聚集在工地，疫情防控是一道严峻考验。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　火神山医院项目为此专门建立了“5+3+8”的防疫模式，“5”即在办公区、工人生活区设置5处固定的红外线测温仪，“3”即在施工现场设置3处流动测温点，“8”即8位管理人员随身携带测温仪现场巡查测温，确保所有作业人员每天监测体温不少于4次。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　陈卫国介绍：“我们从健全体系入手，实现测温、消毒和安全卫生三个‘全覆盖’，尽一切可能堵塞漏洞。”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　急难险重，党员带头。工地上，14个临时党支部、14支党员突击队、2688名党员带领3万余名建设者日夜鏖战。雷神山医院项目临时党支部党员先锋岗负责人刘军安说，在这场没有硝烟的战役中，处处高扬的党旗给了人们最大的鼓舞。
							</p>
							<strong>　　温度——</strong>
							<strong>　　“他们为这场战斗拼过命，他们就是英雄！”</strong>
							<p class="f1-s-11 cl6 p-b-25">
							　　“我们已经平安到家啦！感谢这段时间的悉心照顾！”3月22日晚上8点，湖北襄阳籍劳务工人谭永亮顺利返乡，在微信群里向留观点负责人张华报平安。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　谭永亮“暂住”14天的长江文创产业园项目留观点，由工人宿舍改装而成。每间宿舍内，床铺被子、生活用品一应俱全，工作人员将热菜热饭、水果、牛奶等送上门。同时严格落实政府疫情防控“双测温两报告”制度，创新采取“临时社区”管理模式，统一纳入其所在社区的疫情防控体系。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　像这样的留观点，“两山”医院主承建单位中建三局共设置36个，安置了2489名工人，配备管理人员300余名，24小时提供服务。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　“我们专门对无线网络进行多次扩容，还设立了‘读书角’，购置工友们欢迎的报刊书籍。同时还提供上门代购、心理辅导、免费理发、集体生日等服务。”张华说。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　援建雷神山医院的工友邹秋隆，对14天的集中休整观察生活，同样感到满意：“我们是被当做英雄对待的，吃、住、用，都安排得很好。”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　邹秋隆随着中建五局援建“两山”医院的工程队返回长沙隔离。生活起居之外，隔离点增派了11名医务人员，负责对留观人员进行体温检测、心理疏导等服务。“生活各种需求一一满足，还有医疗队24小时在岗，给我们测体温、熬中药，退场前还给我们专门做了核酸检测，让我们对自己的身体健康更放心。”中建五局三公司援建武汉雷神山医院现场商务负责人胡平说。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　根据疫情防控要求，14天留观期满后，留观点安排所有工友进行2次核酸检测，所在社区卫生服务中心开具解除留观证明。为保证参建工友返乡返岗顺利，张华等留观点负责人还要在与各方的沟通解释上下功夫，帮助参建工友们取得社区接收等证明材料，随后分批有序地安排工友们返乡返岗。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　“按照财政部、国家卫健委对一线医护人员的补贴标准，在留观期内，为工友发放每人每天300元补贴。14天留观期满后，对按疫情防控部署总要求仍不能返乡返岗的工友，考虑到他们仍没有收入这一客观事实，又每人给予了2540元的一次性临时救助。”中建三局商务部经理田军介绍。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　“你们和医护人员一样，都是抗疫的英雄！”2月28日上午，深圳市福田区工商联党组书记石佑君一行来到健康驿站，慰问21名武汉火神山医院建设者及其家属，送去防疫和生活物资。
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　最近，一张张“两山”医院建设场景的定制明信片，陆续寄到建设者手上。有工友拿到明信片后直言：“这个比工资还重要！”
							</p>
							<p class="f1-s-11 cl6 p-b-25">
							　　“他们为这场战斗拼过命，他们就是英雄！”中建三局党委书记、董事长陈文健说。休舱仪式结束，章干和同事特意走到“武汉雷神山医院”七个大字前合影。前排同事拉起红色横幅，上面写着：召之即来，来之能战，战之必胜！
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