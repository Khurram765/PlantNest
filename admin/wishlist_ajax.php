<?php
require("connection/connection.inc.php");
require("connection/function.inc.php");

$output = ''; // Initialize the output variable

if ($_POST["query"] != '') {
    $search_array = explode(",", $_POST["query"]);
    $search_text = "'" . implode("','", $search_array) . "'";

    $sel_query = "SELECT * FROM wishlist
    JOIN users ON wishlist.user_id = users.user_id
    JOIN plants ON wishlist.plant_id = plants.plant_id
    WHERE wishlist_id IN (" . $search_text . ") ORDER BY wishlist_id DESC ";
} else {
    $sel_query = "SELECT * FROM wishlist
    JOIN users ON wishlist.user_id = users.user_id
    JOIN plants ON wishlist.plant_id = plants.plant_id
    WHERE wishlist.delete_status = 0";
}

$run = mysqli_query($con, $sel_query);

if (mysqli_num_rows($run) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($run)) {
        $output .= '<tr>';
        $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';

        $output .= '<td>' . $row['username'] . '</td>';
        $output .= '<td>' . $row['name'] . '</td>';

        $output .= '<td>';
        // Open the <td> tag here

        if ($row['status'] == 1) {
            $output .= '<a href="?type=status&operation=deactive&wishlist_id=' . $row['wishlist_id'] . '" class="btn btn-primary text-white btn-sm me-1">Active</a>';
        } else {
            $output .= '<a href="?type=status&operation=active&wishlist_id=' . $row['wishlist_id'] . '" class="btn btn-success text-white btn-sm me-1">Deactive</a>';
        }

        $output .= '</td>'; // Close the <td> tag here

        $output .= '<td>';
        $output .= '<a href="?type=delete&wishlist_id=' . $row['wishlist_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
        $output .= '<i class="feather-trash"></i>';
        $output .= '</a>';
        $output .= '<a class="btn btn-sm bg-danger-light" href="wishlist_edit.php?type=update&wishlist_id=' . $row['wishlist_id'] . '">';
        $output .= '<i class="feather-edit"></i>';
        $output .= '</a>';
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output = '<tr><td colspan="8" align="center">No Data Found</td></tr>';
}

echo $output; // Output the generated HTML
?>