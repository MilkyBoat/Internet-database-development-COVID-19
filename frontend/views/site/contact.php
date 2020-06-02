<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 袁嘉蔚 1810546,20200509
 * a view of contact us page
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
$this->title = 'Contact';
?>
<html lang="en">
<link rel="stylesheet" href="../../../frontend/web/public/css/style_1.css">
<nav id="w0" class="shadow-sm navbar-expand-lg navbar-light bg-light navbar">
<div class="container">
<a class="navbar-brand" href="../../web/site/index">COVID-19</a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#w0-collapse" aria-controls="w0-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<div id="w0-collapse" class="collapse navbar-collapse">
    <ul id="w1" class="navbar-nav ml-auto nav"><li class="nav-item"><a class="nav-link" href="../../web/site/index">Home</a></li>
<li class="nav-item"><a class="nav-link" href="../../web/site/about">About</a></li>
<li class="nav-item"><a class="nav-link " href="../../web/blog/blog">Blog</a></li>
<li class="nav-item"><a class="nav-link" href="../../web/video/index">Video</a></li>
<li class="nav-item"><a class="nav-link active" href="../../web/site/contact">Contact</a></li>
<li class="nav-item"><a class="nav-link" href="../../web/news/index">News</a></li>
<li class="nav-item"><a class="nav-link" href="../../web/site/research">Research</a></li>
<li class="nav-item"><a class="nav-link" href="../../web/site/signup">Signup</a></li>
<li class="nav-item"><a class="nav-link" href="../..web/site/login">Login</a></li></ul></div>
</div>
</nav>
  <head>
    <title>Contact Us！</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../../../frontend/web/css/custom-bs.css">
    <link rel="stylesheet" href="../../../frontend/web/css/main.css">
    <link rel="stylesheet" href="../../../frontend/web/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../../../frontend/web/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../frontend/web/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../../frontend/web/public/fonts/line-icons/style.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../../../frontend/web/css/style1.css">    
  </head>
  <body>
    
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            
              
              <img src="../../../frontend/web/img/aboutus/sq_img_10.JPG" alt="Image" class="img-fluid img-shadow">
            </a>
          </div>
          <div class="col-lg-5 ml-auto">
            <h3 class="section-title-sub text-primary">Who are we?</h3>
            <h2 class="section-title mb-3">我们是谁？</h2>
            <p class="lead">我们是五个来自南开大学的学生。</p>
            <p>我们开发这个网页是为了让人们更加了解新型冠状病毒的相关信息；</br>
            我们通过收集全球各地的感染患者数量，将其制作为疫情地图直观的反映出来；</br>
            我们收集来自各个媒体和机构对于这种病毒的报导，将其汇总、分类，形成了About, Research, News三个类目；</br>
            我们更制作了相关的博客系统，希望人们能在此分享他们的抗疫感想和Vlog视频；</br>
            最后，希望人们能通过联系页面讲自己的信息及时反馈给我们。</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT US -->
    <section class="site-section about-us-section" >
      <div class="container">
        
        <div class="row mb-5 pt-0 site-section">
          <div class="col-md-6 align-self-center">
            <h3 class="section-title-sub text-primary">Key Feautures</h3>
            <h2 class="section-title mb-4">网站特点</h2>
            <p class="lead">这是一个疫情资料站。</p>
            <p>我们提供了各种关于COVID-19的信息，您可以在这里获取国内外关于疫情的最新研究和新闻资料，您也可以分享您的抗疫日记，将疫情期间拍摄的影像上传于本站，与更多人分享自己的生活。</p>
            <p>同时，如果您对本网站的内容有任何疑问，或者有与新冠病毒有关的一切信息和内容，欢迎通过本页最下方的表格联系我们，您也可以获取我们的联络方式，以便在第一时间找到我们，真诚感谢您的支持！</p>
            <p class="mt-4"><a href="#contactformanchor" class="spepcial_link">跳转到联系表格</a></p>
          </div>
          <div class="col-md-5 ml-auto img-overlap">
            <div class="img-1"><img src="../../../frontend/web/img/aboutus/sq_img_6.jpg" alt="Image" class="img-fluid img-shadow"></div>
            <div class="img-2"><img src="../../../frontend/web/img/aboutus/123456.JPG" alt="Image" class="img-fluid img-shadow"></div>
          </div>
        </div>

        <div class="row pb-0 border-top pt-5 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-mobile mr-3"></span>
              <strong class="number" data-number="18625">0</strong>
            </div>
            <span class="caption">Lines of Codes</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-lightbulb mr-3"></span>
              <strong class="number" data-number="100">0</strong>
            </div>
            <span class="caption">Commits</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-trophy mr-3"></span>
              <strong class="number" data-number="90">0</strong>
            </div>
            <span class="caption">Days Spent</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-puzzle mr-3"></span>
              <strong class="number" data-number="6">0</strong>
            </div>
            <span class="caption">Meetings</span>
          </div>

            
        </div>

      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h3 class="section-title-sub text-primary">Our Team</h3>
            <h2 class="section-title mb-3">小组信息介绍</h2>
          </div>
        </div>

        <div class="row align-items-center block__69944">
          <div class="col-lg-6 mb-5">
            <img src="../../../frontend/web/img/aboutus/person_01.JPG" alt="Image" class="img-fluid mb-4 rounded">

            <h3>黄璟知</h3>
            <p class="text-muted">组长</p>
            <p class="lead">主要负责成员分工、博客和视频分享模块</p>
            <p>motto:</p>
            <div class="social mt-4">
              <a href="https://github.com/NebulaJZ"target="_blank"><span class="icon-github"></span></a>
              <a href="mailto:13687978877@163.com"target="_blank"><span class="icon-envelope-o"></span></a>
              <a href="https://cc.nankai.edu.cn/"target="_blank"><span class="icon-institution"></span></a>
            </div>

          </div>
          <div class="col-lg-6 mb-5">
            <img src="../../../frontend/web/img/aboutus/person_02.JPG" alt="Image" class="img-fluid mb-4 rounded">
            <h3>李彦欣</h3>
            <p class="text-muted">组员</p>
            <p class="lead">主要负责关于页面和用户登录模块</p>
            <p>motto:</p>
            <div class="social mt-4">
              <a href="https://github.com/Liyx55"target="_blank"><span class="icon-github"></span></a>
              <a href="mailto:962417405@qq.com"target="_blank"><span class="icon-envelope-o"></span></a>
              <a href="https://cc.nankai.edu.cn/"target="_blank"><span class="icon-institution"></span></a>
            </div>
          </div>


          <div class="col-lg-4">
            <img src="../../../frontend/web/img/aboutus/person_03.JPG" alt="Image" class="img-fluid mb-4 rounded">

            <h3>孙家宜</h3>
            <p class="text-muted">组员</p>
            <p class="lead">主要负责关于研究和新闻模块</p>
            <p>motto:</p>
            <div class="social mt-4">
              <a href="https://github.com/Guru759"target="_blank"><span class="icon-github"></span></a>
              <a href="mailto:2878271548@qq.com"target="_blank"><span class="icon-envelope-o"></span></a>
              <a href="https://cc.nankai.edu.cn/"target="_blank"><span class="icon-institution"></span></a>
            </div>

          </div>
          <div class="col-lg-4">
            <img src="../../../frontend/web/img/aboutus/person_04.JPG" alt="Image" class="img-fluid mb-4 rounded">
            <h3>徐云凯</h3>
            <p class="text-muted">组员</p>
            <p class="lead">主要负责首页疫情地图的完全实现</p>
            <p>motto:</p>
            <div class="social mt-4">
              <a href="https://github.com/MilkyBoat"target="_blank"><span class="icon-github"></span></a>
              <a href="mailto:xuyunkai@mail.nankai.edu.cn"target="_blank"><span class="icon-envelope-o"></span></a>
              <a href="http://milkyship.cn/"target="_blank"><span class="icon-institution"></span></a>
            </div>
          </div>

          <div class="col-lg-4">
            <img src="../../../frontend/web/img/aboutus/person_05.jpg" alt="Image" class="img-fluid mb-4 rounded">
            <h3>袁嘉蔚</h3>
            <p class="text-muted">组员</p>
            <p class="lead">主要负责联系页面、流量统计和团队页面模块</p>
            <p>I always wanted to be a part of a small rebellion.</br>
            そのままの君だ。いつまでも幸せに。-オレンジうつ</p>
            <div class="social mt-4">
              <a href="https://github.com/tenkinoko" target="_blank"><span class="icon-github"></span></a>
              <a href="mailto:1013198002@qq.com"target="_blank"><span class="icon-envelope-o"></span></a>
              <a href="https://cc.nankai.edu.cn/"target="_blank"><span class="icon-institution"></span></a>
            </div>
          </div>

        </div>


      </div>
    </section>
    
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
          	<a name="contactformanchor"></a>
            <h3 class="section-title-sub text-primary">Contact Us</h3>
            <h2 class="section-title mb-3">联系我们</h2>
          </div>
        </div>
    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <form action="#" class="">

         <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($model, 'firstname') ?>
            <?= $form->field($model, 'lastname') ?>
            <?= $form->field($model, 'sex')->radioList(['1'=>'Male','0'=>'Female']) ?>
            <?= $form->field($model, 'wechatid') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'message')->textarea(['rows'=>7])->hint('Please enter your message')?>
            <div class="form-group">
<div class="social mt-4">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

        </div>
        </div>

  
            </form>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">地址</p>
              <p class="mb-4">中国天津市津南区同砚路38号南开大学津南校区</p>

              <p class="mb-0 font-weight-bold">微信</p>
              <p class="mb-4">y543184823</a></p>

              <p class="mb-0 font-weight-bold">邮箱</p>
              <p class="mb-0"><a href="mailto:1020546@hust.edu.cn">1020546@hust.edu.cn</a></p>
              <p> &nbsp;  </p>
              <p> &nbsp;  </p>
              <p> &nbsp;  </p>
              <p> &nbsp;  </p>
              <p> &nbsp;  </p>
              <p> &nbsp;  </p>
              <img src="../../../frontend/web/img/aboutus/jinnan.png" alt="Image" class="img-fluid mb-4 rounded"> </a>
              

            </div>
          </div>
        </div>
      </div>
    </section>

  
  </div>

    <!-- SCRIPTS -->
    <script src="../../../frontend/web/js/contact/jquery.min.js"></script>
    <script src="../../../frontend/web/js/contact/bootstrap.bundle.min.js"></script>
    <script src="../../../frontend/web/js/contact/isotope.pkgd.min.js"></script>
    <script src="../../../frontend/web/js/contact/stickyfill.min.js"></script>
    <script src="../../../frontend/web/js/contact/jquery.fancybox.min.js"></script>
    <script src="../../../frontend/web/js/contact/jquery.easing.1.3.js"></script>    
    <script src="../../../frontend/web/js/contact/jquery.waypoints.min.js"></script>
    <script src="../../../frontend/web/js/contact/jquery.animateNumber.min.js"></script>   
    <script src="../../../frontend/web/js/contact/custom.js"></script>

  </body>
</html>