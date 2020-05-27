<?php
use common\models\Visit;
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200505
 * This is the home page of frontend web
 */
?>

<?php
/* @var $this yii\web\View */
$this->registerCssFile('@web/css/home.css');
$this->registerJsFile('@web/js/home.js');

$this->registerCssFile('@web/css/leaflet.css');
$this->registerCssFile('@web/css/plague-map.css');
$this->registerJsFile("@web/js/jquery.min.js");
$this->registerJsFile("@web/js/leaflet.js");
$this->registerJsFile("@web/js/plague-map.js");

$url = Yii::getAlias("@web") . '/img/';

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- 下面第3行是疫情地图的占位符！！！！！！！注意别删了！！！！ -->
    <!-- 下面第2行是疫情地图的占位符！！！！！！！注意别删了！！！！ -->
    <!-- 下面这行是疫情地图的占位符！！！！！！！注意别删了！！！！ -->
    <div id="plague-map" >

    </div>

    <section class="slider"></section>
    <div class="container">
        <div class="card-carousel">
            <div class="card" id="1">
                <div class="sliderThumb" style=" background:url(<?= $url ?>t.png) 50% 50% no-repeat; background-size:cover;height:60%;width:100%">

                </div>
                <div class="sliderCaption" style="text-align:center;padding:20px 20px 40px">
                    <h2 style="font-size: 26px;font-weight:600;color:#4a0d66">covid</h2>
                    <p>"djaoij"</p>
                    <p>
                        <a href="@web/index.php?r=site%2Fcontact" class="btn btn-secondary">covid</a>
                    </p>
                </div>
            </div>
            <div class="card" id="2">
                <div class="sliderThumb" style=" background:url(<?= $url ?>m.png) 50% 50% no-repeat; background-size:cover;height:60%;width:100%">
                </div>
                <div class="sliderCaption">
                    <h2>covid</h2>
                    <p>"djaoij"</p>
                    <p>
                        <a href="@web/index.php?r=site%2Fcontact" class="btn btn-secondary">covid</a>
                    </p>
                </div>
            </div>
            <div class="card" id="3">
                <div class="sliderThumb" style=" background:url(<?= $url ?>h.png) 50% 50% no-repeat; background-size:cover;height:60%;width:100%">

                </div>
                <div class="sliderCaption">
                    <h2>covid</h2>
                    <p>"djaoij"</p>
                    <p>
                        <a href="@web/index.php?r=site%2Fcontact" class="btn btn-secondary">covid</a>
                    </p>
                </div>
            </div>
            <div class="card" id="4">
                <div class="sliderThumb" style=" background:url(<?= $url ?>k.png) 50% 50% no-repeat; background-size:cover;height:60%;width:100%">

                </div>
                <div class="sliderCaption">
                    <h2>covid</h2>
                    <p>"djaoij"</p>
                    <p>
                        <a href="@web/index.php?r=site%2Fcontact" class="btn btn-secondary">covid</a>
                    </p>
                </div>
            </div>
            <div class="card" id="5">
                <div class="sliderThumb" style="background: url(<?= $url ?>j.png) 50% 50% no-repeat;background-size:cover;height:60%;width:100%" <div class="sliderCaption">
                </div>
                <div class="sliderCaption">
                    <h2>covid</h2>
                    <p>"djaoij"</p>
                    <p>
                        <a href="@web/index.php?r=site%2Fcontact" class="btn btn-secondary">covid</a>
                    </p>
                </div>
            </div>
        </div>
        <a href="#" class="visuallyhidden card-controller">Carousel controller</a>
    </div>
</div>
<div class="btn-group btn-group-justified">
    <span><?=date(time())?> 日期</span>
    <span><?=Visit::visitNum()?>人访问本网站</span>
</div>