<?php
    session_start();
    include_once 'serverside/variables.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $websiteName; ?> - Registered Applicants</title>
    <link rel="icon" href="images/<?php echo $websiteLogo; ?>">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/application_data.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
</head>

<body>

    <?php
        include_once "layouts/header.php";
    ?>

    <?php
    if(isset($_SESSION['admin_logged_in'])){

        ?>

        <!-- USING THE SAME TEMPLATE :D -->
    <div class="admin_dashboard_header">
        <div class="container">
            <h2>Change Student Status</h2>
        </div>
    </div>

        <?php

        if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
            include_once 'serverside/dbh.inc.php';

            $id = mysqli_real_escape_string($conn, strval($_GET['id']));  

            $sql = "SELECT * FROM student_registration WHERE student_id='$id';";

            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fullName = $row['student_firstname']." ".$row['student_lastname'];
                        $status = $row['registration_status'];
                        $gradeLevel = $row['student_grade_level'];

                        echo "<div class='status_controls'>
                    <div class='container'>
                        <div class='row'>
                            <table>
                                <tr>
                                    <td>Student ID:</td>
                                    <td>$id</td>
                                </tr>
                                <tr>
                                    <td>Student Name:</td>
                                    <td>$fullName</td>
                                </tr>
                                <tr>
                                    <td>Current Status:</td>
                                    <td>$status</td>
                                </tr>
                                <tr>
                                    <td>Grade Level: </td>
                                    <td>$gradeLevel</td>
                                </tr>
                                <tr>
                                    <td>
                                    <form onsubmit='return confirm(\"Do you really want to delete this student?\");' action='serverside/status.php' method='POST'>
                                    <input type='text' name='id' value='$id' style='display:none'>
                                    <button type='submit' name='delete'>Delete Student</button>
                                    </form>
                                    ";

                                    if($status == "Pending"){
                                        echo "<form onsubmit='return confirm(\"Are you sure you want to change the status?\");' action='serverside/status.php' method='POST'>
                                        <input type='text' name='id' value='$id' style='display:none'>
                                        <button type='submit' name='update'>Officially Register</button>
                                        </form>
                                        </td>";
                                    }



                                    echo "
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>";
                        
                    }
                }
            }
            else{
                echo "ERROR";
            }
        }
    }
    else{
        ?>

        <!-- HTML CODE IF ADMIN IS NOT LOGGED IN -->
        <div class="warning_message">
            <div class="container">
                <div class="warning_content">
                    <img src="images/warning_symbol.png" alt="Warning">
                    <h2>Access Denied: You must be an admin to access this part of the website.</h2>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

    

    <?php
        include_once 'layouts/footer.php';
    ?>
    
</body>

</html>