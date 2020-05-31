<?php

/* @var $this yii\web\View */

$this->title = '疫情资料站后台';
?>

<div>
当前在线用户数量: <?php echo Yii::$app->userCounter->getOnline(); ?><br />
今日访问量: <?php echo Yii::$app->userCounter->getToday(); ?><br />
昨日访问量: <?php echo Yii::$app->userCounter->getYesterday(); ?><br />
网站总访问量: <?php echo Yii::$app->userCounter->getTotal(); ?><br />
网站当日最大访问量: <?php echo Yii::$app->userCounter->getMaximal(); ?><br />
网站最大访问量日期: <?php echo date('Y.m.d', Yii::$app->userCounter->getMaximalTime()); ?>
</div>

