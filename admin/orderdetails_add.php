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
if (isset($_POST['submit'])) {



    $order_id = get_save_value($con, $_POST['order_id']);
    $plant_id = get_save_value($con, $_POST['plant_id']);
    $quantity = get_save_value($con, $_POST['quantity']);
    $status = get_save_value($con, $_POST['status']);

    $insert_sql = "INSERT INTO `orderdetails`( `order_id`, `plant_id`, `quantity`,`status`) VALUES ('$order_id','$plant_id','$quantity','$status')";

    $res = mysqli_query($con, $insert_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
        echo "<script>window.location='orderdetails.php'</script>";
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


                        <h3 class="page-title">Add Order</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="orderdetails.php">Order</a></li>
                            <li class="breadcrumb-item active">Add Orders</li>
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



                                <div class="col-6">
                                    <div class="form-group local-forms">

                                        <select name="order_id" id="order_id" class="form-control">
                                            <option value="">select Order Name</option>
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

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group local-forms">

                                        <select name="plant_id" id="plant_id" class="form-control">
                                            <option value="">select plant</option>
                                            <?php
                                            $selec_pro = "SELECT * FROM `plants` ORDER BY name ASC";
                                            $cat_pro = mysqli_query($con, $selec_pro);
                                            while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                ?>
                                                <option value="<?php echo $row_cat['plant_id'] ?>"><?php echo $row_cat['name'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group local-forms">
                                        <label>Quantity<span class="login-danger">*</span></label>
                                        <input class="form-control " type="text" placeholder="Enter First Name"
                                            name="quantity">
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1"
                                        checked="1" required>
                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="dactive" value="0"
                                        required>
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

        var selectedStatus1 = document.querySelector('select[name="order_id"]').value;
        var selectedStatus2 = document.querySelector('select[name="plant_id"]').value;
        var categoryName11 = document.querySelector('input[name="quantity"]').value;
       

        if (selectedStatus1 === "") {
            alert("Please select a Order id.");
            return false;
        }
        
        if (selectedStatus2 === "") {
            alert("Please enter a Plant Id.");
            return false;
        }
        if (categoryName11 === "") {
            alert("Please enter a Quantity.");
            return false;
        }
        
        return true;
    }
</script>