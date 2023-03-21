<?php

    session_start();

    include_once 'dbh.inc.php';

    // Verifies admin login
    if(isset($_POST['submit'])){
        
        $studemail = mysqli_real_escape_string($conn, $_POST['studemail']);
        $studpassword = mysqli_real_escape_string($conn, $_POST['studpassword']);

        $serverStudemail = "";
        $serverStudpassword = "";
        
        $getQuery = "SELECT * FROM student_registration WHERE guardian_email ='$studemail'";
        if($results = mysqli_query($conn, $getQuery)){
            if(mysqli_num_rows($results) > 0){
                while($row = mysqli_fetch_array($results)){
                    $serverStudemail = $row['guardian_email'];
                    $serverStudpassword = $row['studpassword'];
                }
            }
        }

        if( !(empty($studemail) || empty($studpassword)) ){
            if($studemail == $serverStudemail){
                if(password_verify($studpassword, $serverStudpassword)){
                    echo "Passowords Match!";
                    $_SESSION['student_logged_in'] = $serverStudemail;
                    header("Location: ../index.php");
                }
                else{
                    header("Location: ../account.php?login=error");     
                }
            }
            else{
                header("Location: ../account.php?login=error");
            }
        }else{
            header("Location: ../account.php?login=empty");   
        }
        

    }