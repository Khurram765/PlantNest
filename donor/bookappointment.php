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

    $timings=$appointmentDate=$quantity=$center="";
    if(isset($_POST['appointment'])){
        $timings = $_POST['timings'];
        $appointmentDate = $_POST['appointmentDate'];
        $quantity = $_POST['quantity'];
        $center = $_POST['center'];
        $currentDate = date("Y-m-d");
        if($appointmentDate<=$currentDate){
            $_SESSION['appointmentError'] = "Please select future date for appointment";
        }else{
            $query = "SELECT DonationDate FROM donoractivity WHERE donorId = $donorId ORDER BY DonationDate DESC LIMIT 1;";
            $applyQuery = mysqli_query($config,$query);
            if(mysqli_num_rows($applyQuery)>0){
                $row = mysqli_fetch_assoc($applyQuery);
                $donationDate = strtotime($row['DonationDate']);
                $todayDate = strtotime($currentDate);
                $months = (date('Y', $todayDate) - date('Y', $donationDate)) * 12 + (date('m', $todayDate) - date('m', $donationDate));
                if($months<=3){
                    $_SESSION['date'] = "You are not eligible for blood donation because your last blood donation was within the past 3 months.";
                }else{
                    $checkPendingQuery = "SELECT * FROM `requesttable` WHERE donorId = $donorId AND RequestStatus = 'pending';";
                    $applyCheckPendingQuery = mysqli_query($config,$checkPendingQuery);
                    if(mysqli_num_rows($applyCheckPendingQuery)>0){
                        $_SESSION['date'] = "You already applied for the appointment";
                    }else{
                        $checkAppointmentQuery = "SELECT appointment.AppointmentStatus,requesttable.DonorId FROM `appointment` INNER JOIN requesttable ON appointment.RequestId = requesttable.RequestId WHERE requesttable.DonorId = $donorId AND AppointmentStatus = 'coming';";
                        $applyCheckAppointment = mysqli_query($config,$checkAppointmentQuery);
                        if(mysqli_num_rows($applyCheckAppointment)>0){
                            $_SESSION['date'] = "Your booking is already confirmed";
                        }else{
                            $insertRequestQuery = "INSERT INTO `requesttable`(`RecipientId`, `DonorId`, `GroupId`, `Timings`, `RequestDate`, `Quantity`, `CenterId`, `RequestStatus`, `CreatedAt`, `UpdatedAt`) VALUES (NULL,$donorId,$groupId,'$timings','$appointmentDate',$quantity,$center,'pending',NOW(),NOW())";
                            $applyRequestQuery = mysqli_query($config,$insertRequestQuery);
                            if($applyRequestQuery){
                                $_SESSION['success'] = "Your request recieved successfully, we will notify you when your appointment will confirmed";
                                header("location:./activity.php");
                            }
                        }
                    }
                }
            }else{
                $checkPendingQuery = "SELECT * FROM `requesttable` WHERE donorId = $donorId AND RequestStatus = 'pending';";
                $applyCheckPendingQuery = mysqli_query($config,$checkPendingQuery);
                if(mysqli_num_rows($applyCheckPendingQuery)>0){
                    $_SESSION['date'] = "You already applied for the appointment";
                }else{
                    $checkAppointmentQuery = "SELECT appointment.AppointmentStatus,requesttable.DonorId FROM `appointment` INNER JOIN requesttable ON appointment.RequestId = requesttable.RequestId WHERE requesttable.DonorId = $donorId AND AppointmentStatus = 'coming';";
                    $applyCheckAppointment = mysqli_query($config,$checkAppointmentQuery);
                    if(mysqli_num_rows($applyCheckAppointment)>0){
                        $_SESSION['date'] = "Your booking is already confirmed";
                    }else{
                        $insertRequestQuery = "INSERT INTO `requesttable`(`RecipientId`, `DonorId`, `GroupId`, `Timings`, `RequestDate`, `Quantity`, `CenterId`, `RequestStatus`, `CreatedAt`, `UpdatedAt`) VALUES (NULL,$donorId,$groupId,'$timings','$appointmentDate',$quantity,$center,'pending',NOW(),NOW())";
                        $applyRequestQuery = mysqli_query($config,$insertRequestQuery);
                        if($applyRequestQuery){
                            $_SESSION['success'] = "Your request recieved successfully, we will notify you when your appointment will confirmed";
                            header("location:./activity.php");
                        }
                    }
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
                    <a href="./bookappointment.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Book Appointment</a>
                    <a href="./pending.php" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>Pending Requests</a>
                    <a href="./schedule.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>My Schedule</a>
                    <a href="./events.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Events</a>
                    <a href="./editprofile.php" class="nav-item nav-link"><i class="fa fa-pen me-2"></i>Edit Profile</a>
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
            if(isset($_SESSION['appointmentError'])){
        ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $_SESSION['appointmentError'] ?>
        </div>
         <?php }
            unset($_SESSION["appointmentError"]);
        ?>

        <?php
            if(isset($_SESSION['date'])){
        ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $_SESSION['date'] ?>
        </div>
         <?php }
            unset($_SESSION["date"]);
        ?>

        <div class="formContainer">

            <div class="container-fluid d-flex justify-content-center align-items-center">
                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return appointmentValidation();">
                    <p class="title">BOOK APPOINTMENT</p>
                    <label>
                        <div class="mb-3">
                            <select class="form-select form-select-lg" name="timings" id="timings" onfocus="focusSetup(document.getElementById('timings'))">
                                <option selected value="">SELECT TIMINGS</option>
                                <option value="9-12">9-12</option>
                                <option value="12-3">12-3</option>
                                <option value="3-6">3-6</option>
                            </select>
                        </div>
                    </label>
    
                    <label>
                        <input onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"  placeholder="Select Date" type="text" id="appointmentDate" name="appointmentDate" class="input" onfocus="focusSetup(document.getElementById('appointmentDate'))" value="<?php echo $appointmentDate ?>">
                        
                    </label>
                    <label>
                        <input placeholder="Quantity (In ml)" type="number" name="quantity" id="quantity" class="input" onfocus="focusSetup(document.getElementById('quantity'))" value="<?php echo $quantity ?>">
                        <!-- <span>Quantity (In ml)</span> -->
                    </label>
                    <label>
                        <div class="mb-3">
                            <select class="form-select form-select-lg" name="center" id="center" onfocus="focusSetup(document.getElementById('center'))">
                                <option selected value="">SELECT CENTER</option>
                                <?php 
                                    $centerQuery = "SELECT * FROM `bloodcenter` WHERE CityId = $cityId";
                                    $applyCenterQuery = mysqli_query($config,$centerQuery);
                                    if(mysqli_num_rows($applyCenterQuery)>0){
                                        while($fetchCenter = mysqli_fetch_assoc($applyCenterQuery)){

                                ?>
                                <option value="<?php echo $fetchCenter['CenterId'] ?>"><?php echo $fetchCenter['CenterName'] ?></option>
                                <?php }}?>
                            </select>
                        </div>
                    </label>
                    <button class="submit" type="submit" name="appointment">Submit</button>
                    
                </form>
            </div>
        </div>
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
        function appointmentValidation(){
            let timings = document.getElementById("timings");
            let appointmentDate = document.getElementById("appointmentDate");
            let quantity = document.getElementById("quantity");
            let center = document.getElementById("center");
            let error = [];
            if(timings.value == ""){
                timings.style.border = "2px solid red";
                error.push(false);
            }
            if(appointmentDate.value == ""){
                appointmentDate.style.border = "2px solid red";
                error.push(false);
            }
            if(quantity.value == ""){
                quantity.style.border = "2px solid red";
                error.push(false);
            }
            if(center.value == ""){
                center.style.border = "2px solid red";
                error.push(false);
            }
            if(error.includes(false)){
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