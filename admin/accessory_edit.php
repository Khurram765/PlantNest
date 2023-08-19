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

$name = "";
$purpose = "";
$price = "";
$image = "";
$plant_id = "";
$acId = "";



if (isset($_GET['accessory_id']) && $_GET['accessory_id'] != "") {

    $accessory_id = get_save_value($con, $_GET['accessory_id']);
    $slect_sql = "SELECT * FROM accessories WHERE `accessory_id` = '$accessory_id'";
    $res = mysqli_query($con, $slect_sql);
    $row = mysqli_fetch_assoc($res);

    $name = $row['name'];
    $purpose = $row['purpose'];
    $price = $row['price'];
    $image = $row['image'];
    $plant_id = $row['plant_id'];
    $acId = $row['acId'];


}


if (isset($_POST['submit'])) {

    $name = get_save_value($con, $_POST['name']);
    $purpose = get_save_value($con, $_POST['purpose']);
    $price = get_save_value($con, $_POST['price']);

    $image = $_FILES["image"]["name"];
    $pro_tmp_img = $_FILES["image"]["tmp_name"];
    $uploads_dir = "uploads_img";
    move_uploaded_file($pro_tmp_img, "$uploads_dir/$image");

    $plant_id = get_save_value($con, $_POST['plant_id']);
    $acId = get_save_value($con, $_POST['acId']);



    $update_sql = "UPDATE `accessories` SET `name`='$name',`purpose`='$purpose',`price`='$price',`image`='$image',`plant_id`=$plant_id,`acId`=$acId WHERE `accessory_id`='$accessory_id'";
$res = mysqli_query($con, $update_sql);

if ($res) {
    echo "<script>Swal.fire('Edit Data Successfully')</script>";
    echo "<script>window.location='accessory.php'</script>";
} else {
    $error_message = mysqli_error($con);
    echo "<script>Swal.fire('Error during update: $error_message')</script>";
}

}


?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Accessories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="accessory.php">Accessories</a></li>
                            <li class="breadcrumb-item active">Edit Accessories</li>
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
                                                placeholder="Enter Accessories name" value="<?php echo $name ?>">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Accessories Purpose <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="purpose"
                                                placeholder="Enter Accessories Purpose" value="<?php echo $purpose ?>" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="form-group local-forms">
                                            <label>Accessories Price <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="price"
                                                placeholder="Enter Accessories Price" value="<?php echo $price ?>" >
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Accessories Image <span class="login-danger">*</span></label>
                                            <input class="form-control " type="file" name="image"
                                                placeholder="Enter Accessories Image" value="<?php echo $image ?>" >
                                        </div>
                                    </div>
                                </div>
                                <<div class="row">


                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="plant_id" id="plant_id" class="form-control" >
                                                <option value="">select plant</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `plants` ORDER BY name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['plant_id'] === $plant_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['plant_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="form-group">
    <label>Accessories Category<span class="login-danger">*</span></label>
    <select name="acId" id="acId" class="form-control">
        <option value="">Select accessories Category</option>
        <?php
        $selec_ac = "SELECT * FROM `accessorycategory` ORDER BY acName ASC";
        $cat_ac = mysqli_query($con, $selec_ac);
        while ($row_ac = mysqli_fetch_assoc($cat_ac)) {
            $selected = ($row_ac['acId'] == $acId) ? 'selected' : '';
            ?>
            <option value="<?php echo $row_ac['acId'] ?>" <?php echo $selected ?>><?php echo $row_ac['acName'] ?></option>
            <?php
        }
        ?>
    </select>
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
        var categoryImage1 = document.querySelector('input[name="name"]').value;
        var categoryImage2 = document.querySelector('input[name="purpose"]').value;
        var categoryImage3 = document.querySelector('input[name="price"]').value;
        var categoryImage4 = document.querySelector('input[name="image"]').value;
        
        var selectedStatus5 = document.querySelector('select[name="plant_id"]').value;
        var selectedStatus6 = document.querySelector('select[name="acId"]').value;

     
        
        if (categoryImage1 === "") {
            alert("Please select a Name.");
            return false;
        }
        if (categoryImage2 === "") {
            alert("Please select a purpose.");
            return false;
        }
        if (categoryImage3 === "") {
            alert("Please select a price.");
            return false;
        }
        if (categoryImage4 === "") {
            alert("Please select a image.");
            return false;
        }
      
        if (selectedStatus5 === "") {
            alert("Please enter a Plant Id.");
            return false;
        }
        
        
        if (selectedStatus6 === "") {
            alert("Please enter a Acid Id.");
            return false;
        }
      
        return true;
    }
</script>