<?php
require("connection/connection.inc.php");
require("connection/function.inc.php");



if($_POST['type']=="search"){
    $searchValue = $_POST['value'];
    $sel_query = "SELECT orders.order_id,users.username,orders.order_date,country.country_name,orders.address,orders.phone_number,orders.total_amount,orders.status FROM `orders` INNER JOIN country on orders.country_id = country.country_id INNER JOIN state ON orders.state_id = state.state_id INNER JOIN city ON orders.city_id = city.city_id INNER JOIN users ON orders.user_id = users.user_id WHERE username LIKE '%$searchValue%' OR country_name LIKE '%$searchValue%' OR order_date LIKE '%$searchValue%' ";
    $run = mysqli_query($con, $sel_query);
    $output = '';
    if (mysqli_num_rows($run) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($run)) {
            $output .= '<tr>';
            $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';
    
            $output .= '<td>' . $row['order_id'] . '</td>';
            $output .= '<td>' . $row['username'] . '</td>';
            $output .= '<td>' . $row['order_date'] . '</td>';
            $output .= '<td>' . $row['country_name'] . '</td>';
            $output .= '<td>' . $row['address'] . '</td>';
            $output .= '<td>' . $row['phone_number'] . '</td>';
            $output .= '<td>' . $row['total_amount'] . '</td>';
    
    
            $output .= '<td>';
            // Open the <td> tag here
    
            if ($row['status'] == 1) {
                $output .= '<span style="color:#FFD700;">Pending</span>';
            } else if ($row['status'] == 0) {
                $output .= '<span class="text-success">Completed</span>';
            }else{
                $output .= '<span class="text-danger">Cancelled</span>';
            }
    
            $output .= '</td>'; // Close the <td> tag here
    
            $output .= '<td>';
            // $output .= '<a href="?type=delete&order_detail_id=' . $row['order_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
            // $output .= '<i class="feather-trash"></i>';
            // $output .= '</a>';
            // $output .= '<a class="btn btn-sm bg-danger-light" href="order_edit.php?type=update&order_detail_id=' . $row['order_id'] . '">';
            // $output .= '<i class="feather-edit"></i>';
            // $output .= '</a>';
           
            $output.="<form method='post' action='./orderdetails.php'>
                <input hidden type='number' name='orderId' value='{$row['order_id']}'>
                <button class='btn btn-primary text-white  btn-sm me-1' type='submit' name='updateOrder'>ConfirmOrder</button>
            </form>";
            $output .= '</td>';
            $output .= '</tr>';
        }
    } else {
        $output = '<tr><td colspan="8" align="center">No Data Found</td></tr>';
    }
    echo $output;
}else{
    $output = ''; // Initialize the output variable

// if ($_POST["query"] != '') {
//     $search_array = explode(",", $_POST["query"]);
//     $search_text = "'" . implode("','", $search_array) . "'";

//     $sel_query = "SELECT orders.order_id,users.username,orders.order_date,country.country_name,orders.address,orders.phone_number,orders.total_amount,orders.status FROM `orders` INNER JOIN country on orders.country_id = country.country_id INNER JOIN state ON orders.state_id = state.state_id INNER JOIN city ON orders.city_id = city.city_id INNER JOIN users ON orders.user_id = users.user_id ORDER BY orders.order_id";
// } else {
//     $sel_query = "SELECT orders.order_id,users.username,orders.order_date,country.country_name,orders.address,orders.phone_number,orders.total_amount,orders.status FROM `orders` INNER JOIN country on orders.country_id = country.country_id INNER JOIN state ON orders.state_id = state.state_id INNER JOIN city ON orders.city_id = city.city_id INNER JOIN users ON orders.user_id = users.user_id ORDER BY orders.order_id";
// }
$sel_query = "SELECT orders.order_id,users.username,orders.order_date,country.country_name,orders.address,orders.phone_number,orders.total_amount,orders.status FROM `orders` INNER JOIN country on orders.country_id = country.country_id INNER JOIN state ON orders.state_id = state.state_id INNER JOIN city ON orders.city_id = city.city_id INNER JOIN users ON orders.user_id = users.user_id ORDER BY orders.order_id";

$run = mysqli_query($con, $sel_query);

if (mysqli_num_rows($run) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($run)) {
        $output .= '<tr>';
        $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';

        $output .= '<td>' . $row['order_id'] . '</td>';
        $output .= '<td>' . $row['username'] . '</td>';
        $output .= '<td>' . $row['order_date'] . '</td>';
        $output .= '<td>' . $row['country_name'] . '</td>';
        $output .= '<td>' . $row['address'] . '</td>';
        $output .= '<td>' . $row['phone_number'] . '</td>';
        $output .= '<td>' . $row['total_amount'] . '</td>';


        $output .= '<td>';
        // Open the <td> tag here

        if ($row['status'] == 1) {
            $output .= '<span style="color:#FFD700;">Pending</span>';
        } else if ($row['status'] == 0) {
            $output .= '<span class="text-success">Completed</span>';
        }else{
            $output .= '<span class="text-danger">Cancelled</span>';
        }

        $output .= '</td>'; // Close the <td> tag here

        $output .= '<td>';
        // $output .= '<a href="?type=delete&order_detail_id=' . $row['order_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
        // $output .= '<i class="feather-trash"></i>';
        // $output .= '</a>';
        // $output .= '<a class="btn btn-sm bg-danger-light" href="order_edit.php?type=update&order_detail_id=' . $row['order_id'] . '">';
        // $output .= '<i class="feather-edit"></i>';
        // $output .= '</a>';
       
        $output.="<form method='post' action='./orderdetails.php'>
            <input hidden type='number' name='orderId' value='{$row['order_id']}'>
            <button class='btn btn-primary text-white  btn-sm me-1' type='submit' name='updateOrder'>ConfirmOrder</button>
        </form>";
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output = '<tr><td colspan="8" align="center">No Data Found</td></tr>';
}

echo $output; // Output the generated HTML
}


?>