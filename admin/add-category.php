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


    $category_image = $_FILES["category_image"]["name"];
    $pro_tmp_img = $_FILES["category_image"]["tmp_name"];
    $uploads_dir = "uploads_img";
    move_uploaded_file($pro_tmp_img, "$uploads_dir/$category_image");

    $category_name = get_save_value($con, $_POST['category_name']);
    $status = get_save_value($con, $_POST['status']);

    $insert_sql = "INSERT INTO `categories`(`category_image`, `category_name`, `status`) 
    VALUES ('$category_image','$category_name','$status')";

    $res = mysqli_query($con, $insert_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";    
        echo "<script>window.location='category.php'</script>";

      
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

                        <h3 class="page-title">Add Category</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
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
                                    <h5 class="form-title student-info">Category Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>


                                <div class="col-12 ">
                                    <div class="form-group local-forms">
                                        <label>Category Image <span class="login-danger">*</span></label>
                                        <input class="form-control w-50" type="file"  name="category_image"
                                            placeholder="Enter Image">
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <div class="form-group local-forms">
                                        <label>Category name <span class="login-danger">*</span></label>
                                        <input class="form-control w-50" type="text"  name="category_name"
                                            placeholder="Enter Category Name">
                                    </div>
                                </div>



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




                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
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
        var categoryImage = document.querySelector('input[name="category_image"]').value;
        var categoryName = document.querySelector('input[name="category_name"]').value;
        
        if (categoryImage === "") {
            alert("Please select a category image.");
            return false;
        }
        
        if (categoryName === "") {
            alert("Please enter a category name.");
            return false;
        }
        
        return true;
    }
</script>

