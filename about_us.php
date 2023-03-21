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
    <title><?php echo $websiteName; ?> - About Us</title>
    <link rel="icon" href="images/<?php echo $websiteLogo; ?>">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/about.css">
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
            <h2>HISTORY</h2>
        </div>
    </div>

    <div class="history">
        <div class="container">
            <div class="box">
                <img src="images/school_image.jpg" alt="image">
            </div>
            <div class="box text_box">
            Taguig Integrated School is the oldest public
            school in the City of Taguig. Its former name was Taguig Central School. It started with five teachers and less than fifteen pupils under the leadership of a Filipino in the name of Mr. Jose Pagtakhan.

            it started with one kamalig- type classroom between the year 1901-1906. In between this early years of existence, Ignacio Beltran, a kind-hearted citizen of Taguig donated a 14, 324 sq. m. grass field to the school with his passionate desire to improve basic education in Taguig. In 1917-1928, a Gabaldon-Type building was constructed. This building served as the symbol of democratic education until today. It has withstood all kinds of natural calamities and has become a heritage of educational endeavor to the people of Taguig.

            From then on, the school expanded as the town’s population started to grow. In the pre-war of 1931-1940, a shop and the expanded building were constructed in the right front side of the school.
            </div>
        </div>
    </div>
    

    <!-- HTML CODE IF ADMIN IS LOGGED IN -->
    <div class="admin_dashboard_header">
        <div class="container">
            <h2>MISSION</h2>
        </div>
    </div>

    <div class="history">
        <div class="container">
            <div class="box text_box">
                To deliver fundamental services geared toward harnessing pupils’ innate talents, life-long skills, knowledge and desirable values upheld in a supportive environment .
            </div>
            <div class="box">
                <img src="images/logo.png" alt="image">
            </div>
        </div>
    </div>

    <div class="admin_dashboard_header">
        <div class="container">
            <h2>VISION</h2>
        </div>
    </div>

    <div class="history">
        <div class="container">
            <div class="box">
                <img src="images/ict_symbol.png" alt="image">
            </div>
            <div class="box text_box">
                A performing Educational Center equipped with modern facilities for a far better and more effective teaching-learning process thus producing quality and ICT literate graduates.
            </div>
        </div>
    </div>

    <?php
        include_once "layouts/footer.php";
    ?>

</body>
</html>

