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
$state_id = "";

if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_save_value($con, $_GET['type']);

    if ($type == ('status')) {

        $operation = get_save_value($con, $_GET['operation']);

        $state_id = get_save_value($con, $_GET['state_id']);

        if ($operation == 'active') {
            $status = '1';
        } else
            $status = '0';
    }

    $update_query = "UPDATE state SET `status`='$status' WHERE `state_id`='$state_id'";
    mysqli_query($con, $update_query);
}


if ($type == 'delete') {

    $state_id = get_save_value($con, $_GET['state_id']);
    $query = "UPDATE `state` SET `delete_status`= 0 WHERE `state_id` = $state_id";
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
                        <h3 class="page-title">State</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="state.php">State</a></li>
                            <li class="breadcrumb-item active">All State</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="madarsa-group-form">
            <div class="row">

                <div class="col-lg-2 col-md-6">
                    <div class="form-group">

                        <select name="multi_search_filter" id="multi_search_filter" class="form-control">
                            <option value="select state">select state</option>
                            <?php
                            $selec_pro = "SELECT * FROM `state` ORDER BY state_name ASC";
                            $cat_pro = mysqli_query($con, $selec_pro);
                            while ($row_cat = mysqli_fetch_assoc($cat_pro)) {

                                ?>
                                <option value="<?php echo $row_cat['state_id'] ?>"><?php echo $row_cat['state_name'] ?>
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
                                            <h3 class="page-title">State</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">


                                            <a href="state_add.php" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped text-center">
                                        <thead class="student-thread">
                                            <tr>
                                                <th> ID</th>
                                                <th>State Name</th>
                                                <th>Country Id</th>
                                                <th>State Status</th>
                                                <th>action</th>
                                            </tr>


                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            $sel_query = "SELECT * FROM state
                                            JOIN country ON state.country_id = country.country_id
                                            WHERE state.delete_status = 1";

                                            $run = mysqli_query($con, $sel_query);

                                            while ($row = mysqli_fetch_assoc($run)) {


                                                ?>
                                                <tr class="text-center">

                                                    <td>
                                                        <?php echo $i++ ?>
                                                    </td>


                                                    <td>
                                                        <?php echo $row['state_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['country_name'] ?>
                                                    </td>

                                                    <td class="p-3 text-center">
                                                        <?php
                                                        if ($row['status'] == 1) {
                                                            echo "<a href='?type=status&operation=deactive&state_id=" . $row['state_id'] . "' class='btn btn-primary text-white  btn-sm me-1'>Active</a>";

                                                        } else {
                                                            echo "<a href='?type=status&operation=active&state_id=" . $row['state_id'] . "' class='btn btn-success text-white btn-sm me-1'>deactive</a>";

                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo "<a  href='?type=delete&state_id=" . $row['state_id'] . "' 
        onclick='return confirm(\"are you sure you want to delete data\")'><i class='feather-trash'></i></a>";
                                                        ?>


                                                        <?php
                                                        echo "<a class='btn btn-sm bg-danger-light' href='state_edit.php?type=update&state_id=" . $row['state_id'] . "' ><i class='feather-edit'></i></a>";
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
                url: "state_ajax_backup.php",
                method: "POST",
                data: { query: query },
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

    });
</script>