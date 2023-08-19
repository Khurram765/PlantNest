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
  $name=$email=$encryptPassword=$role=$contact=$address=$city=$bloodGroup=$gender=$dob=$weight=$height = "";
  if(isset($_POST['signup'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encryptPassword = password_hash($password,PASSWORD_DEFAULT);
    $role = $_POST["role"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $bloodGroup = $_POST["bloodgroup"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    // echo "$name,$email,$encryptPassword,$role,$contact,$address,$city,$bloodGroup,$gender,$dob,$weight,$height";
    $checkEmailQuery = "SELECT userEmail FROM users WHERE userEmail = '$email'";
    $applyCheckQuery = mysqli_query($config,$checkEmailQuery);
    if(mysqli_num_rows($applyCheckQuery)==0){
      if($role == 1){
        // Calculate age
        $dateOfBirth = new DateTime($dob);
        $currentDate = new DateTime();
        $age = $dateOfBirth->diff($currentDate)->y;
        if($age<18){
          $_SESSION['ageError'] = "You are not eligible for blood donation because your age is less than 18";
        }

        if($weight<50 || $weight>110){
          $_SESSION['$weightError'] = "You are not eligible for blood donation because weight range should be in 50kg to 110kg range";
        }

        if($age>=18 && ($weight>50 || $weight<110)){
          $userQuery = "INSERT INTO `users`(`UserName`, `UserEmail`, `UserPassword`, `UserStatus`, `RoleId`) VALUES ('$name','$email','$encryptPassword','active',$role)";
          $applyUserQuery = mysqli_query($config,$userQuery);
          if($applyUserQuery){
            $userId = mysqli_insert_id($config);
            $donorQuery = "INSERT INTO `donor`(`DonorName`, `UserId`, `DonorContact`, `DonorAddress`, `CityId`, `GroupId`, `DonorGender`, `DonorDOB`, `DonorWeight`, `DonorHeight`) VALUES ('$name',$userId,'$contact','$address','$city','$bloodGroup','$gender','$dob','$weight','$height')";
            $applyDonorQuery = mysqli_query($config,$donorQuery);
            if($applyDonorQuery){
                $donorId = mysqli_insert_id($config);
                $_SESSION['donorDetails'] = ['userId'=>$userId,'userEmail'=>$email,'role'=>$role];
                header('location:./donor/activity.php');
                var_dump($_SESSION['donorDetails']);
            }
          }
        }
      }else{
        $userQueryTwo = "INSERT INTO `users`(`UserName`, `UserEmail`, `UserPassword`, `UserStatus`, `RoleId`) VALUES ('$name','$email','$encryptPassword','active',$role)";
        $applyUserQueryTwo = mysqli_query($config,$userQueryTwo);
        if($applyUserQueryTwo){
          $userId = mysqli_insert_id($config);
          $recipientQuery = "INSERT INTO `recipient`(`RecipientName`, `UserId`, `RecipientContact`, `RecipientAddress`, `CityId`, `GroupId`, `RecipientGender`, `RecipientDOB`, `RecipientWeight`, `RecipientHeight`) VALUES ('$name',$userId,'$contact','$address','$city','$bloodGroup','$gender','$dob','$weight','$height')";
          $applyRecipientQuery = mysqli_query($config,$recipientQuery);
          if($applyRecipientQuery){
            $recipientId = mysqli_insert_id($config);
            $_SESSION['recipientDetails'] = ['donorId'=>$recipientId,'userId'=>$userId,'userEmail'=>$email,'role'=>$role];
            header('location:./recipient/centers.php');
          }
        }
      }
    }else{
      $_SESSION['emailError'] = "This email has already registered";
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
    if(isset($_SESSION['emailError'])){
  ?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['emailError'] ?>
  </div>
  <?php }
    unset($_SESSION["emailError"]);
  ?>

  <?php
    if(isset($_SESSION['ageError'])){
  ?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['ageError'] ?>
  </div>
  <?php }
    unset($_SESSION["ageError"]);
  ?>

<?php
    if(isset($_SESSION['weightError'])){
  ?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php echo $_SESSION['weightError'] ?>
  </div>
  <?php }
    unset($_SESSION["weightError"]);
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
            <h3 class="join-heading">REGISTER YOURSELF</h3>
            <form class="appointment-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  onsubmit="return formValidation()">
              <div class="form-group col-md-6">
                <input oninput="nameValidation()" id="your_name" class="form-control" placeholder="Name" type="text" name='name' value='<?php echo $name ?>'>
              </div>
              <div class="form-group col-md-6">
                <input oninput="emailValidation()" id="your_email" class="form-control" placeholder="Email" type="email" name='email' value='<?php echo $email ?>'>
              </div>
              <div class="form-group col-md-6">
                <input oninput="passwordValidation()" id="your_password" class="form-control" placeholder="Password" type="password" name="password" value=''>
              </div>
              <div class="form-group col-md-6">
                <div class="select-style">
                  <select class="form-control" name="role" id="role">
                    <option  selected value=''>Role</option>
                    <?php
                      $roleQuery = "SELECT * FROM `role` LIMIT 2";
                      $applyRoleQuery = mysqli_query($config,$roleQuery);
                      if(mysqli_num_rows($applyRoleQuery)>0){
                        while($fetchRole = mysqli_fetch_assoc($applyRoleQuery)){
                    ?>
                    <option value='<?php echo $fetchRole['RoleId'] ?>'><?php echo $fetchRole['RoleName'] ?></option>
                    <?php }}?>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <input id="your_phone" class="form-control" placeholder="Contact" type="Number" name='contact' value='<?php echo $contact ?>'>
              </div>


              <div class="form-group col-md-6">
                <input id="your_address" class="form-control" placeholder="Address" type="text" name='address' value='<?php echo $address ?>'>
              </div>

              <div class="form-group col-md-6">
                <div class="select-style">
                  <select class="form-control" name="city" id="city">
                    <option selected value=''>City</option>
                    <?php
                      $cityQuery = "SELECT * FROM `city`";
                      $applyCityQuery = mysqli_query($config,$cityQuery);
                      if(mysqli_num_rows($applyCityQuery)>0){
                        while($fetchCity = mysqli_fetch_assoc($applyCityQuery)){
                    ?>
                    <option value='<?php echo $fetchCity['CityId'] ?>'><?php echo $fetchCity['CityName'] ?></option>
                    <?php }}?>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <div class="select-style">
                  <select class="form-control" name="bloodgroup" id="bloodgroup">
                    <option selected value=''>Blood Group</option>
                    <?php
                      $bloodGroupQuery = "SELECT * FROM `bloodgroup`";
                      $applybloodGroupQuery = mysqli_query($config,$bloodGroupQuery);
                      if(mysqli_num_rows($applybloodGroupQuery)>0){
                        while($fetchBloodGroup = mysqli_fetch_assoc($applybloodGroupQuery)){
                    ?>
                    <option value='<?php echo $fetchBloodGroup['GroupId'] ?>'><?php echo $fetchBloodGroup['GroupName'] ?></option>
                    <?php }}?>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <div class="select-style">
                  <select class="form-control" name="gender" id="gender">
                    <option selected value=''>Gender</option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <input onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" id="your_date" class="form-control" placeholder="D.O.B" type="text" name='dob' value='<?php echo $dob ?>'>
              </div>

              <div class="form-group col-md-6">
                <input id="your_weight" class="form-control" placeholder="Weight in Kg" type="number" name='weight' value='<?php echo $weight ?>'>
              </div>

              <div class="form-group col-md-6">
                <input step="0.01" id="your_height" class="form-control" placeholder="Height in Ft" type="number" name='height' value='<?php echo $height ?>'>
              </div>

              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <button id="btn_submit" class="btn-submit" type="submit" name="signup">Register</button>
              </div>
              <p class="signin">Already have an acount ? <a href="./login.php">Signin</a> </p>

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
  <script src="./js/validation.js"></script>
</body>

</html>