<?php

    session_start();

    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){

        $currentUsername = mysqli_real_escape_string($conn, $_POST['username_old']);
        $currentPassword = mysqli_real_escape_string($conn, $_POST['password_old']);
        $newUsername = mysqli_real_escape_string($conn, $_POST['username_new']);
        $newPassword = mysqli_real_escape_string($conn, $_POST['password_new']);
        $newPasswordConfirm = mysqli_real_escape_string($conn, $_POST['password_new_confirm']);

        $databaseCurrentUsername = "";
        $databaseCurrentPassword = "";

        $currentSessionValue = $_SESSION['admin_logged_in'];

        // RETRIVE CURRENT DATA FROM THE DATABASE
        $getAdminDetails = "SELECT * FROM admin WHERE admin_username='$currentSessionValue';";
        if($result = mysqli_query($conn, $getAdminDetails)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $databaseCurrentUsername = $row['admin_username'];
                    $databaseCurrentPassword = $row['admin_password'];
                }
            }
        }
        else{
            echo "error";
        }

        if(! (empty($currentUsername) || 
            empty($currentPassword)  ||
            empty($newUsername) ||
            empty($newPassword) ||
            empty($newPasswordConfirm) )
        ){
            if($currentUsername == $databaseCurrentUsername){
                if(!password_verify($currentPassword, $databaseCurrentPassword)){
                    header("Location: ../admin_dashboard.php?admin=incorrectpassword");
                    exit();
                }
                else{
                    if (!preg_match('/[^A-Za-z0-9]/', $newUsername) && strlen($newUsername) >= 4) // '/[^a-z\d]/i' should also work.
                    {
                        // string contains only english letters & digits and contains 4 characters or more
                        if($newPassword == $newPasswordConfirm){
                            if(strlen($newPassword) >= 4){
                                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                             
                                $updateAdmin = "UPDATE admin SET admin_username='$newUsername', admin_password='$hashedPassword' WHERE admin_username='$currentSessionValue';";
                                if(mysqli_query($conn, $updateAdmin)){
                                    $_SESSION['admin_logged_in'] = $newUsername;
                                    header("Location: ../admin_dashboard.php?admin=success");
                                    exit();
                                }
                                else{
                                    $_SESSION['error_message'] = "Warning: Server Error!";
                                    header("Location: ../admin_dashboard.php?admin=servererror");
                                    exit();
                                }
                            }
                            else{
                                $_SESSION['error_message'] = "Warning: Password too short!";
                                header("Location: ../admin_dashboard.php?admin=password_too_short");
                                exit();
                            }
                        }
                        else{
                            $_SESSION['error_message'] = "Warning: Password Does not match!";
                            header("Location: ../admin_dashboard.php?admin=passwords_doesnt_match");
                            exit();
                        }
                    }
                    else{
                        $_SESSION['error_message'] = "Warning: Invalid characters";
                        header("Location: ../admin_dashboard.php?admin=invalid_characters");
                        exit();
                    }
                }
            }
            else{
                $_SESSION['error_message'] = "Warning: Incorrect Information";
                header("Location: ../admin_dashboard.php?admin=incorrect_info");
                exit();
            }
        }
        else{
            $_SESSION['error_message'] = "Warning: Empty Fields";
            header("Location: ../admin_dashboard.php?admin=empty");
            exit();
        }

    }
    else if(isset($_POST['restore_to_default'])){

        // RESET TO DEFAULT

        $defaultUsername = "admin";
        $defaultPassword = password_hash($defaultUsername, PASSWORD_DEFAULT);

        $currentAdmin = $_SESSION['admin_logged_in'];

        $resetQuery = "UPDATE admin SET admin_username='$defaultUsername', admin_password='$defaultPassword' WHERE admin_username='$currentAdmin';";

        if(mysqli_query($conn, $resetQuery)){
            header("Location: ../admin_dashboard.php?reset=default");
            exit();
        }else{
            header("Location: ../admin_dashboard.php?reset=error");
            exit();
        }

        
    }