<?php
    session_start();
    if(isset($_SESSION['userDetails'])){
        $userName = $_SESSION['userDetails']['userName'];
    }
    else if(isset($_SESSION['adminDetails'])){
        header("location:./admin/index.php");
    }

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("location:./index.php");
    }
    
?>