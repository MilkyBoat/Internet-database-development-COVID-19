<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 袁嘉蔚 1810546,20200509
 * view of contact us page
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V17</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../frontend/web/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../frontend/web/public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../frontend/web/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../../frontend/web/css/main.css">
<!--===============================================================================================-->
</head>
<body>


    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form">
                <span class="contact100-form-title">
                    Send Us A Message
                </span>

        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($model, 'firstname') ?>
            <?= $form->field($model, 'lastname') ?>
            <?= $form->field($model, 'sex')->radioList(['1'=>'Male','0'=>'Female']) ?>
            <?= $form->field($model, 'wechatid') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'message')->textarea(['rows'=>7])->hint('Please enter your message')?>
            <div class="form-group">
                <div class="contact100-form-btn">
                <?= Html::submitButton('Send', ['class' => 'btn', 'name' => 'contact-button']) ?>
            </div>
        </div>
        </div>
            <?php ActiveForm::end(); ?>

            </form>

            <div class="contact100-more flex-col-c-m" style="background-image: url('../../../frontend/web/img/bg-012.jpg');">
                <div class="flex-w size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-map-marker"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Address
                        </span>

                        <span class="txt2" >
                       
                            中国天津市津南区同砚路38号<br/>
                            南开大学津南校区计算机学院<br/>

                        </span>
                        <br/>
                        <button class="contact100-form-btn" >
                            <a href="https://map.baidu.com/poi/%E5%8D%97%E5%BC%80%E5%A4%A7%E5%AD%A6%E8%AE%A1%E7%AE%97%E6%9C%BA%E5%AD%A6%E9%99%A2%C2%B7%E7%BD%91%E7%BB%9C%E7%A9%BA%E9%97%B4%E5%AE%89%E5%85%A8%E5%AD%A6%E9%99%A2/@13063337.821777778,4695486.702592594,12.97z?uid=af149ee39e95a041c42ba1ab&ugc_type=3&ugc_ver=1&device_ratio=2&compat=1&querytype=detailConInfo&da_src=shareurl" target="_blank">
                            Location
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </a>
                        </button>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Lets Talk
                        </span>

                        <span class="txt3">
                            Wechat: Bladerunner 2049<br/>
                            QQ: 123456789
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-envelope"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            General Support
                        </span>

                        <span class="txt3">
                            1810546@mail.nankai.edu.cn
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


<!--===============================================================================================-->
</body>
</html>

