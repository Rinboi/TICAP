<?php

    session_start();

    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['school_name']);
        $address = mysqli_real_escape_string($conn, $_POST['school_address']);
        $contact = mysqli_real_escape_string($conn, $_POST['school_contact']);

        $fileName = "";

        // LOGO

        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','gif');

        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if ($fileSize < 90000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $fileName = $fileNameNew;

                    if(!(
                        empty($name) ||
                        empty($address)  ||
                        empty($contact)
                    )){
                        $schoolQuery = "UPDATE school SET school_name='$name', school_address='$address', contact_number='$contact', school_logo='$fileName' WHERE school_id=1;";
                        if(mysqli_query($conn, $schoolQuery)){
                            header("Location: ../admin_dashboard.php?school_edit=success");
                            exit();
                        }
                        else{
                            header("Location: ../admin_dashboard.php?school_edit=databaseerror");
                            exit();
                        }
                    }
                    else{
                        header("Location: ../admin_dashboard.php?school_edit=error");
                        exit();
                    }


                }
                else{
                    header("Location: ../admin_dashboard.php?school_logo=invalidtype");
                    exit();
                }
        }
        else{
            header("Location: ../admin_dashboard.php?school_logo=invalidtype");
            exit();
        }
    } 
    else {
        header("Location: ../admin_dashboard.php?school_logo=invalidtype");
        exit();
    }


        

        

    }
