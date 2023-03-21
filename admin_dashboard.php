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
    <title><?php echo $websiteName; ?> - Admin Dashboard</title>
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

        <!-- HTML CODE IF ADMIN IS LOGGED IN -->
        <div class="admin_dashboard_header">
            <div class="container">
                <h2>Admin Dashboard</h2>
            </div>
        </div>
        
        <div class="admin_dashboard_content">
            <div class="container">
                <h3>Admin Settings</h3>
            </div>
            <div class="container">
                <form action="serverside/change_admin.inc.php" method="POST">

                    <?php
                        if ( isset( $_GET['admin'] ) && !empty( $_GET['admin'] ) ){
                            switch($_GET['admin']){
                                case "password_too_short":
                                    echo "  <div class='warning_message_small'>
                                                <img src='images/warning_symbol.png' alt='Warning Symbol'>
                                                <h4>Warning: Password is too short.</h4>
                                            </div>
                                        ";
                                break;
                                case "passwords_doesnt_match":
                                    echo "  <div class='warning_message_small'>
                                                <img src='images/warning_symbol.png' alt='Warning Symbol'>
                                                <h4>Warning: Password does not match.</h4>
                                            </div>
                                        ";
                                break;
                                case "invalid_characters":
                                echo "  <div class='warning_message_small'>
                                            <img src='images/warning_symbol.png' alt='Warning Symbol'>
                                            <h4>Warning: Ivalid characters were used.</h4>
                                        </div>
                                        ";
                                break;
                                case "incorrect_info":
                                echo "  <div class='warning_message_small'>
                                            <img src='images/warning_symbol.png' alt='Warning Symbol'>
                                            <h4>Warning: Incorrect Admin Credentials.</h4>
                                        </div>
                                    ";
                                break;
                                case "empty":
                                echo "  <div class='warning_message_small'>
                                            <img src='images/warning_symbol.png' alt='Warning Symbol'>
                                            <h4>Warning: Fill out all the fields.</h4>
                                        </div>
                                    ";
                                break;
                                default:
                                break;
                            }
                        }
                    ?>
                            
                    <table>
                        <tr>
                            <th colspan="2">Change Admin Credentials</th>
                        </tr>
                        <tr>
                            <td>Current Username: </td>
                            <td><input type="text" name="username_old"></td>
                        </tr>   
                        <tr>
                            <td>Current Password: </td>
                            <td><input type="password" name="password_old"></td>
                        </tr>
                        <tr>
                            <td>New Username: </td>
                            <td><input type="text" name="username_new"></td>
                        </tr>
                        <tr>
                            <td>New Password: </td>
                            <td><input type="password" name="password_new"></td>
                        </tr>
                        <tr>
                            <td>Confirm New Password: </td>
                            <td><input type="password" name="password_new_confirm"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Save Changes"></td>
                            <td><input type="submit" name="restore_to_default" value="Reset to Default"></td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="container">
                <h3>Website Settings</h3>
            </div>

            <div class="container">
                <form action="serverside/update_website_info.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th colspan="2">School Information</th>
                        </tr>
                        <tr>
                            <td>School Logo: </td>
                            <td class="logo_input"><input type="file"  onchange="readURL(this)" name="file"><img src="images/<?php echo $websiteLogo; ?>" id="blah" width=50 height=50></td>
                        </tr>
                        <tr>
                            <td>School Name: </td>
                            <td><input type="text" name="school_name" value="<?php echo $websiteName; ?>"></td>
                        </tr>   
                        <tr>
                            <td>School Address: </td>
                            <td><input type="text" name="school_address" value="<?php echo $websiteAddress; ?>"></td>
                        </tr>
                        <tr>
                            <td>School Contact Number: </td>
                            <td><input type="text" name="school_contact" value="<?php echo $websiteContact; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submit" value="Save Changes"></td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="container">
                <h3>Registered Applicants</h3>
            </div>

            <div class="container" id="application_button">
                <a href="application_data.php">View Registered Applicants</a>
            </div>

        </div>
        

    <?php
        }
        else{
    ?>

        <!-- HTML CODE IF ADMIN IS NOT LOGGED IN -->
        <div class="warning_message">
            <div class="container">
                <div class="warning_content">
                    <img src="images/warning_symbol.png" alt="Warning">
                    <h2>Access Denied: You must be an admin to access this part of the website.</h2>
                </div>
            </div>
        </div>

    <?php
        }
    ?>

    <?php
        include_once "layouts/footer.php";
    ?>

    <script>
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    document.getElementById("blah").setAttribute("src", e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>