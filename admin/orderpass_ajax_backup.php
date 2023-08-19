<?php
require("connection/connection.inc.php");
require("connection/function.inc.php");

$output = ''; // Initialize the output variable

if ($_POST["query"] != '') {
    $search_array = explode(",", $_POST["query"]);
    $search_text = "'" . implode("','", $search_array) . "'";

    $sel_query = "SELECT * FROM orders
    JOIN state ON orders.state_id = state.state_id
    JOIN city ON orders.city_id = city.city_id
    JOIN country ON orders.country_id = country.country_id
    JOIN users ON orders.user_id = users.user_id
    WHERE order_id IN (" . $search_text . ") ORDER BY order_id DESC ";
} else {
    $sel_query = "SELECT * FROM orders
    JOIN state ON orders.state_id = state.state_id
    JOIN city ON orders.city_id = city.city_id
    JOIN country ON orders.country_id = country.country_id
    JOIN users ON orders.user_id = users.user_id
    WHERE orders.delete_status = 1";
}

$run = mysqli_query($con, $sel_query);

if (mysqli_num_rows($run) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($run)) {
        $output .= '<tr>';
        $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';

        $output .= '<td>' . $row['order_name'] . '</td>';
        $output .= '<td>' . $row['country_name'] . '</td>';
        $output .= '<td>' . $row['state_name'] . '</td>';
        $output .= '<td>' . $row['city_name'] . '</td>';
        $output .= '<td>' . $row['postal_code'] . '</td>';
        $output .= '<td>' . $row['address'] . '</td>';
        $output .= '<td>' . $row['email_address'] . '</td>';
        $output .= '<td>' . $row['phone_number'] . '</td>';
        $output .= '<td>' . $row['user_name'] . '</td>';
        $output .= '<td>' . $row['order_date'] . '</td>';
        $output .= '<td>' . $row['total_amount'] . '</td>';


        $output .= '<td>';
        // Open the <td> tag here

        if ($row['status'] == 1) {
            $output .= '<a href="?type=status&operation=deactive&order_id=' . $row['order_id'] . '" class="btn btn-primary text-white btn-sm me-1">Active</a>';
        } else {
            $output .= '<a href="?type=status&operation=active&order_id=' . $row['order_id'] . '" class="btn btn-success text-white btn-sm me-1">Deactive</a>';
        }

        $output .= '</td>'; // Close the <td> tag here

        $output .= '<td>';
        $output .= '<a href="?type=delete&order_id=' . $row['order_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
        $output .= '<i class="feather-trash"></i>';
        $output .= '</a>';
        $output .= '<a class="btn btn-sm bg-danger-light" href="order_edit.php?type=update&order_id=' . $row['order_id'] . '">';
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