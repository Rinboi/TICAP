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
    <title><?php echo $websiteName; ?> - Home</title>
    <link rel="icon" href="images/<?php echo $websiteLogo; ?>">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/footer.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <style>
        #adjust-btn{
    position: fixed;
    bottom: 10px;
    right: 10px;
    font-size: 2em;
    text-decoration: none;
    color: #fff;
    z-index: 2;
}
    </style>
</head>
<body>
 
    <?php
        include_once "layouts/header.php";
    ?>

        <div id="admin_login">
            <div class="container">
                <form>
                    <div class="form_inner">
                  
                        <h2>Student Login</h2>
                        <table>
                            <tr>
                                <td>E-mail: </td><td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Password: </td><td><input type="password"></td>
                            </tr>
                        </table>
                        <button id="myBtn"><a href ="studentaccount.php">Submit</a></button>
                    </div>
                </form>
            </div>
        </div>
    <?php
        include_once "layouts/footer.php";
    ?>

</body>
</html>

