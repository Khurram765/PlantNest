<?php
 include("./config.php");
 session_start();
    if(isset($_SESSION['donorDetails'])){
      header("location:./donor/donor.php");
    }else if(isset($_SESSION['recipientDetails'])){
      header("location:./recipient/recipient.php");
    }
    else if(isset($_SESSION['adminDetails'])){
      header("location:./admin/adminmenu.php");
    }

    $cDate = new DateTime();
?>

<?php
  $email=$password="";
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST["password"];
    $selectQuery = "SELECT * from users WHERE UserEmail = '$email'";
    $applySelectQuery = mysqli_query($config,$selectQuery);
    if(mysqli_num_rows($applySelectQuery)>0){
      $fetchData = mysqli_fetch_assoc($applySelectQuery);
      $decryPassword = password_verify($password,$fetchData['UserPassword']);
      if($decryPassword){
        $role = intval($fetchData['RoleId']);
        $fetchEmail = $fetchData['UserEmail'];
        $userId = intval($fetchData['UserId']);
        if($role == 1){
          $_SESSION['donorDetails'] = ['userId'=>$userId,'userEmail'=>$fetchEmail,'role'=>$role];
          header('location:./donor/activity.php');
          echo $role;
        }else if($role == 2){
          $_SESSION['recipientDetails'] = ['userId'=>$userId,'userEmail'=>$fetchEmail,'role'=>$role];
          header('location:./recipient/centers.php');
        }else{
          $_SESSION['adminDetails'] = ['userId'=>$userId,'userEmail'=>$fetchEmail,'role'=>$role];
          header('location:./admin/adminmenu.php');
        }
      }else{
        $_SESSION['loginPasswordError'] = "Please enter Correct Password";
      }
    }else{
      $_SESSION['loginEmailError'] = "Please enter Correct Email";
    }

  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Appointment - Blood Donation - Activism & Campaign</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
  <meta name="author" content="xenioushk">
  <link rel="shortcut icon" href="images/favicon.png" />

  <!-- The styles -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" type="text/css">
  <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
  <link href="css/venobox.css" rel="stylesheet" type="text/css">
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
  <?php
    if(isset($_SESSION['loginEmailError'])){
  ?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['loginEmailError'] ?>
  </div>
  <?php }
    unset($_SESSION["loginEmailError"]);
  ?>

<?php
    if(isset($_SESSION['loginPasswordError'])){
  ?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['loginPasswordError'] ?>
  </div>
  <?php }
    unset($_SESSION["loginPasswordError"]);
  ?>

<?php
    if(isset($_SESSION['updated'])){
  ?>
  <div class="successs">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['updated'] ?>
  </div>
  <?php }
    unset($_SESSION["updated"]);
  ?>
  <!-- SECTION APPOINTMENT -->
  <div class="container">
    
  </div>
  <section class="section-appointment">

    <div class="container wow fadeInUp">

      <div class="row">

        <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">

          <figure class="appointment-img">
            <img src="images/appointment.jpg" alt="appointment image">
          </figure>
        </div> <!-- end col-lg-6 -->


        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

          <div class="appointment-form-wrapper text-center clearfix">
            <h3 class="join-heading">LOGIN YOUR ACCOUNT</h3>
            <form class="appointment-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return loginValidation()" >
              <div class="form-group col-md-12">
                <input oninput="loginE();" id="loginEmail" class="form-control" placeholder="Email" type="email" name='email' value="<?php echo $email ?>">
              </div>
              <div class="form-group col-md-12">
                <input oninput="loginP();" id="loginPassword" class="form-control" placeholder="Password" type="password" name="password" value=''>
              </div>

              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <button id="login_submit" class="btn-submit" type="submit" name="login">Login</button>
              </div>
              <p class="signin">Don't have an account yet? <a href="./signup.php">SignUp</a> </p>

            </form>

          </div> <!-- end .appointment-form-wrapper  -->

        </div> <!-- end .col-lg-6 -->

      </div> <!-- end .row  -->

    </div> <!-- end .container -->

  </section> <!-- end .appointment-section -->


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

  <!-- JavaScript files -->
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
  

  <script>
    function loginE(){
    let yourEmail = document.getElementById("loginEmail");
    let emailValue = document.getElementById('loginEmail').value;
    const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
    if(!emailPattern.test(emailValue)){
        yourEmail.style.outline = '2px solid red'
        yourEmail.style.border = 'none'
        return false
    }else{
        yourEmail.style.outline = '2px solid green'
        yourEmail.style.border = 'none'
        return true
    }
}

function loginP(){
    let password = document.getElementById("loginPassword");
    let passwordValue = document.getElementById('loginPassword').value;
    if(passwordValue.length<6){
        password.style.outline = '2px solid red'
        password.style.border = 'none'
        return false
    }else{
        password.style.outline = '2px solid green'
        password.style.border = 'none'
        return true
    }
}

    function loginValidation(){
        let loginError = []
        if(!loginE()){
            loginError.push(false)
        }

        if(!loginP()){
            loginError.push(false)
        }

        if(loginError.includes(false)){
            return false
        }else{
            return true
        }
    }
  </script>
</body>


</html>