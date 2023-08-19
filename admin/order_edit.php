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

$order_name = "";
$country_id = "";
$state_id = "";
$city_id = "";
$postal_code = "";
$address = "";
$email_address = "";
$phone_number = "";
$user_id = "";
$order_date = "";
$total_amount = "";
$status = "";




if (isset($_GET['order_id']) && $_GET['order_id'] != "") {

    $order_id = get_save_value($con, $_GET['order_id']);
    $slect_sql = "SELECT * FROM orders WHERE `order_id` = '$order_id'";
    $res = mysqli_query($con, $slect_sql);
    $row = mysqli_fetch_assoc($res);

    $order_name = $row['order_name'];
    $country_id = $row['country_id'];
    $state_id = $row['state_id'];
    $city_id = $row['city_id'];
    $postal_code = $row['postal_code'];
    $address = $row['address'];
    $email_address = $row['email_address'];
    $phone_number = $row['phone_number'];
    $user_id = $row['user_id'];
    $order_date = $row['order_date'];
    $total_amount = $row['total_amount'];
    $status = $row['status'];



}


if (isset($_POST['submit'])) {


    $order_name = get_save_value($con, $_POST['order_name']);
    $country_id = get_save_value($con, $_POST['country_id']);
    $state_id = get_save_value($con, $_POST['state_id']);
    $city_id = get_save_value($con, $_POST['city_id']);
    $postal_code = get_save_value($con, $_POST['postal_code']);
    $address = get_save_value($con, $_POST['address']);
    $email_address = get_save_value($con, $_POST['email_address']);
    $phone_number = get_save_value($con, $_POST['phone_number']);
    $user_id = get_save_value($con, $_POST['user_id']);
    $order_date = get_save_value($con, $_POST['order_date']);
    $total_amount = get_save_value($con, $_POST['total_amount']);
    $status = get_save_value($con, $_POST['status']);



    $update_sql = "UPDATE `orders` SET `order_name`='$order_name',`country_id`='$country_id',`state_id`='$state_id',`city_id`='$city_id',`postal_code`='$postal_code',`address`='$address',`email_address`='$email_address',`phone_number`='$phone_number',`user_id`='$user_id',`order_date`='$order_date',`total_amount`='$total_amount',`status`='$status' WHERE `order_id`='$order_id'";

    $res = mysqli_query($con, $update_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
        echo "<script>window.location='order.php'</script>";
    } else {
        echo "<script>Swal.fire('Not Edit Data ERROR')</script>";

    }
}


?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Order City</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="order.php">Order</a></li>
                            <li class="breadcrumb-item active">Edit Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Order Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>



                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Order name<span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="order_name"
                                                placeholder="Enter Order name" value="<?php echo $order_name ?>">
                                        </div>
                                    </div>



                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="country_id" id="country_id" class="form-control">
                                                <option value="">select Country</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `country` ORDER BY country_name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['country_id'] === $country_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['country_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['country_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="state_id" id="state_id" class="form-control">
                                                <option value="">select state</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `state` ORDER BY state_name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['state_id'] === $state_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['state_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['state_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="city_id" id="city_id" class="form-control">
                                                <option value="">select City</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `city` ORDER BY city_name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['city_id'] === $city_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['city_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['city_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Postal Code<span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="postal_code"
                                                placeholder="Enter Postal Code" value="<?php echo $postal_code ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Address<span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="address"
                                                placeholder="Enter Address" value="<?php echo $address ?>">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Email Address<span class="login-danger">*</span></label>
                                            <input class="form-control " type="email" name="email_address"
                                                placeholder="Enter Email Address" value="<?php echo $email_address ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Phone Number<span class="login-danger">*</span></label>
                                            <input class="form-control " type="phone" name="phone_number"
                                                placeholder="Enter Email Address" value="<?php echo $phone_number ?>">
                                        </div>
                                    </div>



                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="user_id" id="user_id" class="form-control">
                                                <option value="">select User</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `users` ORDER BY username ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['user_id'] === $user_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['user_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['username'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                </div>


                                <div class="col-6">
                                    <div class="form-group local-forms">
                                        <label>order Date <span class="login-danger">*</span></label>
                                        <input class="form-control " type="text" name="order_date"
                                            placeholder="Enter Order Date" value="<?php echo $order_date ?>">
                                    </div>
                                </div>
                            </div>



                            <div class="col-6">
                                <div class="form-group local-forms">
                                    <label>Total Amount <span class="login-danger">*</span></label>
                                    <input class="form-control " type="text" name="total_amount"
                                        placeholder="Enter Total Amount" value="<?php echo $total_amount ?>">
                                </div>
                            </div>
                    </div>




                    <div class="col-12 col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="1" checked="1"
                                required>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="dactive" value="0" required>
                            <label class="form-check-label" for="inlineRadio2">Dactive</label>
                        </div>
                    </div>




                    <div class="col-12">
                        <div class="student-submit">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>

<?php
require("dashboard_part/script.php");
?>



<script>
    // JavaScript validation function
    function validateForm() {
        var categoryImage1 = document.querySelector('input[name="order_name"]').value;
        var selectedStatus2 = document.querySelector('select[name="country_id"]').value;
        var selectedStatus3 = document.querySelector('select[name="state_id"]').value;
        var selectedStatus4 = document.querySelector('select[name="city_id"]').value;

        var categoryName5 = document.querySelector('input[name="postal_code"]').value;
        var categoryName6 = document.querySelector('input[name="address"]').value;
        var categoryName7 = document.querySelector('input[name="email_address"]').value;
        var categoryName8 = document.querySelector('input[name="phone_number"]').value;

        var selectedStatus9 = document.querySelector('select[name="user_id"]').value;

        var categoryName10 = document.querySelector('input[name="order_date"]').value;
        var categoryName11 = document.querySelector('input[name="total_amount"]').value;


        if (categoryImage1 === "") {
            alert("Please select a order name");
            return false;
        }
      
        if (selectedStatus2 === "") {
            alert("Please select a Country id.");
            return false;
        }
      
        if (selectedStatus3 === "") {
            alert("Please select a state id.");
            return false;
        }
      
        if (selectedStatus4 === "") {
            alert("Please select a City id.");
            return false;
        }
      
        if (categoryName5 === "") {
            alert("Please select a postal code");
            return false;
        }
      
        if (categoryName6 === "") {
            alert("Please select a address.");
            return false;
        }
      
        if (categoryName7 === "") {
            alert("Please select a email address.");
            return false;
        }
      
        if (categoryName8 === "") {
            alert("Please select a phone_number.");
            return false;
        }
      
        if (selectedStatus9 === "") {
            alert("Please select a user_id.");
            return false;
        }
      
        if (categoryName10 === "") {
            alert("Please select a order_date.");
            return false;
        }
      
        if (categoryName11 === "") {
            alert("Please select a Total Amount.");
            return false;
        }
      

      
        
        return true;
    }
</script>