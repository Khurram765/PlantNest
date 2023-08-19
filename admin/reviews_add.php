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




    $review_date = get_save_value($con, $_POST['review_date']);
    $user_id = get_save_value($con, $_POST['user_id']);
    $plant_id = get_save_value($con, $_POST['plant_id']);
    $review_text = get_save_value($con, $_POST['review_text']);
    $rating = get_save_value($con, $_POST['rating']);
    $status = get_save_value($con, $_POST['status']);

    $insert_sql = "INSERT INTO `reviews`( `review_date`, `user_id`, `plant_id`, `review_text`, `rating`, `status`) VALUES ('$review_date','$user_id','$plant_id','$review_text','$rating','$status')";

    $res = mysqli_query($con, $insert_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
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

                        <h3 class="page-title">Add Reviews</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="reviews.php">Reviews</a></li>
                            <li class="breadcrumb-item active">Add Reviews</li>
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
                                    <h5 class="form-title student-info">reviews Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Review Date <span class="login-danger">*</span></label>
                                            <input class="form-control " type="date" name="user_date" name="review_date"
                                                placeholder="Enter Review Date">
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
                                                    ?>
                                                    <option value="<?php echo $row_cat['user_id'] ?>"><?php echo $row_cat['username'] ?>
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
                                            <label>Review Text <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="review_text"
                                                placeholder="Enter Review Text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Review Rating<span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="rating"
                                                placeholder="Enter Review Rating">
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
        var categoryImage1 = document.querySelector('input[name="user_date"]').value;
        var selectedStatus2 = document.querySelector('select[name="user_id"]').value;
        var selectedStatus3 = document.querySelector('select[name="plant_id"]').value;
        var categoryImage4 = document.querySelector('input[name="review_text"]').value;
        var categoryImage5 = document.querySelector('input[name="rating"]').value;
   

        
        if (categoryImage1 === "") {
            alert("Please select a date.");
            return false;
        }
        
        if (selectedStatus2 === "") {
            alert("Please select a User Name.");
            return false;
        }
        

        if (selectedStatus3 === "") {
            alert("Please select a Plant Name.");
            return false;
        }
        

        if (categoryImage4 === "") {
            alert("Please select a Review text.");
            return false;
        }
        

        if (categoryImage5 === "") {
            alert("Please select a Raiting.");
            return false;
        }
        
        
        
        return true;
    }
</script>