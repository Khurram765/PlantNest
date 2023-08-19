<?php
require("connection/connection.inc.php");
require("connection/function.inc.php");



if($_POST['type']=='search'){
    $searchValue = $_POST['value'];
    $sel_query = "SELECT * FROM `reviews` INNER JOIN users ON reviews.user_id = users.user_id WHERE `delete_status`= 0 AND (review_text LIKE '%$searchValue%' OR review_date LIKE '%$searchValue%' OR username LIKE '%$searchValue%' )";
    $run = mysqli_query($con, $sel_query);
    $output = '';
    if (mysqli_num_rows($run) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($run)) {
            $output .= '<tr>';
            $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';
            $output .= '<td>' . $row['review_date'] . '</td>';
            $output .= '<td>' . $row['username'] . '</td>';
            $output .= '<td>' . $row['plant_id'] . '</td>';
            $output .= '<td>' . $row['review_text'] . '</td>';
            $output .= '<td>' . $row['rating'] . '</td>';
    
    
            $output .= '<td>';
            // Open the <td> tag here
    
            if ($row['status'] == 1) {
                $output .= '<a href="?type=status&operation=deactive&review_id=' . $row['review_id'] . '" class="btn btn-primary text-white btn-sm me-1">Active</a>';
            } else {
                $output .= '<a href="?type=status&operation=active&review_id=' . $row['review_id'] . '" class="btn btn-success text-white btn-sm me-1">Deactive</a>';
            }
    
            $output .= '</td>'; // Close the <td> tag here
    
            $output .= '<td>';
            $output .= '<a href="?type=delete&review_id=' . $row['review_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
            $output .= '<i class="feather-trash"></i>';
            $output .= '</a>';
            $output .= '<a class="btn btn-sm bg-danger-light" href="reviews_edit.php?type=update&review_id=' . $row['review_id'] . '">';
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

    $sel_query = "SELECT * FROM `reviews` INNER JOIN users ON reviews.user_id = users.user_id WHERE review_id IN (" . $search_text . ") ORDER BY review_id DESC ";
} else {
    $sel_query = "SELECT * FROM `reviews` INNER JOIN users ON reviews.user_id = users.user_id WHERE `delete_status`= 0";
}

$run = mysqli_query($con, $sel_query);

if (mysqli_num_rows($run) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($run)) {
        $output .= '<tr>';
        $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';
        $output .= '<td>' . $row['review_date'] . '</td>';
        $output .= '<td>' . $row['username'] . '</td>';
        $output .= '<td>' . $row['plant_id'] . '</td>';
        $output .= '<td>' . $row['review_text'] . '</td>';
        $output .= '<td>' . $row['rating'] . '</td>';


        $output .= '<td>';
        // Open the <td> tag here

        if ($row['status'] == 1) {
            $output .= '<a href="?type=status&operation=deactive&review_id=' . $row['review_id'] . '" class="btn btn-primary text-white btn-sm me-1">Active</a>';
        } else {
            $output .= '<a href="?type=status&operation=active&review_id=' . $row['review_id'] . '" class="btn btn-success text-white btn-sm me-1">Deactive</a>';
        }

        $output .= '</td>'; // Close the <td> tag here

        $output .= '<td>';
        $output .= '<a href="?type=delete&review_id=' . $row['review_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
        $output .= '<i class="feather-trash"></i>';
        $output .= '</a>';
        $output .= '<a class="btn btn-sm bg-danger-light" href="reviews_edit.php?type=update&review_id=' . $row['review_id'] . '">';
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
?>