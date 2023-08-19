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

    
<!-- Mirrored from templates.bwlthemes.com/blood_donation/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:34 GMT -->
<head>
        <meta charset="utf-8">
        <title>FAQ - Blood Donation - Activism & Campaign HTML5 Template</title>
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
                            FAQ
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / FAQ
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!--  SECTION FAQ -->

        <section class="section-content-block section-faq">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">F.A.Q</h2>
                        <p class="section-subheading">
                            know more about blood donation and know how you can help people.
                        </p>
                    </div> <!-- end .col-sm-10  -->

                </div> <!--  end .row  -->

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="accordion">
                        <?php
                            $getFaq = mysqli_query($config,"SELECT * FROM faqs LIMIT 4");
                            if(mysqli_num_rows($getFaq)>0){
                                $index = 1;
                                while($fetchF = mysqli_fetch_assoc($getFaq)){
                        ?>
                        <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index ?>" ><?php echo $fetchF['fQuestion'] ?></a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $index ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                <?php echo $fetchF['fAnswer'] ?>
                                </div>
                            </div>
                        </div>
                        <?php ++$index;}}?>

                        

                    </div> <!-- end .col-md-6  -->

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="accordion2">

                        <!-- <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" >How can healthcare facilities benefit from the this system?</a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                Our system provides healthcare facilities with a range of benefits. They can efficiently manage their blood inventory, track expiration dates, and receive real-time notifications about urgent blood needs. The system also facilitates blood typing and matching, ensuring that compatible donors are connected with the right recipients. Additionally, healthcare facilities can generate reports and analytics to optimize their blood donation processes.
                                </div>
                            </div>
                        </div> -->
                        
                        <?php
                            $getFaq = mysqli_query($config,"SELECT * FROM faqs LIMIT 4,4");
                            if(mysqli_num_rows($getFaq)>0){
                                $index = 5;
                                while($fetchF = mysqli_fetch_assoc($getFaq)){
                        ?>
                        <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index ?>" ><?php echo $fetchF['fQuestion'] ?></a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $index ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                <?php echo $fetchF['fAnswer'] ?>
                                </div>
                            </div>
                        </div>
                        <?php ++$index;}}?>

                        

                    </div>           


                        <!-- <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">Is my personal information safe?</a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                Yes, we prioritize the privacy and security of your personal information. We adhere to strict data protection protocols and comply with all relevant privacy regulations. Your personal details are encrypted and stored securely in our system. We do not share your information with any third parties without your consent.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven"> How can I get involved in community blood drives?</a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">
                                We actively engage with the community by organizing blood drives and awareness campaigns. To get involved, keep an eye on our website's "Events" section, where we post information about upcoming initiatives. You can participate as a volunteer, donor, or supporter. Together, we can make a positive impact and save lives through blood donation.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default faq-box">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight" >How is my privacy protected?</a>
                                </h4>
                            </div>
                            <div id="collapseEight" class="panel-collapse collapse">
                                <div class="panel-body">
                                    We all to some extent are on an End of Life journey. For some of our clients and their family additional care and help is required as they progress through this journey. Care on Call work closely with.
                                </div>
                            </div>
                        </div>  -->

                    </div> 
                    <!-- end .col-md-12  -->                    

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!--  end .section-faq -->




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


<!-- Mirrored from templates.bwlthemes.com/blood_donation/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:34 GMT -->
</html>