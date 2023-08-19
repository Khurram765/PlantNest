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
$order_id = "";

if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_save_value($con, $_GET['type']);

    if ($type == ('status')) {

        $operation = get_save_value($con, $_GET['operation']);

        $order_id = get_save_value($con, $_GET['order_id']);

        if ($operation == 'active') {
            $status = '1';
        } else
            $status = '0';
    }

    $update_query = "UPDATE orders SET `status`='$status' WHERE `order_id`='$order_id'";
    mysqli_query($con, $update_query);
}


if ($type == 'delete') {

    $order_id = get_save_value($con, $_GET['order_id']);
    $query = "UPDATE `orders` SET `delete_status`= 1 WHERE `order_id` = $order_id";
    $run = mysqli_query($con, $query);
    echo "<script>Swal.fire('Data Deleted But Save This File Delete Status Page')</script>";
}

?>




<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Order</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="order.php">Order</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="madarsa-group-form">
            <div class="row">

                <div class="col-lg-2 col-md-6">
                    <div class="form-group">

                        <select name="multi_search_filter" id="multi_search_filter" class="form-control">
                            <option value="select order name">select order Name</option>
                            <?php
                            $selec_pro = "SELECT * FROM `orders` ORDER BY order_name ASC";
                            $cat_pro = mysqli_query($con, $selec_pro);
                            while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                ?>
                                <option value="<?php echo $row_cat['order_id'] ?>"><?php echo $row_cat['order_name'] ?>
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
                                            <h3 class="page-title">Order</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">


                                            <a href="order_add.php" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped text-center">
                                        <thead class="student-thread">
                                            <tr>


                                                <th>Order ID</th>
                                                <th>Order Name</th>
                                                <th>Country ID</th>
                                                <th>State ID</th>
                                                <th>City ID</th>
                                                <th>Postal Code</th>
                                                <th>Address</th>
                                                <th>Email Address</th>
                                                <th>Phone Number</th>
                                                <th>User_id</th>
                                                <th>Order Date</th>
                                                <th>Total Amount</th>
                                                <th>Order Status</th>
                                                <th>action</th>
                                            </tr>


                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            $sel_query = "SELECT * FROM orders
                                            JOIN state ON orders.state_id = state.state_id
                                            JOIN city ON orders.city_id = city.city_id
                                            JOIN country ON orders.country_id = country.country_id
                                            JOIN users ON orders.user_id = users.user_id
                                            WHERE orders.delete_status = 0";
                                            $run = mysqli_query($con, $sel_query);

                                            while ($row = mysqli_fetch_assoc($run)) {


                                                ?>
                                                <tr class="text-center">

                                                    <td>
                                                        <?php echo $i++ ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row['order_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['country_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['state_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['city_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['postal_code'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['address'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email_address'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['phone_number'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['username'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['order_date'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['total_amount'] ?>
                                                    </td>

                                                    <td class="p-3 text-center">
                                                        <?php
                                                        if ($row['status'] == 1) {
                                                            echo "<a href='?type=status&operation=deactive&order_id=" . $row['order_id'] . "' class='btn btn-primary text-white  btn-sm me-1'>Active</a>";

                                                        } else {
                                                            echo "<a href='?type=status&operation=active&order_id=" . $row['order_id'] . "' class='btn btn-success text-white btn-sm me-1'>deactive</a>";

                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo "<a  href='?type=delete&order_id=" . $row['order_id'] . "' 
        onclick='return confirm(\"are you sure you want to delete data\")'><i class='feather-trash'></i></a>";
                                                        ?>


                                                        <?php
                                                        echo "<a class='btn btn-sm bg-danger-light' href='order_edit.php?type=update&order_id=" . $row['order_id'] . "' ><i class='feather-edit'></i></a>";
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
                url: "orderpass_ajax.php",
                method: "POST",
                data: { query: query },
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

    });
</script>