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
    <title><?php echo $websiteName; ?> - Compose </title>
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
                <?php
                    $title = "";
                    $author = "";
                    $content = "";
                    $image = "";

                    if(isset($_GET['news'])){
                        echo "<h2>Compose Event</h2>";
                    }
                    else if(isset($_GET['announcements'])){
                        echo "<h2>Compose Announcement</h2>";
                    }
                    else if(isset($_GET['edit_news'])){
                        echo "<h2>Edit Event</h2>";
                    }
                    else if(isset($_GET['edit_announcement'])){
                        echo "<h2>Edit Announcement</h2>";
                    }
                    else{
                        echo "<h2>Please return to <a href='index.php'>Home Page</a>";
                    }
                ?>
            </div>
        </div>

        <div class="composition_interface">
            <div class="container">
                <form method="POST" action="serverside/upload_event_announcement.inc.php" enctype="multipart/form-data">
                    
                    <?php
                        if(isset($_GET['edit_news'])){
                            include_once 'serverside/dbh.inc.php';
                            $id = mysqli_real_escape_string($conn,$_GET['ID']);

                            echo "<input type='text' name='id' value='$id' style='display:none'>";

                            $sql = "SELECT * FROM news WHERE news_id=$id;";

                            if($result = mysqli_query($conn, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        $title = $row['news_title'];
                                        $author = $row['news_author'];
                                        $content = $row['news_content'];
                                        $image = $row['image'];
                                    }
                                }
                            }
                            else{
                                header("Location: index.php?database=error");
                                exit();
                            }
                        }
                        else if(isset($_GET['edit_announcement'])){
                            include_once 'serverside/dbh.inc.php';
                            $id = mysqli_real_escape_string($conn,$_GET['ID']);
                            echo "<input type='text' name='id' value='$id' style='display:none'>";
                            $sql = "SELECT * FROM announcements WHERE announcement_id=$id;";

                            if($result = mysqli_query($conn, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        $title = $row['announcement_title'];
                                        $author = $row['announcement_author'];
                                        $content = $row['announcement_content'];
                                        $image = $row['image'];
                                    }
                                }
                            }
                            else{
                                header("Location: index.php?database=error");
                                exit();
                            }
                        }
                    ?>

                    <table>
                        <tr>
                            <td>
                                Image: 
                            </td>
                            <td>
                                <img src="images/<?php
                                    if($image != "" || $image != null){
                                        echo $image;
                                    }
                                    else{
                                        echo "placeholder-image.png";
                                    }
                                ?>" id="blah" alt="LOGO" class='upload_images'>
                                <input type="file" onchange="readURL(this)" name="file"> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="compose_description">Title: </span>
                            </td>
                            <td>
                                <input type="text" placeholder="Type title" name="title" value="<?php echo $title;?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="compose_description">Author: </span>
                            </td>
                            <td>
                                <input type="text" placeholder="Type author" name="author" value="<?php echo $author;?>" required>
                            </td>
                        </tr>
                    </table>
                    <textarea name="content" id="" cols="30" rows="10"><?php echo $content;?></textarea>
                    <?php
                        if(isset($_GET['news'])){
                            echo '<input type="submit" name="events_submit" value="POST EVENT">';
                        }
                        else if(isset($_GET['announcements'])){
                            echo '<input type="submit" name="announcement_submit" value="POST ANNOUNCEMENT">';
                        }
                        else if(isset($_GET['edit_news'])){
                            echo '<input type="submit" name="events_edit" value="EDIT EVENT">';
                        }
                        else if(isset($_GET['edit_announcement'])){
                            echo '<input type="submit" name="announcement_edit" value="EDIT ANNOUNCEMENT">';
                        }
                    ?>
                    
                </form>    
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