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

    if(isset($_POST['approve'])){
        $requestId = intval($_POST['requestid']);
        $requestDate = $_POST['requestdate'];
        $groupId = $_POST['groupid'];
        $centerId = $_POST['centerid'];
        $quantity = $_POST['quantity'];
        
        // echo "$requestId,$requestDate,$groupId,$centerId";
        $checkInventory = "SELECT * FROM inventory WHERE GroupId = $groupId AND CenterId = $centerId AND Quantity >= $quantity AND ExpirationDate>$requestDate";
        $applyCheckInventory = mysqli_query($config,$checkInventory);
        if(mysqli_num_rows($applyCheckInventory)>0){
            $row = mysqli_fetch_assoc($applyCheckInventory);
            $updatedQuantity = intval($row['Quantity']) - $quantity;
            $inventoryId = intval($row['InventoryId']);
            $updateRequestTable = "UPDATE `requesttable` SET `RequestStatus`='confirmed' WHERE RequestId = $requestId";
            $applyUpdateRequest = mysqli_query($config,$updateRequestTable);
            if($applyUpdateRequest){
                $insertAppointment = "INSERT INTO `appointment`( `RequestId`, `AppointmentDate`, `AppointmentStatus`, `CreatedAt`, `UpdatedAt`) VALUES ($requestId,'$requestDate','coming',NOW(),NOW())";
                $applyInsertAppointment = mysqli_query($config,$insertAppointment);
                if($applyInsertAppointment){
                    $appointmentId = mysqli_insert_id($config);
                    $updateInventory = "UPDATE `inventory` SET `Quantity`= $updatedQuantity WHERE InventoryId = $inventoryId";
                    $applyUpdateInventory = mysqli_query($config,$updateInventory);
                    if($applyUpdateInventory){
                        $insertAI = "INSERT INTO `appointmentinventory`( `AppointmentId`, `InventoryId`, `Quantity`) VALUES ($appointmentId,$inventoryId,$quantity)";
                        $applyInsertAI = mysqli_query($config,$insertAI);
                        if($applyInsertAI){
                            $getUserId = "SELECT users.UserId FROM requesttable INNER JOIN recipient ON requesttable.RecipientId = recipient.recipient INNER JOIN users ON recipient.UserId = users.UserId WHERE requesttable.RequestId = $requestId";
                            $applyGetUser = mysqli_query($config,$getUserId);
                            if($applyGetUser){
                                $rUserId = mysqli_fetch_assoc($applyGetUser);
                                $userId = intval($rUserId['UserId']);
                                $sendNotification = "INSERT INTO `notificationreceiver`( `NotificationId`, `UserId`, `status`, `CreatedAt`) VALUES (1,$userId,'recieved',NOW())";
                                $applySendNotification = mysqli_query($config,$sendNotification);
                                if($applySendNotification){
                                    header("location:./recipientrequests.php");
                                    
                                }
                            }
                            
                        }
                    }
                }
            }
        }else{
            $checkInventoryTwo = "SELECT * FROM inventory WHERE GroupId = $groupId AND CenterId = $centerId AND ExpirationDate>$requestDate";
            $applyCheckTwo = mysqli_query($config,$checkInventoryTwo);
            $totalQuantity = 0;
            $inventoryIdArray = [];
            $j = 1;
            while($fetchQuantity = mysqli_fetch_assoc($applyCheckTwo)){
                $tq = intval($fetchQuantity['Quantity']);
                $totalQuantity += $tq;
                if($quantity>=$totalQuantity){
                    $inventoryIdArray[$fetchQuantity['InventoryId']] = $tq - $tq;
                }else{
                    $inventoryIdArray[$fetchQuantity['InventoryId']] = $totalQuantity - $quantity;

                }
                $j++;

            }
            if($totalQuantity<$quantity){
                echo "Not sufficient blood";
            }else{
                $updateRequestTable = "UPDATE `requesttable` SET `RequestStatus`='confirmed' WHERE RequestId = $requestId";
                $applyUpdateRequest = mysqli_query($config,$updateRequestTable);
                if($applyUpdateRequest){
                    $insertAppointment = "INSERT INTO `appointment`( `RequestId`, `AppointmentDate`, `AppointmentStatus`, `CreatedAt`, `UpdatedAt`) VALUES ($requestId,'$requestDate','coming',NOW(),NOW())";
                    $applyInsertAppointment = mysqli_query($config,$insertAppointment);
                    if($applyInsertAppointment){
                        $appointmentId = mysqli_insert_id($config);
                        foreach($inventoryIdArray as $key=>$value){
                            $selectQuantity = "SELECT * FROM inventory WHERE InventoryId = $key";
                            $applySelectQuantity = mysqli_query($config,$selectQuantity);
                            $rowTwo = mysqli_fetch_assoc($applySelectQuantity);
                            $updatedQuantity = $rowTwo['Quantity'] - $value;
                            $updateInventory = "UPDATE `inventory` SET `Quantity`= $value WHERE InventoryId = $key";
                            $applyUpdateInventory = mysqli_query($config,$updateInventory);
                            if($applyUpdateInventory){
                                $insertAI = "INSERT INTO `appointmentinventory`( `AppointmentId`, `InventoryId`, `Quantity`) VALUES ($appointmentId,$key,$updatedQuantity)";
                                $applyInsertAI = mysqli_query($config,$insertAI);
                            }
                        }
                        $getUserId = "SELECT users.UserId FROM requesttable INNER JOIN recipient ON requesttable.RecipientId = recipient.recipient INNER JOIN users ON recipient.UserId = users.UserId WHERE requesttable.RequestId = $requestId";
                            $applyGetUser = mysqli_query($config,$getUserId);
                            if($applyGetUser){
                                $rUserId = mysqli_fetch_assoc($applyGetUser);
                                $userId = intval($rUserId['UserId']);
                                $sendNotification = "INSERT INTO `notificationreceiver`( `NotificationId`, `UserId`, `status`, `CreatedAt`) VALUES (1,$userId,'recieved',NOW())";
                                $applySendNotification = mysqli_query($config,$sendNotification);
                                if($applySendNotification){
                                    header("location:./recipientrequests.php");
                                    
                                }
                            }
                        
                    }
                }
            }
        }
    }


    if(isset($_POST['decline'])){
        $requestId = intval($_POST['requestid']);
        $declineQuery = "UPDATE `requesttable` SET `RequestStatus`='cancelled' WHERE RequestId = $requestId";
        $applyDeclineQuery = mysqli_query($config,$declineQuery);
        if($applyDeclineQuery){
            $getUserId = "SELECT users.UserId FROM requesttable INNER JOIN recipient ON requesttable.RecipientId = recipient.recipient INNER JOIN users ON recipient.UserId = users.UserId WHERE requesttable.RequestId = $requestId";
            $applyGetUser = mysqli_query($config,$getUserId);
            if($applyGetUser){
                $rUserId = mysqli_fetch_assoc($applyGetUser);
                $userId = intval($rUserId['UserId']);
                $sendNotification = "INSERT INTO `notificationreceiver`( `NotificationId`, `UserId`, `status`, `CreatedAt`) VALUES (2,$userId,'recieved',NOW())";
                $applySendNotification = mysqli_query($config,$sendNotification);
                if($applySendNotification){
                    header("location:./recipientrequests.php");
                    
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
                    <a href="./donorrequests.php" class="nav-item nav-link "><i class="fa fa-clock me-2"></i>Donor Requests</a>
                    <a href="./recipientrequests.php" class="nav-item nav-link active"><i class="fa fa-clock me-2"></i>Recipient Request</a>
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
        </div>

        <!-- Table -->
        <div style="overflow-y: scroll;" class="tableContainer content">
        <h1 class="text-center my-4">RECIPIENT REQUESTS</h1>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>S#</th>
			<th>Recipient Name</th>
			<th>Blood Group</th>
			<th>Timings</th>
			<th>Appointment Date</th>
			<th>Quantity(in ml)</th>
			<th>Blood Center</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
        <?php 
            $activityQuery = "SELECT bloodcenter.CenterId,bloodgroup.GroupId,requesttable.RequestId,recipient.RecipientName,bloodgroup.GroupName,requesttable.Timings,requesttable.RequestDate,requesttable.Quantity,bloodcenter.CenterName FROM `requesttable` INNER JOIN recipient ON requesttable.RecipientId = recipient.recipient INNER JOIN bloodgroup ON requesttable.GroupId = bloodgroup.GroupId INNER JOIN bloodcenter ON requesttable.CenterId = bloodcenter.CenterId WHERE requesttable.DonorId IS NULL AND requesttable.RequestStatus = 'pending';";
            $applyActivityQuery = mysqli_query($config,$activityQuery);
            $i = 0;
            if(mysqli_num_rows($applyActivityQuery)>0){
                while($fetchActivity = mysqli_fetch_assoc($applyActivityQuery)){

        ?>
		<tr>
			<td><?php echo ++$i ?></td>
			<td><?php echo $fetchActivity['RecipientName'] ?></td>
			<td><?php echo $fetchActivity['GroupName'] ?></td>
			<td><?php echo $fetchActivity['Timings'] ?></td>
			<td><?php echo $fetchActivity['RequestDate'] ?></td>
			<td><?php echo $fetchActivity['Quantity'] ?></td>
			<td><?php echo $fetchActivity['CenterName'] ?></td>
			<td class="d-flex">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input hidden type="number" name="requestid" id="" value="<?php echo $fetchActivity['RequestId'] ?>">
                    <input hidden type="date" name="requestdate" id=""  value="<?php echo $fetchActivity['RequestDate'] ?>">
                    <input hidden type="number" name="groupid" id=""  value="<?php echo $fetchActivity['GroupId'] ?>">
                    <input hidden type="number" name="centerid" id=""  value="<?php echo $fetchActivity['CenterId'] ?>">
                    <input hidden type="number" name="quantity" id=""  value="<?php echo $fetchActivity['Quantity'] ?>">
                    <button type="submit" name="approve" class="btn btn-success me-2">Approve</button>
                </form>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input hidden type="number" name="requestid" id="" name="requestid" value="<?php echo $fetchActivity['RequestId'] ?>">
                    <button type="submit" name="decline" class="btn btn-danger me-2">Decline</button>
                </form>
                
            </td>
		</tr>
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

    
</body>

</html>