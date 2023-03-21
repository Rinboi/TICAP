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
    <title><?php echo $websiteName; ?> - Online Registration</title>
    <link rel="icon" href="images/<?php echo $websiteLogo; ?>">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/registration.css">
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
            <h2>Online Registration</h2>
        </div>
    </div>

    <?php
        if ( isset( $_GET['input'] ) && !empty( $_GET['input'] ) ){

            if($_GET['input'] == "invalidcharacters"){
                echo "
                    <div class='online_registration_error'>
                    <div class='container'>
                        <h3>Warning: Invalid characters were used in the registration form.</h3>
                    </div>
                    </div>
                ";
            }

        }
    ?>

    <div class="registration-form">
        <div class="container"> 
            <form action="serverside/registration_validation.php" method="POST" id="reg_form">
               <p class="registration_warnings">Fill out the form carefully for registration.</p> 

               <p class="registration_headers">Registration Type</p>
               
               <div class="input_dividers">
                   <div class="input_dividers_child">
                        <select name="registration_type">
                            <option value="New Student">New Student</option>
                            <option value="Old Student">Old Student</option>
                        </select>
                   </div>
               </div>

               <p class="registration_headers">Grade Level</p>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <select name="grade_level">
                            <option value="Kinder">Kinder</option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                       </select>
                       <p>Grade Level</p>
                   </div> 
               </div>

               <p class="registration_headers">Student Name</p>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="text" placeholder="First Name (Required)" name="student_fname" required>
                       <p>First Name</p>
                   </div> 
                   <div class="input_dividers_child">
                       <input type="text" placeholder="Middle Name (Optional)" name="student_mname">
                       <p>Middle Name</p>
                   </div>
                   <div class="input_dividers_child">
                       <input type="text" placeholder="Last Name (Required)" name="student_lname" required>
                       <p>Last Name</p>
                   </div>
               </div>

               <p class="registration_headers">Birth Date</p>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="date" name="birth_date" required>
                   </div>
               </div>

               <p class="registration_headers">Gender</p>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <select name="student_gender">
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                       </select>
                   </div>
               </div>

               <p class="registration_headers">Address</p>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="text" placeholder="Street Address (Required)" class="input_long" name="street_address" required>
                       <p>Street Address</p>
                   </div>
               </div>
               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="text" placeholder="City (Required)" name="city_address" required>
                       <p>City</p>
                   </div>
                   <div class="input_dividers_child">
                       <input type="text" placeholder="State / Province (Required)" name="province_address" required>
                       <p>State / Province</p>
                   </div>
               </div>

               <p class="registration_headers">Parent / Guardian Info</p>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="text" placeholder="Relationship (Required)" name="guardian_relationship" required>
                       <p>Relationship</p>
                   </div>
               </div>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="text" placeholder="First Name (Required)" name="guardian_fname" required>
                       <p>First Name</p>
                   </div> 
                   <div class="input_dividers_child">
                       <input type="text" placeholder="Middle Name (Optional)" name="guardian_mname">
                       <p>Middle Name</p>
                   </div>
                   <div class="input_dividers_child">
                       <input type="text" placeholder="Last Name (Required)" name="guardian_lname" required>
                       <p>Last Name</p>
                   </div>
               </div>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input type="text" placeholder="09xxxxxxxxx" name="guardian_mobile" required>
                       <p>Mobile Number</p>
                   </div> 
                   <div class="input_dividers_child">
                       <input type="email" placeholder="example@email.com" name="guardian_email" required>
                       <p>Email Address</p>
                   </div> 
               </div>

               <br><br>

               <div class="input_dividers">
                   <div class="input_dividers_child">
                       <input class="button" type="submit" name="submit" value="Submit Application">
                   </div>
                   <div class="input_dividers_child">
                       <button type="button" class="button" onclick="clearAll()">Clear Fields</button>
                   </div>
               </div>

            </form>
        </div>
    </div>

    <script>
        function clearAll(){    
            document.getElementById("reg_form").reset();
        }
    </script>

    <?php
        include_once "layouts/footer.php";
    ?>

</body>
</html>

