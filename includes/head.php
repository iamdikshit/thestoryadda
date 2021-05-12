<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <!-- header -->
    <div class="header-top">
      <div class="container" style="padding: 10px;">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="../" class="site-logo">
              <img src="includes/web_logo.png"  class="img-fluid" style=" width: 50%; height:auto ; ">
              <p style="font-size: 42%;text-align: center; color:black; ">| Perspectives Behind The Story |</p>
            </a>
              

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
             <a href="https://www.facebook.com/TheStoryADDA/" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                <a href="https://twitter.com/TheStoryADDA" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                <a href="https://www.instagram.com/thestoryadda/" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
            </div>
            <form action="search" class="search-form d-inline-block">

              <div class="d-flex">
                <input type="search" name="search" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-primary"><span class="icon-search"></span></button>
              </div>
            </form>
       
          </div>

          <div class="col-6 d-block d-lg-none text-right">
            
          </div>
        </div>
      </div>
      


      
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="active">
                        <a  href="index" class="nav-link text-left" style="font-weight: bold;" >Home</a>
                    </li>
                    <li>
                  <a  href="category" class="nav-link text-left" style="color: white;background-color: black; border-radius: 20px;font-weight: bold;">Category</a>
                </li>
                 
               
                <li>
                    <a href="about_us" class="nav-link text-left" style="color: black;background-color: white; border-radius: 20px;font-weight: bold;">About</a>
                </li>
                <li><a href="feedback" class="nav-link text-left" style="color: white;background-color: black; border-radius: 20px;font-weight: bold;">Feedback</a></li>
                 <li><a href="internship" class="nav-link text-left" style="color: black;background-color: white; border-radius: 20px;font-weight: bold;">Career</a></li>
                 
                 <li><a href="corona" class="nav-link text-left" style="color: white;background-color: black; border-radius: 20px;font-weight: bold;">Corona Update</a></li>
               
                <?php
                      if(isset($_SESSION['email']))
                      {
                 ?>

                 <li>
                    <a href="logout" class="nav-link text-left" style="color: black;background-color: white; border-radius: 20px;font-weight: bold;">Logout</a>
                </li>
                <?php 
                  }
                  else
                  {
                 ?>
                  <li><br>
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup" data-whatever="@mdo" style = "background-color:white; color: black; border-color:white;font-weight: bold;" >login</button>
                    <!--<a href="signup" class="nav-link text-left" style="color: black;background-color: white; border-radius: 20px;">Sign Up</a>-->
                </li>
                <!--<li>-->
                <!--    <a href="login" class="nav-link text-left" style="color: white;background-color: black; border-radius: 20px;">Login</a>-->
                <!--</li>-->
                <?php
                    }
                  ?>
                
              </ul>                                                                                                                                                                                                                                                                                         
            </nav>

          </div>
         
        </div>
      </div>

    </div>
    
    </div>
        
        <!--header end-->
        
        <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>