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
if (isset($_POST['submit'])) {




    $feedback_name = get_save_value($con, $_POST['feedback_name']);
    $feedback_email = get_save_value($con, $_POST['feedback_email']);
    $feedback_subject = get_save_value($con, $_POST['feedback_subject']);
    $feedback_text = get_save_value($con, $_POST['feedback_text']);

    $status = get_save_value($con, $_POST['status']);

    $insert_sql = "INSERT INTO `feedback`( `feedback_name`, `feedback_email`, `feedback_subject`, `feedback_text`,`status`) VALUES ('$feedback_name','$feedback_email','$feedback_subject','$feedback_text','$status')";

    $res = mysqli_query($con, $insert_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
    } else {
        echo "<script>Swal.fire('Not Edit Data ERROR')</script>";
    }
}

?>




<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">

                        <h3 class="page-title">Add Feedback</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Feedback.php">Feedback</a></li>
                            <li class="breadcrumb-item active">Add Feedbacks</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Feedback Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>Feedback name <span class="login-danger">*</span></label>
                                            <input class="form-control " type="text" name="feedback_name"
                                                placeholder="Enter feedback Name">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group local-forms">
                                                <label>Feedback Email <span class="login-danger">*</span></label>
                                                <input class="form-control " type="text" name="feedback_email"
                                                    placeholder="Enter feedback Email">

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group local-forms">
                                                    <label>Feedback Subject <span class="login-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feedback_subject"
                                                        placeholder="Enter Feedback Subject">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group local-forms">
                                                        <label>Feedback Text <span class="login-danger">*</span></label>
                                                        <input class="form-control " type="text" name="feedback_text"
                                                            placeholder="Enter Feedback Text">
                                                    </div>
                                                </div>


                                                <div class="row">


                                                    <div class="col-12 col-sm-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="active" value="1" checked="1" required>
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Active</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="dactive" value="0" required>
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">Dactive</label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="student-submit">
                                                        <button type="submit" class="btn btn-primary"
                                                            name="submit">Submit</button>
                                                    </div>
                                                </div>

                                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php
require("dashboard_part/script.php");
?>



<script>
    // JavaScript validation function
    function validateForm() {
        var categoryImage1 = document.querySelector('input[name="feedback_name"]').value;
        var categoryImage2 = document.querySelector('input[name="feedback_email"]').value;
        var categoryImage3 = document.querySelector('input[name="feedback_subject"]').value;
        var categoryImage4 = document.querySelector('input[name="feedback_text"]').value;
  
      

        
        if (categoryImage1 === "") {
            alert("Please select a feedback name.");
            return false;
        }
       
        if (categoryImage2 === "") {
            alert("Please select a feedback email.");
            return false;
        }
       
        if (categoryImage3 === "") {
            alert("Please select a feedback subject.");
            return false;
        }
       
        if (categoryImage4 === "") {
            alert("Please select a feedback text.");
            return false;
        }
       
       
        return true;
    }
</script>