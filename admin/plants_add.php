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


    $plant_image = $_FILES["plant_image"]["name"];
    $pro_tmp_img = $_FILES["plant_image"]["tmp_name"];
    $uploads_dir = "uploads_img";
    move_uploaded_file($pro_tmp_img, "$uploads_dir/$plant_image");


    $name = get_save_value($con, $_POST['name']);
    $species = get_save_value($con, $_POST['species']);
    $price = get_save_value($con, $_POST['price']);
    $discount = get_save_value($con, $_POST['discount']);
    $description = get_save_value($con, $_POST['description']);
    $category_id = get_save_value($con, $_POST['category_id']);
    $quantity = get_save_value($con, $_POST['quantity']);
    $status = get_save_value($con, $_POST['status']);

    $insert_sql = "INSERT INTO `plants`( `plant_image`, `name`, `species`, `price`, `discount`, `description`, `category_id`, `quantity`, `status`) VALUES ('$plant_image','$name','$species','$price','$discount','$description','$category_id','$quantity','$status')";

    $res = mysqli_query($con, $insert_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
        echo "<script>window.location='plants.php'</script>";
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

                        <h3 class="page-title">Add plants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="plants.php">plants</a></li>
                            <li class="breadcrumb-item active">Add plants</li>
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
                                    <h5 class="form-title student-info">plants Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants Image <span class="login-danger">*</span></label>
                                            <input class="form-control" type="file" name="plant_image"
                                                placeholder="Enter plant image">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Enter plant name">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants species <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="species"
                                                placeholder="Enter species">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants price <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="price"
                                                placeholder="Enter price">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants discount <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="discount"
                                                placeholder="Enter discount">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants Discription <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="description"
                                                placeholder="Enter description">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">select Category</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `categories` ORDER BY category_name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    ?>
                                                    <option value="<?php echo $row_cat['category_id'] ?>"><?php echo $row_cat['category_name'] ?>
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
                                        <label>Quantity <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity"
                                            placeholder="Enter quantity">
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
        var categoryImage1 = document.querySelector('input[name="plant_image"]').value;
        var categoryImage2 = document.querySelector('input[name="name"]').value;
        var categoryImage3 = document.querySelector('input[name="species"]').value;
        var categoryImage4 = document.querySelector('input[name="price"]').value;
        var categoryImage5 = document.querySelector('input[name="discount"]').value;
        var categoryImage6 = document.querySelector('input[name="description"]').value;
 

        var selectedStatus7 = document.querySelector('select[name="category_id"]').value;
     

        var categoryImage8 = document.querySelector('input[name="quantity"]').value;

        
        if (categoryImage1 === "") {
            alert("Please select a Plant image");
            return false;
        }
        if (categoryImage2 === "") {
            alert("Please select a name.");
            return false;
        }
        if (categoryImage3 === "") {
            alert("Please select a Species");
            return false;
        }
        if (categoryImage4 === "") {
            alert("Please select a price");
            return false;
        }
        if (categoryImage5 === "") {
            alert("Please select a Discount");
            return false;
        }
        if (categoryImage6 === "") {
            alert("Please select Description");
            return false;
        }

        
        if (selectedStatus7 === "") {
            alert("Please enter a Category Id");
            return false;
        }
        if (categoryImage8 === "") {
            alert("Please select a Quantity");
            return false;
        }
       
        
        return true;
    }
</script>