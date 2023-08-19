<?php
    include("../config.php");
    session_start();
    if(isset($_SESSION['adminDetails'])){
        $email = $_SESSION['adminDetails']['userEmail'];
        
    }else if(isset($_SESSION['donorDetails'])){
        header("location:../donor/donor.php");
    }else if(isset($_SESSION['recipientDetails'])){
        header("location:../recipient/centers.php");
    }else{
        header("location:../signup.php");
    }
    
    

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("location:../signup.php");
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

<body style="background-color:white;">

<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-danger"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../panel_assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <!-- <h6 class="mb-0"><?php echo "Admin"; ?></h6> -->
                        <span>ADMIN</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    
                    <a href="./adminmenu.php" class="nav-item nav-link active"><i class="fa fa-bars me-2"></i>Menu</a>
                    <a href="./donorrequests.php" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>Donor Requests</a>
                    <a href="./recipientrequests.php" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>Recipient Request</a>
                    <a href="./donorschedule.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Donors Schedule</a>
                    <a href="./recipientschedule.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Recpt. Schedule</a>
                    <a href="./donoractivity.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Donors Activity</a>
                    <a href="./inventory.php" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Inventory</a>
                    <a href="./bloodcenter.php" class="nav-item nav-link"><i class="fa fa-hospital me-2"></i>Blood Centers</a>
                    <a href="./cities.php" class="nav-item nav-link"><i class="fa fa-city me-2"></i>Manage Cities</a>
                    <a href="./messages.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Contact Messages</a>
                    <a href="./drives.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Donation Drives</a>
                    <a href="./notifications.php" class="nav-item nav-link"><i class="fa fa-bell me-2"></i>Notifications</a>
                    <a href="./sendnotifications.php" class="nav-item nav-link"><i class="fa fa-paper-plane me-2"></i>Send Notifications</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <div  class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../panel_assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo "Admin"; ?></span>
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
            


<!-- Sale & Revenue Start -->
<div style="height:80vh" class="adminMenu container-fluid pt-4 px-4 d-flex justify-content-center align-items-center">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i style="height: 48px;" class="bi bi-droplet-fill fa-3x text-red"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Donors</p>
                                <?php
                                    $donorsQuery = "SELECT * FROM `users` WHERE RoleId = 1";
                                    $applyDonorsQuery = mysqli_query($config,$donorsQuery);
                                ?>
                                <h6 class="mb-0"><?php echo mysqli_num_rows($applyDonorsQuery) ?></h6>
                                <a href="./donordetails.php">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i style="height: 48px;" class="bi bi-person-check-fill fa-3x text-red"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Recipients</p>
                                <?php
                                    $recipientsQuery = "SELECT * FROM `users` WHERE RoleId = 2";
                                    $applyRecipientsQuery = mysqli_query($config,$recipientsQuery);
                                ?>
                                <h6 class="mb-0"><?php echo mysqli_num_rows($applyRecipientsQuery) ?></h6>
                                <a href="./recipientdetails.php">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-clock fa-3x text-red"></i>
                            <div class="ms-3">
                                <p class="mb-2">Donors Requests</p>
                                <?php
                                    $dRequests = "SELECT * FROM `requesttable` WHERE RequestStatus = 'pending' AND RecipientId IS NULL";
                                    $applydRequests = mysqli_query($config,$dRequests);
                                ?>
                                <h6 class="mb-0"><?php echo mysqli_num_rows($applydRequests) ?></h6>
                                <a href="./donorrequests.php">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-clock fa-3x text-red"></i>
                            <div class="ms-3">
                                <p class="mb-2">Recipient Requests</p>
                                <?php
                                    $rRequests = "SELECT * FROM `requesttable` WHERE RequestStatus = 'pending' AND DonorId IS NULL";
                                    $applyrRequests = mysqli_query($config,$rRequests);
                                ?>
                                <h6 class="mb-0"><?php echo mysqli_num_rows($applyrRequests) ?></h6>
                                <a href="recipientrequests.php">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i style="height:48px" class="bi bi-file-medical-fill fa-3x text-red"></i>
                            <div class="ms-3">
                                <p class="mb-2">Blood Groups</p>
                                <?php
                                    $bloodGroups = "SELECT * FROM `bloodgroup`";
                                    $applyBloodGroups = mysqli_query($config,$bloodGroups);
                                ?>
                                <h6 class="mb-0"><?php echo mysqli_num_rows($applyBloodGroups) ?></h6>
                                <a href="./bloodgroups.php">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-calendar fa-3x text-red"></i>
                            <div class="ms-3">
                                <p class="mb-2">FAQS</p>
                                <?php
                                    $drive = "SELECT * FROM `faqs` ";
                                    $applyDrive = mysqli_query($config,$drive);
                                ?>
                                <h6 class="mb-0"><?php echo mysqli_num_rows($applyDrive) ?></h6>
                                <a href="./faqs.php">View Details</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- Sale & Revenue End -->

            
        </div>

        

        


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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