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
<div class="admin_dashboard_header">
        <div class="container">
            <h2>Change Student Status</h2>
        </div>
    </div>

        <div class="status_controls">
                    <div class="container">
                        <div class="row">
                            <table>
                                <tbody><tr>
                                    <td>Student ID:</td>
                                    <td>80535aa78d09f7c27de9c312c849bde6</td>
                                </tr>
                                <tr>
                                    <td>Student Name:</td>
                                    <td>Mizpha Ariola</td>
                                </tr>
                                <tr>
                                    <td>Current Status:</td>
                                    <td>Registered</td>
                                </tr>
                                <tr>
                                    <td>Grade Level: </td>
                                    <td>Grade 12</td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
                <?php
        include_once 'layouts/footer.php';
    ?>
    
</body>

</html>