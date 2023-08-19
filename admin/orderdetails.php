<?php
require("dashboard_part/head.php");
?>


<?php
require("dashboard_part/navbar.php");
?>


<?php
require("dashboard_part/sidebar.php");
?>



<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
$order_detail_id = "";

if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_save_value($con, $_GET['type']);

    if ($type == ('status')) {

        $operation = get_save_value($con, $_GET['operation']);

        $order_detail_id = get_save_value($con, $_GET['order_detail_id']);

        if ($operation == 'active') {
            $status = '1';
        } else
            $status = '0';
    }

    $update_query = "UPDATE orderdetails SET `status`='$status' WHERE `order_detail_id`='$order_detail_id'";
    mysqli_query($con, $update_query);
}


if ($type == 'delete') {

    $order_detail_id = get_save_value($con, $_GET['order_detail_id']);
    $query = "UPDATE `orderdetails` SET `delete_status`= 1 WHERE `order_detail_id` = $order_detail_id";
    $run = mysqli_query($con, $query);
    echo "<script>Swal.fire('Data Deleted But Save This File Delete Status Page')</script>";
}

if(isset($_POST['updateOrder'])){
    $orderId = $_POST['orderId'];
    $updateOrder = mysqli_query($con,"UPDATE `orders` SET `status`= 0 WHERE order_id = $orderId");
    
}

?>



<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Order Details</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="orderdetails.php">Order Details</a></li>
                            <li class="breadcrumb-item active">All Order Details</li>
                        </ul>
                        <input class="ms-2 px-2 py-1" type="search" name="" id="search" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6">
            <div class="form-group">

                <select name="multi_search_filter" id="multi_search_filter" class="form-control">
                    <option value="select accessories name">select accessories Name</option>
                    <?php
                    $selec_pro = "SELECT * FROM `orders` ORDER BY order_id ASC";
                    $cat_pro = mysqli_query($con, $selec_pro);
                    while ($row_cat = mysqli_fetch_assoc($cat_pro)) {

                        ?>
                        <option value="<?php echo $row_cat['order_id'] ?>"><?php echo $row_cat['order_id'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="hidden_country" id="hidden_country" />

            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Order Details </h3>
                                </div>
                                <!-- <div class="col-auto text-end float-end ms-auto download-grp">


                                    <a href="orderdetails_add.php" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div> -->
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped text-center">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Order Details ID</th>
                                        <th>S#</th>
                                        <th>User Name </th>
                                        <th>Order Date</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Contact#</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                        <th>ConfirmOrder</th>
                                    </tr>


                                </thead>
                                <tbody>
                                    

                                    <?php
                                    $i = 1;
                                    $sel_query = "SELECT * FROM `orders` INNER JOIN country on orders.country_id = country.country_id INNER JOIN state ON orders.state_id = state.state_id INNER JOIN city ON orders.city_id = city.city_id INNER JOIN users ON orders.user_id = users.user_id WHERE 1";
                                    $run = mysqli_query($con, $sel_query);

                                    while ($row = mysqli_fetch_assoc($run)) {


                                        ?>
                                        <tr class="text-center">

                                            <td>
                                                <?php echo $i++ ?>
                                            </td>
                                            <td>
                                                <?php echo $row['users.user_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['order_date'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['country_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['address'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['phone_number'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['total_amount'] ?>
                                            </td>
                                            



                                            <td class="p-3 text-center">
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo "<a href='?type=status&operation=deactive&order_detail_id=" . $row['order_detail_id'] . "' class='btn btn-primary text-white  btn-sm me-1'>Active</a>";

                                                } else {
                                                    echo "<a href='?type=status&operation=active&order_detail_id=" . $row['order_detail_id'] . "' class='btn btn-success text-white btn-sm me-1'>deactive</a>";

                                                }
                                                ?>
                                            </td>

                                            
                                            

                                        </tr>
                                    <?php } ?>

                        </div>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>Copyright © 2023 techwiz4 MSG devmevricks.</p>
</footer>

</div>

</div>


<?php
require("dashboard_part/script.php");
?>



<script>
    $(document).ready(function () {
        load_data();
        function load_data(query = '') {
            $.ajax({
                url: "order_ajax.php",
                method: "POST",
                data: {type:"laod", query: query },
                success: function (data) {
                    $('tbody').html(data);
                }

            })
        }

        $('#multi_search_filter').change(function () {

            $('#hidden_country').val($('#multi_search_filter').val());
            var query = $('#hidden_country').val();
            load_data(query);

        })

        $("#search").on("keyup",function(){
            var searchValue = $("#search").val();
            $.ajax({
                url: "order_ajax.php",
                method: "POST",
                data: {type:"search", value: searchValue },
                success: function (data) {
                    $('tbody').html(data);
                }

            })
        })

    });
</script>