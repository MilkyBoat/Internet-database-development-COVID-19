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
  <head>
    <title>Scenic &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../../../frontend/web/css/custom-bs.css">
    <link rel="stylesheet" href="../../../frontend/web/css/main.css">
    <link rel="stylesheet" href="../../../frontend/web/css/jquery.fancybox.min.css">
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
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3" id="top">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index">Scenic</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li><a href="index" class="nav-link">Home</a></li>
              <li><a href="aboutus">Us</a></li>
              <li><a href="portfolio">Portfolio</a></li>
              <li><a href="contact" class="active">Contact</a></li>
            </ul>
          </nav>

          <div class="col-6 site-burger-menu d-block d-lg-none text-right">
            <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="home-section section-hero overlay slanted" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 text-center">
            <h1>Contact Us</h1>
            <div class="mx-auto w-75">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet ab laboriosam asperiores commodi.</p>
            </div>
          </div>
        </div>
      </div>
        
      <!-- VIDEO -->
      <div class="video-container">
        <video autoplay loop="true">
          <source type="video/mp4" src="../../../frontend/web/videos/video.mp4">
        </video>
      </div>

      <a href="#top" class="smoothscroll scroll-button">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>

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

                <?= Html::submitButton('Send', ['class' => 'btn', 'name' => 'contact-button']) ?>

        </div>
        </div>

  
            </form>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>
          </div>
        </div>
      </div>
    </section>

    

    <footer class="site-footer slanted-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Scenic Products</h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Resources</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Resources</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"><small class="block">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </small></p>
          </div>
        </div>
      </div>
    </footer>
  
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