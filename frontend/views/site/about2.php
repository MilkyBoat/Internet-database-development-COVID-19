<?php


/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


?>

<?php echo Html::cssFile('@web/css/default.css');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta charset='UTF-8'>
	<style>
		*{
			margin:0;
			padding: 0;
		}
		.box{
			position:absolute;
			left:410px;
			top: 132px;/*框在页面里的位置*/
			border:10px solid white;
			box-shadow:0px 0px 10px 5px #aaa;
			margin:auto;
			margin-top:10px;
			background-repeat: no-repeat;
			background-size: cover;
			background-size: 100% 100%;
		}
		/*.box img{
			width: 900px;
			height: 340px;
		}*/
		#pic{
			width:960px;
			height:480px;
			background-repeat: no-repeat;
			background-size: 100% 100%;
		}

		.btn1 {
			position: relative;
			width: 100px;
			height: 35px;
			left:165px;
			top:530px;
			-webkit-transition-duration: 0.4s;
			transition-duration: 0.4s;
			text-align: center;
			background-color:white;
			color: black;
			border: 2px solid rgb(135, 135, 135);
			border-radius:5px;
		}

		.btn1:hover {
		background-color: rgb(135, 135, 135);
		color: white;
		}
	</style>
</head>
<meta charset='UTF-8'>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="Arcsin, www.arcsin.se"/> 
<link rel="stylesheet" type="text/css" href="default.css"/>
<title>COVID</title>
</head>
<body>
	<div class="box">
		<img id="pic" src="../../../frontend/web/img/0.jpg" />
	</div>
	<div>
		<input type="button" class="btn1"  value="上一张"/>
		<input type="button" class="btn1" value="下一张" />
	</div>
	<script>
		var pic=document.getElementById("pic");
		var preBtn=document.getElementsByClassName("btn1")[0];
		var nextBtn=document.getElementsByClassName("btn1")[1];
//			
		preBtn.onclick=function()
		{
			n--;
			if(n==0)
			{
				n=6;
			}
			pic.src="../../../frontend/web/img/"+n+".jpg"
		}
		nextBtn.onclick=function(){
			picLunH();
		}
		var n=1;
		function picLunH(){
			n++;
			if(n==7)
			{
				n=1;
			}
			pic.src="../../../frontend/web/img/"+n+".jpg"
			
		}
		setInterval(picLunH,3000);
	</script>
<div class="main">
	<div class="header_left">
		<div class="menu">
			<div class="gfx_nav"><span></span></div>
			<a href="../../../frontend/web/site/about"><span>01</span> 简介</a>
			<a href="../../../frontend/web/site/about1"><span>02</span> 预防</a>
			<a href="../../../frontend/web/site/about2"><span>03</span> 治疗</a>
		</div>
		<a href="../../../frontend/web/site/about" id="big">COVID</a>
	</div>
	<div class="header_right">
		<div class="gfx_margin"><span></span></div>
		<div class="gfx_header"><h1></h1></div>
	</div>
	<div class="content">
        <h1><span>主要症状</span></h1>
		<p>(1) 发烧：最常见，可中度至低热，有些患者有轻度症状而无发烧。</p>
		<p>(2) 咳嗽：主要是干咳。</p>
		<p>(3) 呼吸困难：大约一半的患者在1周后出现呼吸困难，例如胸闷和呼吸急促。</p>
		<p>(4) 其他非典型症状：鼻塞，流鼻涕等上呼吸道症状罕见，有些患者首次出现疲劳，肌肉酸痛，头痛，腹泻等，很容易错过。</p>
		<p>(5) 严重疾病：严重疾病的患者会迅速发展为急性呼吸窘迫综合征，败血性休克，难以纠正的代谢性酸中毒和凝血病。</p>
		<h1><span>治疗方法</span></h1>
		<p>(1) 休息和支持治疗；注意水和电解质的平衡；监测生命体征和血氧饱和度。</p>
		<p>(2) 氧气疗法：低氧血症患者可通过鼻导管和面罩进行氧气疗法，必要时可通过鼻子进行高流量氧气疗法（有创/无创）机械通气。</p>
		<p>(3) 抗病毒治疗：目前尚无有效的抗病毒药物，吸入阿尔法干扰素和一些抗病毒药物如洛匹那韦/利托那韦可能有一定作用。</p>
		<p>(4) 抗菌疗法：避免盲目或不当地使用抗菌药物，并在发现继发细菌感染的迹象后及时使用抗菌药物。</p>
		<p>(5) 中医治疗：辨证论治。</p>
        <p>(6) 糖皮质激素：严重者酌情使用。</p>
    </div>
</div>
</body>
</html>