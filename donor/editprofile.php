<?php
    include("../config.php");
    session_start();
    if(isset($_SESSION['donorDetails'])){
        $email = $_SESSION['donorDetails']['userEmail'];
        $userId = intval($_SESSION['donorDetails']['userId']);
        $selectDonorDetails = "SELECT * FROM donor WHERE UserId = $userId";
        $applySelectDonorDetails = mysqli_query($config,$selectDonorDetails);
        $fetchDonorDetails = mysqli_fetch_assoc($applySelectDonorDetails);
        $donorName = $fetchDonorDetails['DonorName'];
        $donorId = intval($fetchDonorDetails['DonorId']);
        $cityId = intval($fetchDonorDetails['CityId']);
        $groupId = intval($fetchDonorDetails['GroupId']);
    }else if(isset($_SESSION['recipientDetails'])){
        header("location:../recipient/centers.php");
    }else if(isset($_SESSION['adminDetails'])){
        header("location:../admin/adminmenu.php");
    }else{
        header("location:../signup.php");
    }

    
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("location:../index.php");
    }

    $fetchDonorDetails = "SELECT donor.DonorName,users.UserEmail,donor.DonorContact,donor.DonorAddress,donor.CityId FROM `donor` INNER JOIN users ON donor.UserId = users.UserId WHERE DonorId = $donorId;";
    $applyFetchDonor = mysqli_query($config,$fetchDonorDetails);
    $getDetails = mysqli_fetch_assoc($applyFetchDonor);
    $name = $getDetails['DonorName'];
    $contact = $getDetails['DonorContact'];
    $address = $getDetails['DonorAddress'];

    if(isset($_POST['verify'])){
        $oldPassword = $_POST['oldpassword'];
        $getPasswordQuery = "SELECT userPassword FROM `users` WHERE UserId = $userId;";
        $applyGetPassword = mysqli_query($config,$getPasswordQuery);
        if($applyGetPassword){
            $fetchPassowrd = mysqli_fetch_assoc($applyGetPassword);
            $verifyPassword = password_verify($oldPassword,$fetchPassowrd['userPassword']);
            if($verifyPassword){
                $_SESSION['verified'] = "Verified";
            }else{
                $_SESSION['verifyError'] = "Please enter correct password";
            }
        }
    }

    if(isset($_POST['edit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $password = $_POST['password'];
        $encryptPassword = password_hash($password,PASSWORD_DEFAULT);
        $checkEmailQuery = "SELECT userEmail FROM users WHERE userEmail = '$email' AND userId != $userId";
        $applyCheckEmail = mysqli_query($config,$checkEmailQuery);
        if(mysqli_num_rows($applyCheckEmail)>0){
            $_SESSION['emailError'] = "This email has already registered, Please try different one";
        }else{
            $updateUserTable = "UPDATE `users` SET `UserName`='$name',`UserEmail`='$email',`UserPassword`='$encryptPassword' WHERE UserId = $userId";
            $applyUpdateUser = mysqli_query($config,$updateUserTable);
            if($applyUpdateUser){
                $updateDonorTable = "UPDATE `donor` SET `DonorName`='$name',`DonorContact`='$contact',`DonorAddress`='$address',`CityId`= $city WHERE userId = $userId";
                $applyUpdateDonor = mysqli_query($config,$updateDonorTable);
                if($applyUpdateDonor){
                    session_unset();
                    session_destroy();
                    session_start();
                    $_SESSION['updated'] = "Your profile updated successfully, Please login again";
                    header("location:../login.php");
                }
            }
        }
    }

    

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../panel_assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../panel_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../panel_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../panel_assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <style>
        .tableContainer{
            /* width: 78vw !important; */
            padding: 30px 30px;
            /* margin-left: 250px; */
            background-color: white;
            /* min-height: 100vh; */
            
        }

        .content{
            min-height: auto;
            /* overflow: hidden; */
        }

        /* .dataTables_wrapper {
            overflow: scroll;
        } */

        .form label .input {
    width: 100%;
    padding: 10px 10px 10px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 10px;
}
    </style>
</head>

<body style="min-height:100vh">

<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-danger"><i class="fa fa-hashtag me-2"></i>DONOR</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../panel_assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $donorName; ?></h6>
                        <span>Donor</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="./activity.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>My Activity</a>
                    <a href="./centers.php" class="nav-item nav-link "><i class="fa fa-hospital me-2"></i>Centers</a>
                    <a href="./bookappointment.php" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Book Appointment</a>
                    <a href="./pending.php" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>Pending Requests</a>
                    <a href="./schedule.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>My Schedule</a>
                    <a href="./events.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Events</a>
                    <a href="./editprofile.php" class="nav-item nav-link active"><i class="fa fa-pen me-2"></i>Edit Profile</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <div class="navbar-nav align-items-center ms-auto">

                <div class="nav-item">
                    <a href="./notification.php" class="nav-link" >
                    <i style="position:relative" class="fa fa-bell me-lg-2">
                                <?php 
                                    $notiQuantity = "SELECT * FROM notificationreceiver WHERE userId = $userId AND notificationreceiver.status = 'recieved'";
                                    $applyNotiQuantity = mysqli_query($config,$notiQuantity);
                                    if(mysqli_num_rows($applyNotiQuantity)>0){
                                ?>
                                <div style="height:13px;width:14px;background:red;border-radius:30px;position:absolute;left:18%;bottom:42%;color:white;font-size:11px;text-align:center;font-family:Heebo"><?php echo mysqli_num_rows($applyNotiQuantity) ?></div>
                                <?php }?>
                            </i>
                        <span class="d-none d-lg-inline-flex">Notification</span>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="../panel_assets/img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?php echo $donorName; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <button href="#" class="dropdown-item" type="submit" name="logout">Log Out</button>
                            
                            </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        <?php
            if(isset($_SESSION['verifyError'])){
        ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $_SESSION['verifyError'] ?>
        </div>
         <?php }
            unset($_SESSION["verifyError"]);
        ?>

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
            if(!isset($_SESSION['verified'])){

            
        ?>
        <div class="formContainer">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <p class="title">VERIFY IT'S YOU</p>
                    <label>
                        <input placeholder="Enter Old Password" type="password" name="oldpassword" id="oldpassword" class="input" onfocus="" value="">
                        <!-- <span>Quantity (In ml)</span> -->
                    </label>
                    <button class="submit" type="submit" name="verify">Verify</button>
                </form>
            </div>
        </div>

        <?php }else{?>

        <div class="formContainer">

            <div class="container-fluid d-flex justify-content-center align-items-center">
                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return editValidation();">
                    <p class="title">EDIT PROFILE</p>
                    
                    <!-- <div class="flex">
                        <label style="width:50%;">
                            <input required="" placeholder="" type="text" class="input">
                            <span>Firstname</span>
                        </label>
    
                        <label style="width:50%;">
                            <input required="" placeholder="" type="text" class="input">
                            <span>Lastname</span>
                        </label>
                    </div> -->
    
                    <label>
                        <input placeholder="Name" type="text" name="name" id="name" class="input" onfocus="focusSetup(document.getElementById('name'))" value="<?php echo $name ?>">
                        <!-- <span>Quantity (In ml)</span> -->
                    </label>

                    <label>
                        <input placeholder="Email" type="email" name="email" id="email" class="input" onfocus="focusSetup(document.getElementById('email'))" value="<?php echo $email ?>">
                        <!-- <span>Quantity (In ml)</span> -->
                    </label>

                    <label>
                        <input placeholder="Contact" type="number" name="contact" id="contact" class="input" onfocus="focusSetup(document.getElementById('contact'))" value="<?php echo $contact ?>">
                        <!-- <span>Quantity (In ml)</span> -->
                    </label>

                    <label>
                        <input placeholder="Address" type="text" name="address" id="address" class="input" onfocus="focusSetup(document.getElementById('address'))" value="<?php echo $address ?>">
                        <!-- <span>Quantity (In ml)</span> -->
                    </label>

                    <label>
                        <div class="mb-3">
                            <select class="form-select form-select-lg" name="city" id="city" onfocus="focusSetup(document.getElementById('city'))">
                                <option selected value="">SELECT CITY</option>
                                <?php 
                                    $centerQuery = "SELECT * FROM `city`";
                                    $applyCenterQuery = mysqli_query($config,$centerQuery);
                                    if(mysqli_num_rows($applyCenterQuery)>0){
                                        while($fetchCenter = mysqli_fetch_assoc($applyCenterQuery)){

                                ?>
                                <option <?php if ($cityId === intval($fetchCenter['CityId'])) echo 'selected'; ?> value="<?php echo $fetchCenter['CityId'] ?>"><?php echo $fetchCenter['CityName'] ?></option>
                                <?php }}?>
                            </select>
                        </div>
                    </label>

                    <label>
                        <input placeholder="Password" type="password" name="password" id="password" class="input" onfocus="focusSetup(document.getElementById('password'))" value="">
                    </label>
    
                    
                    <button class="submit" type="submit" name="edit">Edit</button>
                </form>
            </div>
        </div>
        <?php } 
            unset($_SESSION['verified']);
        ?>
    </div>






        <!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../panel_assets/lib/chart/chart.min.js"></script>
    <script src="../panel_assets/lib/easing/easing.min.js"></script>
    <script src="../panel_assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../panel_assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../panel_assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../panel_assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../panel_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../panel_assets/js/main.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title='Simple DataTable';
	// DataTable initialisation
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"buttons": [
				'colvis',
				'copyHtml5',
        'csvHtml5',
				'excelHtml5',
        'pdfHtml5',
				'print'
			]
		}
	);
});
    </script>
    <script>
        function editValidation(){
            let name = document.getElementById("name");
            let email = document.getElementById("email");
            let contact = document.getElementById("contact");
            let address = document.getElementById("address");
            let city = document.getElementById("city");
            let password = document.getElementById("password");
            const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            const regex = /^(\+92|0)?[1-9]\d{9}$/;
            let errorArray = [];
            if(name.value.length<6){
                name.style.border = "2px solid red";
                errorArray.push(false);
            }

            if(!emailPattern.test(email.value)){
                email.style.border = "2px solid red";
                errorArray.push(false);
            }

            if(!regex.test(contact.value)){
                contact.style.border = "2px solid red";
                errorArray.push(false);
            }

            if(address.value == "" || address.value.length<6){
                address.style.border = "2px solid red";
                errorArray.push(false);
            }

            if(city.value == ""){
                city.style.border = "2px solid red";
                errorArray.push(false);
            }

            if(password.value.length == "" || password.value.length<6){
                password.style.border = "2px solid red";
                errorArray.push(false);
            }

            if(errorArray.includes(false)){
                return false;
            }else{
                return true;
            }


        }

        function focusSetup(field){
            field.style.border = "1px solid #ced4da";
        }
        

        
    </script>
</body>

</html>