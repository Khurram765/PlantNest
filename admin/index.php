<?php
require("dashboard_part/head.php");
?>


<?php
require("dashboard_part/navbar.php");
?>


<?php
require("dashboard_part/sidebar.php");
?>



<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">Total User</h6>
                                <?php 
                                
                                $sel="SELECT * FROM `users`";
                                $sel_query=mysqli_query($con,$sel);
                                // $row=mysqli_fetch_assoc($sel_query);
                                
                                ?>
                                <h3 class="text-white"><?php echo mysqli_num_rows($sel_query);?></h3>
                            </div>
                            <div class="db-icon">
                             <img src="assets/img/dashboard_icon/user.png" alt="Total Users Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">New Order</h6>
                                <?php 
                                
                                $sel="SELECT * FROM `orders`";
                                $sel_query=mysqli_query($con,$sel);
                                
                                
                                ?>
                                <h3 class="text-white"><?php echo mysqli_num_rows($sel_query);?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/new.png" alt="Dashboard Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">Feedback</h6>
                                <?php 
                                
                                $sel="SELECT * FROM `feedback`";
                                $sel_query=mysqli_query($con,$sel);
                                
                                
                                ?>
                                <h3 class="text-white"><?php echo mysqli_num_rows($sel_query);?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/bill.jpg" alt="Dashboard Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">Total category</h6>
                                <?php 
                                
                                $sel="SELECT * FROM `categories`";
                                $sel_query=mysqli_query($con,$sel);
                                
                                
                                ?>
                                <h3 class="text-white"><?php echo mysqli_num_rows($sel_query);?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/rasty.jpg" alt="Dashboard Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- 

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">On The Way Order</h6>
                                <h3 class="text-white">50055</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/on_the_way.jpg" alt="Dashboard Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">Delivery Order</h6>
                                <h3 class="text-white">50+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/delivery.jpg" alt="Dashboard Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">Cancelled Order</h6>
                                <h3 class="text-white">30+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/canclled.jpg" alt="Dashboard Icon" height="50px" width="50px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                <div class="card-body" style="background-color:#008435a6;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-white">Pick Up Order</h6>
                                <h3 class="text-white">$505</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/dashboard_icon/11878958_Online_Shoping_29.jpg" alt="Dashboard Icon" height="40px" width="40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="row">
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Overview</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Teacher</li>
                                    <li><span class="circle-green"></span>Student</li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apexcharts-area"></div>
                    </div>
                </div>

            </div> -->

            <div class="col-md-12 col-lg-6">

<div class="card card-chart">
    <div class="card-header">
        <div class="row align-items-center">
        <video width="400" height="400" autoplay loop muted>
  <source src="assets/vid/greenhouse (720p).mp4" type="video/mp4" />
  <source src="assets/vid/greenhouse (720p).mp4" type="video/ogg" />
  Your browser does not support the video tag.
</video>
        </div>
    </div>
    <!-- <div class="card-body">
        <div id="apexcharts-area"></div>
    </div> -->
</div>

</div>
            </div>







        <
    <footer>
        <p>Copyright © 2023 techwiz4 MSG devmevricks.</p>
    </footer>
</div>
</div>

<?php
require("dashboard_part/script.php");
?>