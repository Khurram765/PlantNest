<?php 
require("dashboard_part/head.php");
?>


<?php 
require("dashboard_part/navbar.php");
?>


<?php 
require("dashboard_part/sidebar.php");
?>


<?php
$student_id = "";

if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_save_value($con, $_GET['type']);


if ($type == 'delete') {

    $accessory_id = get_save_value($con, $_GET['accessory_id']);
    $query = "UPDATE `accessories` SET `delete_status`= 0 WHERE `accessory_id` = $accessory_id";
    $run = mysqli_query($con, $query);
    echo "<script>Swal.fire('Data Deleted But Save This File Delete Status Page')</script>";
}
}
?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Accessories</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="accessory.php">Accessories</a></li>
<li class="breadcrumb-item active">All Accessories</li>
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
                            <option value="select accessories name">select accessories Name</option>
                            <?php
                            $selec_pro = "SELECT * FROM `accessories` ORDER BY name ASC";
                            $cat_pro = mysqli_query($con, $selec_pro);
                            while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                            
                                ?>
                                <option value="<?php echo $row_cat['accessory_id'] ?>"><?php echo $row_cat['name'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="hidden_country" id="hidden_country"/>

                    </div>
                </div>


<div class="row">
<div class="col-sm-12">
<div class="card card-table comman-shadow">
<div class="card-body">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Accessories</h3>
</div>
<div class="col-auto text-end float-end ms-auto download-grp">


<a href="accessory_add.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped text-center">
<thead class="student-thread">
<tr>


<th>Accessories Id</th>
<th>Accessories Name</th>
<th>Accessories Purpose</th>
<th>Accessories Price</th>
<th>Accessories image</th>
<th>Accessories Plant Id</th>
<th>Accessories Accessories Id</th>
<th>action</th>
</tr>


</thead>
<tbody>

<?php
                                    $i = 1;
                                    $sel_query = "SELECT * FROM accessories
                                    JOIN plants ON accessories.plant_id = plants.plant_id
                                    JOIN accessorycategory ON accessories.acId = accessorycategory.acId
                                    WHERE accessories.delete_status = 1";
                                    $run = mysqli_query($con, $sel_query);

                                    while ($row = mysqli_fetch_assoc($run)) {


                                        ?>
 <tr class="text-center">

 <td><?php echo $i++ ?></th>
<td><?php echo $row['name']?></td>
<td><?php echo $row['purpose']?></td>
<td><?php echo $row['price']?></td>
<td>
<img src="uploads_img/<?php echo $row['image']; ?>" width="100px">    
</td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['acName']?></td>

                                            <td>
                                                <?php
                                                echo "<a  href='?type=delete&accessory_id=" . $row['accessory_id'] . "' 
                                                    onclick='return confirm(\"are you sure you want to delete data\")'><i class='feather-trash'></i></a>";
                                                ?>


                                                <?php
                                                echo "<a class='btn btn-sm bg-danger-light' href='accessory_edit.php?type=update&accessory_id=" . $row['accessory_id'] . "' ><i class='feather-edit'></i></a>";
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
                url: "accessory_ajax_backup.php",
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