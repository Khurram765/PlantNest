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
$country_id = "";

if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_save_value($con, $_GET['type']);

    if ($type == ('status')) {

        $operation = get_save_value($con, $_GET['operation']);

        $country_id = get_save_value($con, $_GET['country_id']);

        if ($operation == 'active') {
            $status = '1';
        } else
            $status = '0';
    }

    $update_query = "UPDATE country SET `status`='$status' WHERE `country_id`='$country_id'";
    mysqli_query($con, $update_query);
}


if ($type == 'delete') {

    $country_id = get_save_value($con, $_GET['country_id']);
    $query = "UPDATE `country` SET `delete_status`= 1 WHERE `country_id` ='$country_id'";
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
                        <h3 class="page-title">Country</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="country.php">Country</a></li>
                            <li class="breadcrumb-item active">All Country</li>
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
                            <option value="Select Country">Select Country</option>
                            <?php
                            $selec_pro = "SELECT * FROM `country` ORDER BY country_name ASC";
                            $cat_pro = mysqli_query($con, $selec_pro);
                            while ($row_cat = mysqli_fetch_assoc($cat_pro)) {

                                ?>
                                <option value="<?php echo $row_cat['country_id'] ?>"><?php echo $row_cat['country_name'] ?>
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
                                            <h3 class="page-title">Country</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">


                                            <a href="country_add.php" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">

                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped text-center">
                                        <thead class="student-thread">
                                            <tr>


                                                <th>Country ID</th>
                                                <th>Country Name</th>
                                                <th>Status</th>
                                                <th>action</th>
                                            </tr>


                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            $sel_query = "SELECT * FROM `country` WHERE delete_status=0";
                                            $run = mysqli_query($con, $sel_query);

                                            while ($row = mysqli_fetch_assoc($run)) {


                                                ?>
                                                <tr class="text-center">

                                                    <td>
                                                        <?php echo $i++ ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row['country_name'] ?>
                                                    </td>

                                                    <td class="p-3 text-center">
                                                        <?php
                                                        if ($row['status'] == 1) {
                                                            echo "<a href='?type=status&operation=deactive&country_id=" . $row['country_id'] . "' class='btn btn-primary text-white  btn-sm me-1'>Active</a>";

                                                        } else {
                                                            echo "<a href='?type=status&operation=active&country_id=" . $row['country_id'] . "' class='btn btn-success text-white btn-sm me-1'>deactive</a>";

                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo "<a  href='?type=delete&country_id=" . $row['country_id'] . "' 
        onclick='return confirm(\"are you sure you want to delete data\")'><i class='feather-trash'></i></a>";
                                                        ?>


                                                        <?php
                                                        echo "<a class='btn btn-sm bg-danger-light' href='country_edit.php?type=update&country_id=" . $row['country_id'] . "' ><i class='feather-edit'></i></a>";
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
                url: "country_ajax.php",
                method: "POST",
                data: {type:"load", query: query },
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
                url: "country_ajax.php",
                method: "POST",
                data: {type:"search", value: searchValue },
                success: function (data) {
                    $('tbody').html(data);
                }

            })
        })

    });
</script>