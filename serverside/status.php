<?php
    include 'dbh.inc.php';

    if(isset($_POST['delete'])){

        $id = $_POST['id'];

        $sql = "DELETE FROM student_registration WHERE student_id='$id';";

        if($result = mysqli_query($conn, $sql)){
            header("Location: ../application_data.php?delete=success");
            exit();
        }
        else{
            header("Location: ../change_status.php?id=$id?delete=fail");
            exit();
        }


    }
    else if(isset($_POST['update'])){
        $id = $_POST['id'];

        $sql = "UPDATE student_registration SET registration_status='Registered' WHERE student_id='$id';";

        if($result = mysqli_query($conn, $sql)){
            header("Location: ../application_data.php?register=success");
            exit();
        }
        else{
            header("Location: ../change_status.php?id=$id?register=fail");
            exit();
        }
    }