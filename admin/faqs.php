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


    if(isset($_POST['updatefaq'])){
        $fId = intval($_POST["fId"]);
        $fQuestion = $_POST["fq"];
        $fAnswer = $_POST["fa"];
        
        $updateCity = "UPDATE `faqs` SET `fQuestion`='$fQuestion',`fAnswer`='$fAnswer' WHERE fId = $fId";
        $applyUpdateCity = mysqli_query($config,$updateCity);
        if($applyUpdateCity){
            header("location:./faqs.php");
        }
    }

    if(isset($_POST['addfaq'])){
        $fQuestion = $_POST["fq"];
        $fAnswer = $_POST["fa"];
        echo "$fQuestion,$fAnswer";
        
        $insertCity = "INSERT INTO `faqs`(`fQuestion`,`fAnswer`) VALUES ('$fQuestion','$fAnswer')";
        $applyInsertCity = mysqli_query($config,$insertCity);
        if($applyInsertCity){
            header("location:./faqs.php");
        }
    }

    if(isset($_POST['delete'])){
        $fId = $_POST['fId'];
        $deleteF = mysqli_query($config,"DELETE FROM faqs WHERE fId = $fId");
        if($deleteF){
            header("location:./faqs.php");
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
                    
                    <a href="./adminmenu.php" class="nav-item nav-link"><i class="fa fa-bars me-2"></i>Menu</a>
                    <!-- <a href="" class="nav-item nav-link"><i class="fa fa-table me-2"></i>View Donors</a>
                    <a href="" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>View Recipients</a> -->
                    <a href="./donorrequests.php" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>Donor Requests</a>
                    <a href="./recipientrequests.php" class="nav-item nav-link"><i class="fa fa-clock me-2"></i>Recipient Request</a>
                    <a href="./donorschedule.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Donors Schedule</a>
                    <a href="./recipientschedule.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Recpt. Schedule</a>
                    <a href="./donoractivity.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Donors Activity</a>
                    <a href="./inventory.php" class="nav-item nav-link"><i class="fa fa-box me-2"></i>Inventory</a>
                    <a href="./bloodcenter.php" class="nav-item nav-link"><i class="fa fa-hospital me-2"></i>Blood Centers</a>
                    <!-- <a href="" class="nav-item nav-link"><i class="fa fa-pen me-2"></i>Blood Groups</a> -->
                    <a href="./cities.php" class="nav-item nav-link"><i class="fa fa-city me-2"></i>Manage Cities</a>
                    <a href="./messages.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Contact Messages</a>
                    <a href="./drives.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Donation Drives</a>
                    <a href="./notifications.php" class="nav-item nav-link"><i class="fa fa-bell me-2"></i>Notifications</a>
                    <a href="./sendnotifications.php" class="nav-item nav-link"><i class="fa fa-paper-plane me-2"></i>Send Notifications</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
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

            <?php
            if(isset($_SESSION['nameError'])){
            ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $_SESSION['nameError'] ?>
            </div>
            <?php }
                unset($_SESSION["nameError"]);
            ?>


            <!-- Modal Form -->
        <div id="ModalLoginForm0" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="opacity:0.8; font-family:Heebo;" class="modal-title">Add FAQS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return updateValidation(0);">
          <div class="mb-3">
            <label class="form-label">FAQ Question</label>
            <input type="text" class="form-control fq0" name="fq" value="" onfocus="focusSetup(document.querySelector(`.fq0`))">
          </div>
          <div class="mb-3">
            <label class="form-label">FAQ Answer</label>
            <input type="text" class="form-control fa0" name="fa" value="" onfocus="focusSetup(document.querySelector(`.fa0`))">
          </div>
          
          
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="addfaq">Add FAQ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
        <!-- End of Modal Form -->
        </div>

        <!-- Table -->
        <div style="overflow-y: scroll;" class="tableContainer content">
            <div class="d-flex justify-content-between align-items-center mt-5 tableHeader">
                <h3 style="margin:0 !important;">FAQS</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalLoginForm0">Create New +</button>
            </div>
            <hr class="mb-5">
            <!-- <h1 class="text-center my-4">BLOOD GROUPS</h1> -->
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>S#</th>
			<th>FAQ Question</th>
			<th>FAQ Answer</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody>
        <?php 
            $activityQuery = "SELECT * FROM `faqs`";
            $applyActivityQuery = mysqli_query($config,$activityQuery);
            $i = 0;
            if(mysqli_num_rows($applyActivityQuery)>0){
                while($fetchActivity = mysqli_fetch_assoc($applyActivityQuery)){

        ?>
		<tr>
			<td><?php echo ++$i ?></td>
			<td><?php echo $fetchActivity['fQuestion'] ?></td>
			<td><?php echo $fetchActivity['fAnswer'] ?></td>
			<td class="d-flex">
                
                    
                    <button type="submit" class="btn btn-success btn-update me-1" data-bs-toggle="modal" data-bs-target="#ModalLoginForm<?php echo $i ?>" >
                        Update
                    </button>
                
                    <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input hidden type="number" name='fId' value="<?php echo $fetchActivity['fId'] ?>">
                        <button type="submit" class="btn btn-danger" name="delete" >
                            Delete
                        </button>
                    </form>    
            </td>
            

			
		</tr>
        <!-- Modal Form -->
        <div id="ModalLoginForm<?php echo $i ?>" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="opacity:0.8; font-family:Heebo;" class="modal-title">Update FAQS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return updateValidation(<?php echo $i ?>);">
          <input hidden id="gi" type="" name="fId" value="<?php echo $fetchActivity['fId'] ?>">
          <div class="mb-3">
            <label class="form-label">FAQ Question</label>
            <input type="text" class="form-control fq<?php echo $i ?>" name="fq" value="<?php echo $fetchActivity['fQuestion'] ?>" onfocus="focusSetup(document.querySelector(`.fq<?php echo $i ?>`))">
          </div>
          <div class="mb-3">
            <label class="form-label">FAQ Answer</label>
            <input type="text" class="form-control fa<?php echo $i ?>" name="fa" value="<?php echo $fetchActivity['fAnswer'] ?>" onfocus="focusSetup(document.querySelector(`.fa<?php echo $i ?>`))">
          </div>
          
          
          <div class="mb-3">
            <button type="submit" class="btn btn-success" name="updatefaq">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
        <!-- End of Modal Form -->
        <?php }}?>
		
	</tbody>
</table>

            </div>
        
        <!-- End Table -->

            


            

            

        

        


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

    
    <script>
        function updateValidation(i){
            let fQuestion = document.querySelector(`.fq${i}`);
            let fAnswer = document.querySelector(`.fa${i}`);
            
            let errorArray = [];
            
            if(fQuestion.value == ""){
                fQuestion.style.border = '2px solid red';
                errorArray.push(false);
            }

            if(fAnswer.value == ""){
                fAnswer.style.border = '2px solid red';
                errorArray.push(false);
            }

           
            
            if(errorArray.includes(false)){
                return false
            }else{
                return true
            }
        }

        function focusSetup(field){
            field.style.border = "1px solid #ced4da";
        }
    </script>

    
</body>

</html>