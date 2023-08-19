<?php

function pr($arr)
{

    echo "<p></p>";
    print_r($arr);
}


function pre($arr)
{

    echo "<p></p>";
    print_r($arr);
}

function get_save_value($con, $str)
{
    if ($str != "") {
        return mysqli_real_escape_string($con, $str);
    }
}



?>