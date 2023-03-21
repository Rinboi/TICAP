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
    <title><?php echo $websiteName; ?> - Faculty</title>
    <link rel="icon" href="images/<?php echo $websiteLogo; ?>">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/footer.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
</head>
<body>
 
    <?php
        include_once "layouts/header.php";
    ?>

    <!-- HTML CODE IF ADMIN IS LOGGED IN -->
    <div class="admin_dashboard_header">
        <div class="container">
            <h2>Faculty &amp; Staff</h2>
        </div>
    </div>
    <div class="image-slider" id="image-slider">
                <img src="images/sample tree.png" class='center'>
            </div>

    <?php
        include_once "layouts/footer.php";
    ?>

</body>
</html>

