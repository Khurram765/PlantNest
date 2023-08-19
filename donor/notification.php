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
                    <a href="./bookappointment.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Book Appointment</a>
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
                    <a href="./notification.php" class="nav-link active" >
                        <i class="fa fa-bell me-lg-2"></i>
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
        
        <section class="section-50">
    <div class="container">
      <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>
      <div class="notification-ui_dd-content">
        <?php 
          $notificationQuery = "SELECT notifications.message,notificationreceiver.UserId,notificationreceiver.CreatedAt,notificationreceiver.status FROM `notificationreceiver` INNER JOIN notifications ON notificationreceiver.NotificationId = notifications.NotificationId WHERE UserId = $userId";
          $applyNotification = mysqli_query($config,$notificationQuery);
          if(mysqli_num_rows($applyNotification)>0){
            while($fetchNotification = mysqli_fetch_assoc($applyNotification)){
        ?>
        <div class="<?php if ($fetchNotification['status'] === 'seen'): echo 'notification-list notification-list--read'; else:  echo 'notification-list notification-list--unread';endif; ?>">
          <div class="notification-list_content">
            <div class="notification-list_detail">
              <!-- <p><b>Aryan</b> reacted to your post</p> -->
              <p class="text-muted"><?php echo $fetchNotification['message'] ?></p>
              <p class="text-muted"><small><?php echo $fetchNotification['CreatedAt'] ?></small></p>
            </div>
          </div>
        </div>
        <?php }}else{
          echo "<h1 style='text-align:center; opacity:0.4; font-size:24px;margin-top:25%'>NOTIFICATIONS UNAVAILAIBLE</h1>";
        } ?>
        <!-- <div class="notification-list notification-list--unread">
          <div class="notification-list_content">
            <div class="notification-list_detail">
              <p><b>Raj Kumar</b> liked your post</p>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
              <p class="text-muted"><small>10 mins ago</small></p>
            </div>
          </div>
        </div>
        <div class="notification-list notification-list--read">
          <div class="notification-list_content">
            <div class="notification-list_detail">
              <p><b>Rakesh</b> reacted to your post</p>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
              <p class="text-muted"><small>10 mins ago</small></p>
            </div>
          </div>
        </div>
        <div class="notification-list notification-list--read">
          <div class="notification-list_content">
            <div class="notification-list_detail">
              <p><b>Bittu</b> reacted to your post</p>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
              <p class="text-muted"><small>10 mins ago</small></p>
            </div>
          </div>
        </div>
        <div class="notification-list notification-list--unread">
          <div class="notification-list_content">
            <div class="notification-list_detail">
              <p><b>Prince</b> reacted to your post</p>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
              <p class="text-muted"><small>10 mins ago</small></p>
            </div>
          </div>
        </div>
        <div class="notification-list notification-list--read">
          <div class="notification-list_content">
            <div class="notification-list_detail">
              <p><b>Adi Shots</b> reacted to your post</p>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
              <p class="text-muted"><small>10 mins ago</small></p>
            </div>
          </div>
        </div> -->
      </div>
      
    </div>
  </section>
        
    </div>
    <?php
      $updateNoti = "UPDATE `notificationreceiver` SET `status`='seen' WHERE UserId = $userId AND notificationreceiver.status = 'recieved'";
      $applyUpdate = mysqli_query($config,$updateNoti);
      if(!$applyUpdate){
        echo "Query Failed";
      }
    ?>





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

    
</body>

</html>