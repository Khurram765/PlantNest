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

    
<!-- Mirrored from templates.bwlthemes.com/blood_donation/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:32 GMT -->
<head>
        <meta charset="utf-8">
        <title>About Us - Blood Donation - Activism & Campaign HTML5 Template</title>
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


        </header> <!-- end main-header  -->

        <!--  PAGE HEADING -->

        <section class="page-header">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">

                        <h3>
                            About Us
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / About Us
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!--  SECTION CAMPAIGNS   -->

        <section class="section-content-block" >

            <div class="container">

                <div class="row section-heading-wrapper">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">OUR CENTERS</h2>
                        <!-- <p class="section-subheading">Campaigns to encourage new donors to join and existing to continue to give blood.</p> -->
                    </div> <!-- end .col-sm-12  -->                       

                </div> <!-- end .row  -->


                <div class="row">
                    <?php 
                        $selectCenterQuery = "SELECT bloodcenter.CenterName,bloodcenter.CenterAddress,bloodcenter.CenterContact,city.CityName FROM `bloodcenter` INNER JOIN city ON bloodcenter.CityId = city.CityId";
                        $applyQuery = mysqli_query($config,$selectCenterQuery);
                        if(mysqli_num_rows($applyQuery)>0){
                            while($fetchData = mysqli_fetch_assoc($applyQuery)){
                        
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="event-latest">
                            <div class="row"> 
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div style="text-align: center;" class="event-details">
                                        <h4 class="event-latest-title">
                                            <a href="#"><?php echo $fetchData['CenterName'] ?></a>
                                        </h4>
                                        <p>Center Address: <?php echo $fetchData['CenterAddress'] ?></p>
                                        <div class="event-latest-details">
                                            <a class="author" href="#"><i class="fa fa-mobile-phone" aria-hidden="true"></i> <?php echo $fetchData['CenterContact'] ?></a>
                                            <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $fetchData['CityName'] ?></a>
                                        </div>
                                    </div>
                                </div> <!--  col-sm-7  -->

                            </div>

                        </div>
                    </div> <!--  col-sm-6  -->
                    <?php }}?>
                    
                </div> <!--  end .row  -->

            </div> <!--  end .container  --> 

        </section>  
        
        <!-- ABOUT US SECTION -->
    <div style="margin-top:0px;margin-bottom:80px;" class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-12 about-bg d-flex align-items-center justify-content-center">
          <img style="height:100%;width:100%" src="./images/aboutbg.webp" alt="">
        </div>
        <div class="col-md-6 col-12 ps-4 pe-0">
        <div class="aboutus">
            <h2 style="margin-top: 20px;">About Us</h2>
            <p>We are passionate about saving lives and making a positive impact in our community. Our Blood Donation Management System is designed to streamline the blood donation process, ensuring efficient coordination between donors, recipients, and healthcare facilities.</p>
            <p>Our mission is to bridge the gap between blood donors and those in need, providing a robust and user-friendly platform for managing blood donations. We aim to enhance the accessibility, availability, and reliability of blood supplies, ultimately saving lives and improving the well-being of patients.</p>
            <p>Our Blood Donation Management System offers a comprehensive set of features to simplify and optimize the blood donation process. With our user-friendly interface and advanced functionalities, donors can easily find nearby blood drives, schedule appointments, and track their donation history. For healthcare facilities, our system enables efficient inventory management, blood typing, and real-time notifications to ensure a steady supply of blood for patients in need.</p>
        </div>
        </div>
      </div>
    </div>


        <!--  SECTION COUNTER   -->

        <section class="section-counter">

            <div style="text-align:center;" class="container wow fadeInUp">

                <div style="display:flex;justify-content:center;" class="row">

                    
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="counter-block-1 text-center">

                            <i class="fa fa-stethoscope icon"></i>
                            <span class="counter">
                            <?php
                                $countDonorQuery = "SELECT * from donor";
                                $applyCountDonorQuery = mysqli_query($config,$countDonorQuery);
                                $totalDonors = mysqli_num_rows($applyCountDonorQuery);
                            ?>
                                <?php echo $totalDonors ?>
                            </span>                            
                            <h4>Happy Donors</h4>

                        </div>

                    </div> <!--  end .col-lg-3  -->

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="counter-block-1 text-center">

                            <i class="fa fa-users icon"></i>
                            <span class="counter">
                            <?php
                                $countRQuery = "SELECT * from recipient";
                                $applyCountRQuery = mysqli_query($config,$countRQuery);
                                $totalR = mysqli_num_rows($applyCountRQuery);
                            ?>
                                <?php echo $totalR ?>
                            </span>                             
                            <h4>Happy Recipient</h4>

                        </div>

                    </div> <!--  end .col-lg-3  -->

                    

                </div> <!-- end row  -->

            </div> <!--  end .container  -->

        </section> <!--  end .section-counter -->





        


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


<!-- Mirrored from templates.bwlthemes.com/blood_donation/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:32 GMT -->
</html>