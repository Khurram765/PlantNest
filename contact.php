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

<?php
    if(isset($_POST["contact"])){
        $name = $_POST["user_name"];
        $email = $_POST["user_email"];
        $message = $_POST["email_message"];
        $contactQuery = "INSERT INTO `contactus`(`ContactName`, `ContactEmail`, `ContactMessage`) VALUES ('$name','$email','$message')";
        $applyContactQuery = mysqli_query($config,$contactQuery);
        if($applyContactQuery){
            header("location:./index.php");
        }else{
            echo "Failed to sent message";
        }
    }
?>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    
<!-- Mirrored from templates.bwlthemes.com/blood_donation/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:36 GMT -->
<head>
        <meta charset="utf-8">
        <title>Contact Us - Blood Donation - Activism & Campaign HTML5 Template</title>
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

        <section class="page-header" data-stellar-background-ratio="1.2">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">


                        <h3>
                            Contact Us
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Contact
                        </p>


                    </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!--  MAIN CONTENT  -->

        <section class="section-content-block section-contact-block no-bottom-padding">

            <div class="container">

                <div class="row">

                    <div class ="col-md-12">
                        <h2 class="contact-title">Contact us</h2>                           
                    </div>               

                    <div class="col-md-3">

                        <ul class="contact-info">
                            <li>
                                <span class="icon-container"><i class="fa fa-home"></i></span>
                                <address>Shah Faisal Colony Karachi</address>
                            </li>
                        </ul>                        

                    </div>

                    <div class="col-md-3">

                        <ul class="contact-info">

                            <li>
                                <span class="icon-container"><i class="fa fa-phone"></i></span>
                                <address><a href="#">+093-120-525-9162</a></address>
                            </li>

                        </ul>                        

                    </div>

                    <div class="col-md-3">
                        <ul class="contact-info">
                            <li>
                                <span class="icon-container"><i class="fa fa-envelope"></i></span>
                                <address><a href="mailto:">blooddonation@gmail.com</a></address>
                            </li>
                        </ul>                        

                    </div>

                    <div class="col-md-3">

                        <ul class="contact-info">
                            <li>
                                <span class="icon-container"><i class="fa fa-globe"></i></span>
                                <address><a href="http://localhost/blood_donation/index.php">www.blood_donation.com</a></address>
                            </li>
                        </ul>                        

                    </div>                    

                </div> 

            </div>

        </section>

        <section class="section-content-block section-contact-block">

            <div class="container">

                <div class="row">

                    <div class="col-sm-6 wow fadeInLeft">

                        <div class="contact-form-block">

                            <h2 class="contact-title">Say hello to us</h2>

                            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return contactValidation()">

                                <div class="form-group">
                                    <input style="margin-bottom:5px;" type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" data-msg="Please Write Your Name" />
                                    <span class="errorC" style="font-size:15px; height:162px;width:19px; color: red;"></span>
                                </div>

                                <div class="form-group">
                                    <input style="margin-bottom:5px;" type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" data-msg="Please Write Your Valid Email" />
                                    <span class="errorC" style="font-size:15px; height:162px;width:19px; color: red;"></span>
                                </div>

                                <div class="form-group">
                                    <textarea style="margin-bottom:5px;" class="form-control" rows="5" name="email_message" id="email_message" placeholder="Message" data-msg="Please Write Your Message" ></textarea>
                                    <span class="errorC" style="font-size:15px; height:162px;width:19px; color: red;"></span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-custom" name="contact">Send Now</button>
                                </div>

                            </form>

                        </div> <!-- end .contact-form-block  -->

                    </div> <!--  end col-sm-6  -->

                    <div class="col-sm-6 wow fadeInRight">

                        <h2 class="contact-title">Our Location</h2>


                        <div class="section-google-map-block wow fadeInUp">

                            <div id="map_canvas"></div>

                        </div> <!-- end .section-content-block  -->                            

                    </div> <!--  end col-sm-6  -->                    

                </div> <!-- end row  -->

            </div> <!--  end .container -->

        </section> <!-- end .section-content-block  -->

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
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script src="js/custom-scripts.js"></script>
        <script>
            function contactValidation(){
                let userName = document.getElementById("user_name").value;
                let userEmail = document.getElementById("user_email").value;
                let emailMessage = document.getElementById("email_message").value;
                let error = document.querySelectorAll(".errorC");
                const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
                let errorArray = [];
                if(userName == ""){
                    error[0].innerHTML = "Please enter correct name";
                    errorArray.push(false);
                }
                if(!emailPattern.test(userEmail)){
                    error[1].innerHTML = "Please enter valid Email Address";
                    errorArray.push(false);
                }
                if(emailMessage == "" || emailMessage.length<10){
                    error[2].innerHTML = "Please enter your message (Minimum 10 characters)";
                    errorArray.push(false);
                }

                if(errorArray.includes(false)){
                    return false;
                }else{
                    return true;
                }
            }
        </script>
    </body>


<!-- Mirrored from templates.bwlthemes.com/blood_donation/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jun 2023 15:49:36 GMT -->
</html>