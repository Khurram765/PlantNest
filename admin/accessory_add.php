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

    $name = get_save_value($con, $_POST['name']);
    $purpose = get_save_value($con, $_POST['purpose']);
    $price = get_save_value($con, $_POST['price']);

    $image = $_FILES["image"]["name"];
    $pro_tmp_img = $_FILES["image"]["tmp_name"];
    $uploads_dir = "uploads_img";
    move_uploaded_file($pro_tmp_img, "$uploads_dir/$image");

    $plant_id = Intval(get_save_value($con, $_POST['plant_id']));
    $acId = Intval(get_save_value($con, $_POST['acId']));

    $insert_sql = "INSERT INTO `accessories`(`name`, `purpose`, `price`, `image`, `plant_id`, `acId`,`delete_status`,`status`) VALUES ('$name','$purpose',$price,'$image',$plant_id,NULL,0,1)";
    $res = mysqli_query($con, $insert_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
        echo "<script>window.location='accessory.php'</script>";
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

                        <h3 class="page-title">Add Accessories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="accessory.php">Accessories</a></li>
                            <li class="breadcrumb-item active">Add Accessories</li>
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
                                    <h5 class="form-title student-info">Accessories Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Accessories name <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="name"
                                                placeholder="Enter Accessories name" >
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Accessories Purpose <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="purpose"
                                                placeholder="Enter Accessories Purpose" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="form-group local-forms">
                                            <label>Accessories Price <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="price"
                                                placeholder="Enter Accessories Price" >
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Accessories Image <span class="login-danger">*</span></label>
                                            <input class="form-control " type="file" name="image"
                                                placeholder="Enter Accessories Image" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="plant_id" id="plant_id" class="form-control" >
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


                                    <!-- <div class="col-6">
                                        <div class="form-group">

                                            <select name="acId" id="acId" class="form-control" >
                                                <option value="">select accessories </option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `accessorycategory` ";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    ?>
                                                    <option value="<?php echo $row_cat['acId'] ?>"><?php echo $row_cat['acName'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div> -->


                                    <!-- <div class="col-6">
<div class="form-group local-forms">
<label>Accessories Id <span class="login-danger">*</span></label>
<input class="form-control " type="text" name="acId" placeholder="Enter Accessories Id">
</div>
</div>
</div> -->


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
        var categoryname = document.querySelector('input[name="name"]').value;
        var categorypurpose = document.querySelector('input[name="purpose"]').value;
        var categoryprice = document.querySelector('input[name="price"]').value;
        var categoryimage = document.querySelector('input[name="image"]').value;
        var categorypantid = document.querySelector('select[name="plant_id"]').value;
        // var categoryacid = document.querySelector('select[name="acId"]').value;

        if (categoryname === "" || categorypurpose === "" || categoryprice === "" || categoryimage === "" || categorypantid === "" || categoryacid === "") {
            Swal.fire('All fields are required');
            return false;
        }

        return true;
    }
</script>