<?php
 include("./config.php");
 session_start();
    if(isset($_SESSION['donorDetails'])){
      header("location:./donor/donor.php");
    }else if(isset($_SESSION['recipientDetails'])){
      header("location:./recipient/recipient.php");
    }else if(isset($_SESSION['adminDetails'])){
        header("location:./admin/adminmenu.php");
    }
    $cDate = new DateTime();
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    
<!-- Mirrored from templates.bwlthemes.com/blood_donation/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:03 GMT -->
<head>
        <meta charset="utf-8">
        <title>Blood Donation - Activism & Campaign HTML5 Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/favicon.png" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
</head>

    <body> 

      <!-- section navbar start -->
    <div id="preloader">
        <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
    </div>

        <section class="header-wrapper navgiation-wrapper">
            <div class="navbar navbar-default">			
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a style="margin-top:8px !important" class="logo" href="index.php"><img style="height:50px;width:150px" alt="" src="images/newlogo.png"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                        <li class="drop">
                                <a href="index.php" title="Home Layout 01">Home</a>
                            </li>
                            <li>
                                <a href="about-us.php" title="About Us">About Us</a>
                            </li>
                            <li>
                                <a href="events.php">Campaigns</a>
                            </li>
                            <li>
                                <a href="faq.php" title="FAQ">FAQs</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                            <li>
                                <a href="signup.php">Signup</a>
                            </li>
                            <li>
              <a href="login.php">Login</a>
            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <!-- section navbar end -->
            

        <!--  HOME SLIDER BLOCK  -->

        <div class="slider-wrap">

            <div id="slider_1" class="owl-carousel owl-theme">

                <div class="item">
                    <img src="images/home_1_slider_1.jpg" alt="img">
                    <div class="slider-content text-center">
                        <div class="container">

                            <div class="slider-contents-info">
                                <h3>Donate blood,save life !</h3>
                                <h2>
                                    Your Donation Can bring
                                    <br>
                                    smile at others face
                                </h2>
                                <a href="./signup.php" class="btn btn-slider">Donate Now <i class="fa fa-long-arrow-right"></i></a>
                            </div> <!-- end .slider-contents-info  -->
                        </div><!-- /.slider-content -->
                    </div>
                </div>

                <div class="item">
                    <img src="images/home_1_slider_1.jpg" alt="img">
                    <div class="slider-content text-center">
                        <div class="container">
                            <div class="slider-contents-info">
                                <h3>Finding Hope in Every Drop</h3>
                                <h2>
                                Join our Blood Registry and
                                    <br>
                                    Access Vital Lifesaving Support
                                </h2>
                                <a href="./signup.php" class="btn btn-slider">Join With Us <i class="fa fa-long-arrow-right"></i></a>
                            </div><!-- /.slider-content -->
                        </div> <!-- end .slider-contents-info  -->
                    </div>

                </div>
            </div>

        </div>

        <!-- HIGHLIGHT CTA  -->   

        <section class="cta-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2>We are helping people from many years</h2>
                        <p>
                            You can give blood at any of our blood donation venues all over the world. 
                            We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                        </p>
                    </div> <!--  end .col-md-8  -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="btn btn-cta-1" href="./signup.php">REQUEST APPOINTMENT</a>
                    </div> <!--  end .col-md-4  -->
                </div> <!--  end .row  -->
            </div>
        </section> 

        <!--  SECTION DONATION PROCESS -->

        <section class="section-content-block section-process">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading"><span>Donation</span> Process</h2>
                        <p class="section-subheading">The donation process from the time you arrive center until the time you leave</p>
                    </div> <!-- end .col-sm-10  -->                    

                </div> <!--  end .row  -->

                <div class="row wow fadeInUp">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">

                                <img src="images/process_1.jpg" alt="process" />
                                <div class="step">
                                    <h3>1</h3>
                                </div>
                            </figure> <!-- end .process-img  -->

                            <article class="process-info">
                                <h2>Registration</h2>   
                                <p>You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process.</p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->



                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">
                                <img src="images/process_2.jpg" alt="process" />
                                <div class="step">
                                    <h3>2</h3>
                                </div>
                            </figure> <!-- end .cau<h5 class="step">1</h5>se-img  -->

                            <article class="process-info">                                   
                                <h2>Screening</h2>
                                <p>A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process.</p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->


                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">
                                <img src="images/process_3.jpg" alt="process" />
                                <div class="step">
                                    <h3>3</h3>
                                </div>
                            </figure> <!-- end .process-img  -->

                            <article class="process-info">
                                <h2>Donation</h2>
                                <p>After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes.</p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->



                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="process-layout">

                            <figure class="process-img">
                                <img src="images/process_4.jpg" alt="process" />
                                <div class="step">
                                    <h3>4</h3>
                                </div>
                            </figure> <!-- end .process-img  -->

                            <article class="process-info">
                                <h2>Refreshment</h2>
                                <p>You can also stay in sitting room until you feel strong enough to leave our center. You will receive awesome drink from us in donation zone. </p>
                            </article>

                        </div> <!--  end .process-layout -->

                    </div> <!--  end .col-lg-3 -->

                </div> <!--  end .row --> 

            </div> <!--  end .container  -->

        </section> <!--  end .section-process --> 

        

       

        <!-- SECTION TESTIMONIAL   -->

        <section class="section-content-block section-client-testimonial">

            <div class="container"> 

                <div class="testimonial-container text-center">
                    <?php
                        $selectContact = "SELECT * FROM `contactus`";
                        $applySelectContactQuery = mysqli_query($config,$selectContact);
                        if(mysqli_num_rows($applySelectContactQuery)>0){
                            while($fetchContact = mysqli_fetch_assoc($applySelectContactQuery)){

                            
                    ?>
                    <div class="col-md-10 col-md-offset-1 col-sm-12">

                        <div class="testimony-layout-1">
                            <h3 class="people-quote">User Opinion</h3>
                            <p class="testimony-text">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                <?php echo $fetchContact["ContactMessage"] ?>                                 
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>

                            <h6><?php echo $fetchContact["ContactName"] ?></h6>
                            <span><?php echo $fetchContact["ContactEmail"] ?></span>

                        </div> <!-- end .testimony-layout-1  -->

                    </div> <!--  end col-md-10  -->
                     <?php }}?>           
                    

                </div>  <!--  end .row  -->   

            </div> <!-- end .container  -->

        </section> <!--  end .section-client-testimonial --> 

      


                </div> <!-- end .row  --> 

            </div> <!-- end .container  -->

        </section> <!--  end .section-our-team -->  

        <!-- SECTION CTA -->

        <section class="section-content-block cta-section-3">       
            <div class="container wow fadeIn animated">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cta-content text-center">
                            <h2>Join with us and save life</h2>
                        </div>
                    </div> <!-- end .col-md-12 -->
                </div> <!-- end .row  -->
            </div> <!-- end .container  -->
        </section>   <!-- end cta-section  -->  

        <!--  SECTION CAMPAIGNS   -->

        <section class="section-content-block" >

            <div class="container">

                <div class="row section-heading-wrapper">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">Donation Campaigns</h2>
                        <p class="section-subheading">Campaigns to encourage new donors to join and existing to continue to give blood.</p>
                    </div> <!-- end .col-sm-12  -->                       

                </div> <!-- end .row  -->


                <div class="row">
                     <?php 
                        $getDriveQuery = "SELECT donationdrive.StartDate,donationdrive.DriveTimings,donationdrive.DriveTitle,donationdrive.DriveAddress,bloodcenter.CenterName,donationdrive.DriveDescription FROM `donationdrive` INNER JOIN bloodcenter ON donationdrive.CenterId = bloodcenter.CenterId WHERE donationdrive.DriveStatus = 'coming' LIMIT 2";
                        $applyDriveQuery = mysqli_query($config,$getDriveQuery);
                        if(mysqli_num_rows($applyDriveQuery)>0){
                            while($fetchDrive = mysqli_fetch_assoc($applyDriveQuery)){

                            
                     ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="event-latest">
                            <div class="row"> 

                                <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                    <div class="event-latest-thumbnail">
                                        <a href="#">
                                            <img src="images/event_1.jpg" alt="">
                                        </a>
                                    </div>
                                </div> <!--  col-sm-5  -->

                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="event-details">
                                        <a class="latest-date" href="#"><?php echo $fetchDrive['StartDate'] ?></a>
                                        <h4 class="event-latest-title">
                                            <a href="#"><?php echo $fetchDrive['DriveTitle'] ?></a>
                                        </h4>
                                        <p><?php echo $fetchDrive['DriveDescription'] ?></p>
                                        <div class="event-latest-details">
                                            <a class="author" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $fetchDrive['DriveTimings'] ?></a>
                                            <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $fetchDrive['DriveAddress'] ?></a>
                                        </div>
                                    </div>
                                </div> <!--  col-sm-7  -->

                            </div>

                        </div>
                    </div> <!--  col-sm-6  -->
                     <?php }}?>           
                </div>                 

                <div class="row">
                    <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                        <a class="btn btn-load-more" href="./events.php">See All Campaigns</a>
                    </div>
                </div>

            </div> <!--  end .container  --> 

        </section>   

        


        
        <!-- START FOOTER  -->

        <footer>            

            <section style="padding-bottom:0;" class="footer-widget-area footer-widget-area-bg">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div style="margin-bottom:0px" class="about-footer">

                                <div class="row">

                                    <div style="margin-top:-9px" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <img src="images/newlogo.png" alt="" />
                                    </div> <!--  end col-lg-3-->

                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <p>
                                            We are world largest and trustful blood donation center. We are working with a prestigious vision to helping patient to provide blood.
                                            We are working all over the world, organizing blood donation campaign to grow awareness among the people to donate blood.
                                        </p>
                                    </div> <!--  end .col-lg-9  -->

                                </div> <!--  end .row -->

                            </div> <!--  end .about-footer  -->

                        </div> <!--  end .col-md-12  -->

                    </div> <!--  end .row  -->

                    

                </div> <!-- end .container  -->

            </section> <!--  end .footer-widget-area  -->

            <!--FOOTER CONTENT  -->

            <section class="footer-contents">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-md-6 col-sm-12">
                        <p class="copyright-text"> Copyright © <?php echo $cDate->format('Y') ?>, All Right Reserved</p>

                        </div>  <!-- end .col-sm-6  -->

                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="footer-nav">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="./index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="./about-us.php">About</a>
                                        </li>
                                        <li>
                                            <a href="./events.php">Events</a>
                                        </li>
                                        <li>
                                            <a href="./faq.php">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="./contact.php">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> <!--  end .footer-nav  -->
                        </div> <!--  end .col-lg-6  -->

                    </div> <!-- end .row  -->                                    

                </div> <!--  end .container  -->

            </section> <!--  end .footer-content  -->

        </footer>

        <!-- END FOOTER  -->

        <!-- Back To Top Button  -->

        <a id="backTop">Back To Top</a>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.backTop.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/waypoints-sticky.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/venobox.min.js"></script>
        <script src="js/custom-scripts.js"></script>
    </body>


<!-- Mirrored from templates.bwlthemes.com/blood_donation/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:22 GMT -->
</html>