<?php
require("connection/connection.inc.php");
require("connection/function.inc.php");




if($_POST['type']=='search'){
    $searchValue = $_POST['value'];
    $sel_query = "SELECT * FROM accessories
    JOIN plants ON accessories.plant_id = plants.plant_id
    
    WHERE accessories.delete_status = 0 AND purpose LIKE '%$searchValue%' ";
    $run = mysqli_query($con, $sel_query);
    $output = '';
    if (mysqli_num_rows($run) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($run)) {
            $output .= '<tr>';
            $output .= '<td>' . 'ACC' . ' ' . $i++ . '</td>';
            $output .= '<td>' . $row['name'] . '</td>';
            $output .= '<td>' . $row['purpose'] . '</td>';
            $output .= '<td>' . $row['price'] . '</td>';
            $output .= '<td><img src="uploads_img/' . $row['image'] . '" width="100px"></td>';
            $output .= '<td>' . $row['name'] . '</td>';
            
            
            
            $output .= '<td>';
            $output .= '<a href="?type=delete&accessory_id=' . $row['accessory_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
            $output .= '<i class="feather-trash"></i>';
            $output .= '</a>';
            $output .= '<a class="btn btn-sm bg-danger-light" href="accessory_edit.php?type=update&accessory_id=' . $row['accessory_id'] . '">';
            $output .= '<i class="feather-edit"></i>';
            $output .= '</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }
    } else {
        $output = '<tr><td colspan="8" align="center">No Data Found</td></tr>';
    }
    echo $output;
}else if($_POST['type']=='load'){
    $output = ''; // Initialize the output variable

if ($_POST["query"] != '') {
    $search_array = explode(",", $_POST["query"]);
    $search_text = "'" . implode("','", $search_array) . "'";

    $sel_query = "SELECT * FROM accessories
    JOIN plants ON accessories.plant_id = plants.plant_id
     WHERE accessory_id IN (" . $search_text . ") ORDER BY accessory_id DESC ";
} else {
    $sel_query = "SELECT * FROM accessories
    JOIN plants ON accessories.plant_id = plants.plant_id
    
    WHERE accessories.delete_status = 0";
}

$run = mysqli_query($con, $sel_query);

if (mysqli_num_rows($run) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($run)) {
        $output .= '<tr>';
        $output .= '<td>' . 'ACC' . ' ' . $i++ . '</td>';
        $output .= '<td>' . $row['name'] . '</td>';
        $output .= '<td>' . $row['purpose'] . '</td>';
        $output .= '<td>' . $row['price'] . '</td>';
        $output .= '<td><img src="uploads_img/' . $row['image'] . '" width="100px"></td>';
        $output .= '<td>' . $row['name'] . '</td>';
        
        
        
        $output .= '<td>';
        $output .= '<a href="?type=delete&accessory_id=' . $row['accessory_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
        $output .= '<i class="feather-trash"></i>';
        $output .= '</a>';
        $output .= '<a class="btn btn-sm bg-danger-light" href="accessory_edit.php?type=update&accessory_id=' . $row['accessory_id'] . '">';
        $output .= '<i class="feather-edit"></i>';
        $output .= '</a>';
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output = '<tr><td colspan="8" align="center">No Data Found</td></tr>';
}

echo $output; // Output the generated HTML
}