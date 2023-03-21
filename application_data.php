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

    <!-- USING THE SAME TEMPLATE :D -->
    <div class="admin_dashboard_header">
        <div class="container">
            <h2>Application Data</h2>
        </div>
    </div>

    <?php
        if(isset($_SESSION['admin_logged_in'])){
    ?>

    <div class="application_interface">
        <div class="container">
            <div class="interface_controls">
                <h2>Search Student: </h2>
                <form method="GET">
                    <label for="category">Sort by: </label>
                    <select name="category">
                        <option value="student_lastname">Last Name</option>
                        <option value="student_firstname">First Name</option>
                        <option value="registration_date">Registration Date</option>
                        <option value="student_grade_level">Grade Level</option>
                        <option value="student_gender">Gender</option>
                        <option value="registration_status">Registration Status</option>
                    </select>
                    <input type="search" name="query" placeholder="Search by First Name, Last Name, or Year Level ">
                    <input type="submit" value="Search">
                </form>
            </div>
            
            <?php
                include_once "serverside/dbh.inc.php";

                if ( isset( $_GET['query'] ) && !empty( $_GET['query'] ) ){
                    $where = $_GET['query'];
                    $order = $_GET['category'];
                    $sql = "SELECT * FROM student_registration WHERE student_grade_level='$where' OR student_firstname='$where' OR student_lastname='$where' ORDER BY $order;";
                    echo "<table>";
                    
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Grade Level</th>
                                    <th>Registration Status</th>
                                    <th>Options</th>
                                </tr>";
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['student_id'];
                                echo "<tr>";
                                echo "<td>".$row['student_lastname']."</td>";
                                echo "<td>".$row['student_firstname']."</td>";
                                echo "<td>".$row['student_grade_level']."</td>";
                                echo "<td><span class='".$row['registration_status']."'>".$row['registration_status']."</span></td>";
                                echo "<td>  <form action='change_status.php' method='GET'>
                                                <input type='text' name='id' value='$id' style='display: none'>
                                                <button type='submit'>Change Status</button>
                                            </form>
                                        <br>
                                            <form action='serverside/generate_pdf.php' method='POST'>
                                            <input type='text' name='id' value='$id' style='display: none'>
                                            <button type='submit' name='submit'>Download PDF</button>
                                            </form>   
                                    </td>";
                                echo "</tr>";
                            }
                        }
                        else{
                            echo "<p class='result'>No Results</p>";
                        }
                    }
                    echo "</table>";
                }
                else{
                    if ( isset( $_GET['category'] ) && !empty( $_GET['category'] ) ){
                        $sql = "SELECT * FROM student_registration ORDER BY ".$_GET['category'].";";
                    }
                    else{
                        $sql = "SELECT * FROM student_registration ORDER BY student_lastname;";
                    }
                    echo "<table>";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Grade Level</th>
                                    <th>Registration Status</th>
                                    <th>Options</th>
                                </tr>";
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['student_id'];
                                echo "<tr>";
                                echo "<td>".$row['student_lastname']."</td>";
                                echo "<td>".$row['student_firstname']."</td>";
                                echo "<td>".$row['student_grade_level']."</td>";
                                echo "<td><span class='".$row['registration_status']."'>".$row['registration_status']."</span></td>";
                                echo "<td>  <form action='change_status.php' method='GET'>
                                                <input type='text' name='id' value='$id' style='display: none'>
                                                <button type='submit'>Change Status</button>
                                            </form>
                                        <br>
                                            <form action='serverside/generate_pdf.php' method='POST'>
                                            <input type='text' name='id' value='$id' style='display: none'>
                                            <button type='submit' name='submit'>Download PDF</button>
                                            </form>   
                                    </td>";
                                echo "</tr>";
                            }
                        }
                    }
                    echo "</table>";

                }
            ?>
        </div>
    </div>

    <?php
        }
        else{
            echo "NOT LOGGED IN";
        }
    ?>

    <?php
        include_once 'layouts/footer.php';
    ?>
    
</body>