<?php

/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 袁嘉蔚 1810546,20200509
 * a view of about us page
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Aboutus';
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
              <li><a href="aboutus"  class="active">Us</a></li>
              <li><a href="portfolio">Portfolio</a></li>
              <li><a href="contact">Contact</a></li>
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
            <h1>About Us</h1>
            <div class="mx-auto w-75">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum veritatis dolorem ipsa assumenda? </p>
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

      <a href="#next-section" class="smoothscroll scroll-button">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>

    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a data-fancybox data-ratio="2" href="../../../frontend/web/videos/Week7-2.mp4" class="block__96788">
              <span class="play-icon"><span class="icon-play"></span></span>
              <img src="../../../frontend/web/img/aboutus/sq_img_6.jpg" alt="Image" class="img-fluid img-shadow">
            </a>
          </div>
          <div class="col-lg-5 ml-auto">
            <h3 class="section-title-sub text-primary">Watch the video</h3>
            <h2 class="section-title mb-3">We Are Web Agency</h2>
            <p class="lead">Eveniet voluptatibus voluptates suscipit minima, cum voluptatum ut dolor, sed facere corporis qui, ea quisquam quis odit minus nulla vitae. Sit, voluptatem.</p>
            <p>Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT US -->
    <section class="site-section about-us-section" >
      <div class="container">
        
        <div class="row mb-5 pt-0 site-section">
          <div class="col-md-6 align-self-center">
            <h3 class="section-title-sub text-primary">About Us</h3>
            <h2 class="section-title mb-4">Who Are You Guys</h2>

            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.</p>
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.</p>
            <p class="mt-4"><a href="#" class="spepcial_link">Read more about us</a></p>
          </div>
          <div class="col-md-5 ml-auto img-overlap">
            <div class="img-1"><img src="../../../frontend/web/img/aboutus/sq_img_6.jpg" alt="Image" class="img-fluid img-shadow"></div>
            <div class="img-2"><img src="../../../frontend/web/img/aboutus/sq_img_10.jpg" alt="Image" class="img-fluid img-shadow"></div>
          </div>
        </div>

        <div class="row pb-0 border-top pt-5 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-mobile mr-3"></span>
              <strong class="number" data-number="2393">0</strong>
            </div>
            <span class="caption">Completed Projects</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-lightbulb mr-3"></span>
              <strong class="number" data-number="54">0</strong>
            </div>
            <span class="caption">Winners &amp; Awards</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-trophy mr-3"></span>
              <strong class="number" data-number="120">0</strong>
            </div>
            <span class="caption">Number of Team</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <span class="icon-line-puzzle mr-3"></span>
              <strong class="number" data-number="550">0</strong>
            </div>
            <span class="caption">Line of Codes</span>
          </div>

            
        </div>

      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h3 class="section-title-sub text-primary">Our Team</h3>
            <h2 class="section-title mb-3">Team</h2>
          </div>
        </div>

        <div class="row align-items-center block__69944">
          <div class="col-lg-6 mb-5">
            <img src="../../../frontend/web/img/aboutus/person_6.jpg" alt="Image" class="img-fluid mb-4 rounded">

            <h3>Elisabeth Smith</h3>
            <p class="text-muted">Creative Director</p>
            <p class="lead">Odio nihil facilis vitae laudantium provident magni alias veniam quidem voluptatum</p>
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>

          </div>
          <div class="col-lg-6 mb-5">
            <img src="../../../frontend/web/img/aboutus/person_5.jpg" alt="Image" class="img-fluid mb-4 rounded">
            <h3>Chintan Patel</h3>
            <p class="text-muted">Creative Director</p>
            <p class="lead">Odio nihil facilis vitae laudantium provident magni alias veniam quidem voluptatum</p>
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>


          <div class="col-lg-4">
            <img src="../../../frontend/web/img/aboutus/person_2.jpg" alt="Image" class="img-fluid mb-4 rounded">

            <h3>Elisabeth Smith</h3>
            <p class="text-muted">Creative Director</p>
            
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>

          </div>
          <div class="col-lg-4">
            <img src="../../../frontend/web/img/aboutus/person_3.jpg" alt="Image" class="img-fluid mb-4 rounded">
            <h3>Chintan Patel</h3>
            <p class="text-muted">Creative Director</p>
            
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>

          <div class="col-lg-4">
            <img src="../../../frontend/web/img/aboutus/person_1.jpg" alt="Image" class="img-fluid mb-4 rounded">
            <h3>Jean Doe</h3>
            <p class="text-muted">Creative Director</p>
            
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
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
    
    <script src="../../../frontend/web/js/contact/jquery.waypoints.min.js"></script>
    <script src="../../../frontend/web/js/contact/jquery.animateNumber.min.js"></script>
    
    <script src="../../../frontend/web/js/contact/custom.js"></script>
  </body>
</html>
