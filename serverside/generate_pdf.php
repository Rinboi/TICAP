<?php
    
    include_once 'dbh.inc.php';
    include_once 'variables.inc.php';

    require '../form_to_pdf/fpdf.php';

    if(isset($_POST['submit'])){

        $studentID = $_POST['id'];

        $sql = "SELECT * FROM student_registration WHERE student_id='$studentID';";

        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $regType = $row['student_type'];
                    $gradeLevel = $row['student_grade_level'];
                    $studentFirst = $row['student_firstname'];
                    $studentMiddle = $row['student_middlename'];
                    $studentLast = $row['student_lastname'];
                    $birthdate = $row['student_birthdate'];
                    $gender = $row['student_gender'];
                    $street = $row['student_street_address'];
                    $city = $row['student_city'];
                    $province = $row['student_province'];
                    $guardianRelationship = $row['guardian_relationship'];
                    $guardianFirst = $row['guardian_firstname'];
                    $guardianMiddle = $row['guardian_middlename'];
                    $guardianLast = $row['guardian_lastname'];
                    $guardianMobile = $row['guardian_mobile'];
                    $guardianEmail = $row['guardian_email'];

                    $pdf = new FPDF();
                    $pdf->AddPage();

                    // Cell Args Width, Height, String, Border 0 or 1, Line, Center text C for center, fill true or false, link

                    $pdf->SetFont("Arial","I","10");
                    $pdf->Text(168, 7, "Registration Form");

                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(100,100,100);
                    $pdf->Text(10, 30,$websiteAddress);

                    $pdf->SetFillColor(255, 190, 190);
                    $pdf->Rect(170,28,30,30,"F"); // added
                    $pdf->Text(178,45,"1x1 Picture");

                    $pdf->SetFillColor(224, 54, 54);
                    $pdf->SetTextColor(255,255,255);
                    $pdf->SetFont("Arial","B","17");
                    
                    $pdf->Cell(190,15,$websiteName,0,0,"C", true);
                    $pdf->Image('../images/'.$websiteLogo,12,11,13,13);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","B","14");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Ln();
                    $pdf->Ln(); // added
                    $pdf->Cell(95,10,"Student's Information",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(95,10,$regType,1,0);
                    $pdf->Cell(95,10,$gradeLevel,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,8,"Registration Type",0,0);
                    $pdf->Cell(95,8,"Grade Level",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(63,10,$studentFirst,1,0);
                    $pdf->Cell(63,10,$studentMiddle,1,0);
                    $pdf->Cell(64,10,$studentLast,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(63,8,"First Name",0,0);
                    $pdf->Cell(63,8,"Middle Name",0,0);
                    $pdf->Cell(64,8,"Last Name",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(95,10,$birthdate,1,0);
                    $pdf->Cell(95,10,$gender,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,8,"Birth Date",0,0);
                    $pdf->Cell(95,8,"Gender",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(190,10,$street,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(190,8,"Street Address",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(95,10,$city,1,0);
                    $pdf->Cell(95,10,$province,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,8,"City",0,0);
                    $pdf->Cell(95,8,"State/Province",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","B","14");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,10,"Parent/Guardian's Information",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(95,10,$guardianRelationship,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,8,"Relationship",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(63,10,$guardianFirst,1,0);
                    $pdf->Cell(63,10,$guardianMiddle,1,0);
                    $pdf->Cell(64,10,$guardianLast,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(63,8,"First Name",0,0);
                    $pdf->Cell(63,8,"Middle Name",0,0);
                    $pdf->Cell(64,8,"Last Name",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","10");
                    $pdf->SetDrawColor(224, 54, 54);
                    $pdf->SetTextColor(20,20,20);
                    $pdf->Cell(95,10,$guardianMobile,1,0);
                    $pdf->Cell(95,10,$guardianEmail,1,0);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","","8");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,8,"Mobile Number",0,0);
                    $pdf->Cell(95,8,"Email Address",0,0);
                    $pdf->Ln();
                    $pdf->Ln();
                    $pdf->Ln();
                    $pdf->SetFillColor(255, 209, 210);
                    $pdf->Cell(95,25,"",0,0,"C", true);
                    $pdf->Ln();
                    $pdf->SetFont("Arial","B","10");
                    $pdf->SetTextColor(224,54,54);
                    $pdf->Cell(95,8,"Parent/Guardian's Signature Over Printed Name",0,0);
                    $pdf->Ln();
                    $pdf->SetFont("Courier","B","8");
                    $pdf->SetTextColor(100,100,100);
                    $pdf->Cell(190,8,"Registration ID: ".$studentID,0,0,"R");

                    $pdf->Output("D",$studentLast."_Registration_Form.pdf");
                }
            }
        }
    }

    