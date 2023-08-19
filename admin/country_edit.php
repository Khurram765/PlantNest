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

$country_name = "";
$status = "";





if (isset($_GET['country_id']) && $_GET['country_id'] != "") {

    $country_id = get_save_value($con, $_GET['country_id']);
    $slect_sql = "SELECT * FROM country WHERE `country_id` = '$country_id'";
    $res = mysqli_query($con, $slect_sql);
    $row = mysqli_fetch_assoc($res);

    $country_name = $row['country_name'];
    $status = $row['status'];



}


if (isset($_POST['submit'])) {



    $country_name = get_save_value($con, $_POST['country_name']);
    $status = get_save_value($con, $_POST['status']);


    $update_sql = "UPDATE `country` SET `country_name`='$country_name',`status`='$status' WHERE `country_id`='$country_id'";
    $res = mysqli_query($con, $update_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
        echo "<script>window.location='country.php'</script>";
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
                        <h3 class="page-title">Edit Country</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="country.php">Country</a></li>
                            <li class="breadcrumb-item active">Edit Country</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form method="POST" onsubmit="return validateForm();">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Country Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Country name <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="country_name"
                                                placeholder="Enter First Name" value="<?php echo $country_name ?>">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="active"
                                                value="1" checked="1" required>
                                            <label class="form-check-label" for="inlineRadio1">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="dactive"
                                                value="0" required>
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
        var categoryImage = document.querySelector('input[name="country_name"]').value;


        
        if (categoryImage === "") {
            alert("Please select a Country Name.");
            return false;
        }
        
    
        
        return true;
    }
</script>