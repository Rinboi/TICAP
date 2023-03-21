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
    <title><?php echo $websiteName; ?> - Admin Login</title>
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

    <?php
        if(isset($_SESSION['admin_logged_in'])){
    ?>
        <div id="admin_login">
            <div class="container">
                <form action="serverside/logout.inc.php" method="POST">
                    <div class="form_inner">
                        <h2>Exit Admin Mode</h2>
                        <input type="submit" name="submit" value="Log Out">
                    </div>
                </form>
            </div>
        </div>
    <?php
        }
        else{
    ?>

        <div id="admin_login">
            <div class="container">
                <form action="serverside/verify.php" method="POST">
                    <div class="form_inner">

                    <?php
                        if ( isset( $_GET['login'] ) && !empty( $_GET['login'] ) ){
                            if($_GET['login'] == "empty"){
                                echo "
                                    <div class='admin_login_error'>
                                        <p>Warning: User Name or Password is empty</p>
                                    </div>
                                ";
                            }
                            else if($_GET['login'] == "error"){
                                echo "
                                    <div class='admin_login_error'>
                                        <p>Warning: User Name or Password is incorrect</p>
                                    </div>
                                ";
                            }
                        }
                    ?>
                  
                        <h2>Admin Login</h2>
                        <table>
                            <tr>
                                <td>User Name: </td><td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>Password: </td><td><input type="password" name="password"></td>
                            </tr>
                        </table>
                        <input type="submit" name="submit" value="Log In">
                    </div>
                </form>
            </div>
        </div>

    <?php
        }
    ?>

    <?php
        include_once "layouts/footer.php";
    ?>
</body>
</html>