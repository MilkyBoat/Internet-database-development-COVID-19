<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 袁嘉蔚 1810546,20200509; 徐云凯 1713667， 20200602
 * a view of backend home page
 */
/* @var $this yii\web\View */

$this->title = '疫情资料站后台';
?>

<div>
    <p>当前在线用户数量: <span><?php echo Yii::$app->userCounter->getOnline(); ?></span></p>
    <p>今日访问量: <span><?php echo Yii::$app->userCounter->getToday(); ?></span></p>
    <p>昨日访问量: <span><?php echo Yii::$app->userCounter->getYesterday(); ?></span></p>
    <p>网站总访问量: <span><?php echo Yii::$app->userCounter->getTotal(); ?></span></p>
    <p>网站当日最大访问量: <span><?php echo Yii::$app->userCounter->getMaximal(); ?></span></p>
    <p>网站最大访问量日期: <span><?php echo date('Y.m.d', Yii::$app->userCounter->getMaximalTime()); ?></span></p>
</div>

<style>
p{
    width: 280px;
    border: groove 3px;
    padding: 10px;
    border-radius: 10px;
    color: #61a7e4;
}
span{
    color: #d81414;
    float: right;
}
</style>