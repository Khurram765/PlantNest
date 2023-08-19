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
$plant_id = "";

if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_save_value($con, $_GET['type']);

    if ($type == ('status')) {

        $operation = get_save_value($con, $_GET['operation']);

        $plant_id = get_save_value($con, $_GET['plant_id']);

        if ($operation == 'active') {
            $status = '1';
        } else
            $status = '0';
    }

    $update_query = "UPDATE plants SET `status`='$status' WHERE `plant_id`='$plant_id'";
    mysqli_query($con, $update_query);
}


if ($type == 'delete') {

    $plant_id = get_save_value($con, $_GET['plant_id']);
    $query = "UPDATE `plants` SET `delete_status`= 1 WHERE `plant_id` = $plant_id";
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
                        <h3 class="page-title">Plant</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="plants.php">Plant</a></li>
                            <li class="breadcrumb-item active">All Plants</li>
                        </ul>
                        <input class="ms-2 px-2 py-1" type="search" name="" id="search" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>

        <div class="madarsa-group-form">
            <div class="row">

                <div class="col-lg-2 col-md-6">
                    <div class="form-group">

                        <select name="multi_search_filter" id="multi_search_filter" class="form-control">
                            <option value="select accessories name">select accessories Name</option>
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
                                            <h3 class="page-title">Plant</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">


                                            <a href="plants_add.php" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped text-center">
                                        <thead class="student-thread">
                                            <tr>

                                                <th>Plant Id</th>
                                                <th>Plant Image</th>
                                                <th>Name</th>
                                                <th>species</th>
                                                <th>price</th>
                                                <th>discount</th>
                                                <th>description</th>
                                                <th>category id</th>
                                                <th>quantity </th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>


                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            $sel_query = "SELECT * FROM plants
                                            JOIN categories ON plants.category_id = categories.category_id
                                            WHERE plants.delete_status = 0";
                                            $run = mysqli_query($con, $sel_query);

                                            while ($row = mysqli_fetch_assoc($run)) {


                                                ?>
                                                <tr class="text-center">

                                                    <td>
                                                        <?php echo $i++ ?>
                                                    </td>

                                                    <td>
                                                        <img src="uploads_img/<?php echo $row['plant_image']; ?>"
                                                            width="100px">
                                                    </td>
                                                    <td>
                                                        <?php echo $row['name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['species'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['price'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['discount'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['description'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['category_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['quantity'] ?>
                                                    </td>

                                                    <td class="p-3 text-center">
                                                        <?php
                                                        if ($row['status'] == 1) {
                                                            echo "<a href='?type=status&operation=deactive&plant_id=" . $row['plant_id'] . "' class='btn btn-primary text-white  btn-sm me-1'>Active</a>";

                                                        } else {
                                                            echo "<a href='?type=status&operation=active&plant_id=" . $row['plant_id'] . "' class='btn btn-success text-white btn-sm me-1'>deactive</a>";

                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo "<a  href='?type=delete&plant_id=" . $row['plant_id'] . "' 
        onclick='return confirm(\"are you sure you want to delete data\")'><i class='feather-trash'></i></a>";
                                                        ?>


                                                        <?php
                                                        echo "<a class='btn btn-sm bg-danger-light' href='plants_edit.php?type=update&plant_id=" . $row['plant_id'] . "' ><i class='feather-edit'></i></a>";
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
                url: "plants_ajax.php",
                method: "POST",
                data: {type:'load', query: query },
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
                url: "plants_ajax.php",
                method: "POST",
                data: {type:"search", value: searchValue },
                success: function (data) {
                    $('tbody').html(data);
                }

            })
        })

    });
</script>