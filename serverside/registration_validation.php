<?php 
    // Validates and inserts registration data for the student

    include_once 'dbh.inc.php';
    include_once 'variables.inc.php';

    if(isset($_POST['submit'])){

        // Double Checking the forms for valid input

        $regType = mysqli_real_escape_string($conn, $_POST['registration_type']);
        $gradeLevel = mysqli_real_escape_string($conn, $_POST['grade_level']);
        $studentFirst = mysqli_real_escape_string($conn, $_POST['student_fname']);
        $studentMiddle = mysqli_real_escape_string($conn, $_POST['student_mname']);
        $studentLast = mysqli_real_escape_string($conn, $_POST['student_lname']);
        $birthdate = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $gender = mysqli_real_escape_string($conn, $_POST['student_gender']);
        $street = mysqli_real_escape_string($conn, $_POST['street_address']);
        $city = mysqli_real_escape_string($conn, $_POST['city_address']);
        $province = mysqli_real_escape_string($conn, $_POST['province_address']);
        $guardianRelationship = mysqli_real_escape_string($conn, $_POST['guardian_relationship']);
        $guardianFirst = mysqli_real_escape_string($conn, $_POST['guardian_fname']);
        $guardianMiddle = mysqli_real_escape_string($conn, $_POST['guardian_mname']);
        $guardianLast = mysqli_real_escape_string($conn, $_POST['guardian_lname']);
        $guardianMobile = mysqli_real_escape_string($conn, $_POST['guardian_mobile']);
        $guardianEmail = mysqli_real_escape_string($conn, $_POST['guardian_email']);

        $currentDate = date("F d, Y");
        $currentTime = date("h:i:s A");

        $studentID = md5($studentFirst.$studentLast);


        if(  !empty($studentFirst) &&
             !empty($studentLast)  &&
             !empty($street) &&
             !empty($city) &&
             !empty($province) &&
             !empty($guardianRelationship) &&
             !empty($guardianFirst) &&
             !empty($guardianLast) &&
             !empty($guardianMobile) &&
             !empty($guardianEmail)
             ){
            // If everything is not empty

            if( (!preg_match('/[^A-Za-z]/', $studentFirst)) &&
                (!preg_match('/[^A-Za-z]/', $studentLast))  &&
                (!preg_match('/[^A-Za-z]/', $guardianRelationship)) &&
                (!preg_match('/[^A-Za-z]/', $guardianFirst)) &&
                (!preg_match('/[^A-Za-z]/', $guardianLast)) &&
                (!preg_match('/[^0-9]/', $guardianMobile)) &&
                (!preg_match('/[^A-Za-z]/', $studentMiddle)) &&
                (!preg_match('/[^A-Za-z]/', $guardianMiddle))
                )
            {

                // Checks if characters have valid characters in it

                // Replaces Middle names into null if empty

                if(empty($studentMiddle)){
                    $studentMiddle = NULL;
                }
                if(empty($guardianMiddle)){
                    $guardianMiddle = NULL;
                }
                if (!filter_var($guardianEmail, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../online_registration.php?input=invalid%email");
                }
                else{
                    // If everything is okay
                    // INSERT INTO DATABASE :D (VERY LONG)
                    $sql = "INSERT INTO student_registration(
                        student_id,
                        student_type,
                        student_grade_level,
                        student_firstname,
                        student_middlename,
                        student_lastname,
                        student_birthdate,
                        student_gender,
                        student_street_address,
                        student_city,
                        student_province,
                        guardian_relationship,
                        guardian_firstname,
                        guardian_middlename,
                        guardian_lastname,
                        guardian_mobile,
                        guardian_email,
                        registration_date,
                        registration_time,
                        registration_status
                    ) VALUES (
                        '$studentID',
                        '$regType',
                        '$gradeLevel',
                        '$studentFirst',
                        '$studentMiddle',
                        '$studentLast',
                        '$birthdate',
                        '$gender',
                        '$street',
                        '$city',
                        '$province',
                        '$guardianRelationship',
                        '$guardianFirst',
                        '$guardianMiddle',
                        '$guardianLast',
                        '$guardianMobile',
                        '$guardianEmail',
                        '$currentDate',
                        '$currentTime',
                        'Pending'
                    );";
                    
                    if($result = mysqli_query($conn, $sql)){
                        
                        // Show pdf and insert into database
                        // Cell Args Width, Height, String, Border 0 or 1, Line, Center text C for center, fill true or false, link
                        header("Location: ../registration_success.php?id=".$studentID);                    
                        exit();
                    }else{
                        header("Location: ../online_registration.php?database=error");
                        exit();
                    }

                }
            }
            else{
                header("Location: ../online_registration.php?input=invalidcharacters");
                exit();
            }
        }
        else{
            // If one of them is empty
            header("Locatition: ../online_registration.php?input=empty");
            exit();
        }

    }
