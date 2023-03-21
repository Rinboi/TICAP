<?php

    include_once 'dbh.inc.php';

    $detailQuery = "SELECT * FROM school WHERE school_id=1;";

    $websiteName = "";
    $websiteAddress = "";
    $websiteContact = "";
    $websiteLogo = "";

    if($result = mysqli_query($conn, $detailQuery)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $websiteName = $row['school_name'];
                $websiteAddress = $row['school_address'];
                $websiteContact = $row['contact_number'];
                $websiteLogo = $row['school_logo'];
            }
        }
    }

    