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
</head>
<body>
 
    <?php
        include_once "layouts/header.php";
    ?>

    <br><br>

    <?php
         if ( isset( $_GET['type'] ) && !empty( $_GET['type'] ) ){
            $type = strval($_GET['type']);   
         }
         else{
             header("Location: index.php");
             exit();
         }


         

    ?>

    <div id="events">
        
        <div class="container">
            
            <?php
                if($type == "events"){
            ?>

            <h2>Events <?php 
            if(isset($_SESSION['admin_logged_in'])){
                echo "  <form method='GET' action='compose_content.php'>
                            <button name='news' type='submit'>Compose Events</button>
                        </form>";
            }
            ?> </h2>

            <?php
                $newsQuery = "SELECT * FROM news ORDER BY news_id DESC;";
                if($result = mysqli_query($conn, $newsQuery)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){

                            $newsTitle = $row['news_title'];
                            $newsContent = $row['news_content'];
                            $newsDate = $row['news_date'];
                            $newsTime = $row['news_time'];
                            $newsAuthor = $row['news_author'];
                            $id = $row['news_id'];

                            $cuttedContent = substr($newsContent, 0, 70)."...";

                            echo "
                            <div class='news'>
                                <h3><a href='school_news.php?id=$id&type=news'>$newsTitle</a></h3>
                                <span class='news-date'>$newsDate | $newsTime</span>
                                <p>$cuttedContent</p> 
                            ";    

                            if(isset($_SESSION['admin_logged_in'])){
                                echo "<form method='POST' action='serverside/delete_post.inc.php' class='crud'>
                                <input type='text' name='ID' value='$id' style='display:none'>
                                <input type='submit' class='delete-button' name='delete_news' value='Delete Post'>
                                </form>
                                <form method='GET' action='compose_content.php' class='crud'>
                                <input type='text' name='ID' value='$id' style='display:none'>
                                <input type='submit' class='delete-button' name='edit_news' value='Edit Post'>
                                </form>";   
                            }
                            
                            echo "
                            </div>";
                        }

                    }
                    else{
                        echo "
                        <div class='news'>
                            <h3>No Available Events</h3>
                        </div>
                        ";  
                    }
                }
            ?> 

        <?php
            }
            else if($type == "announcements"){

        ?>    
            <h2>Announcements 
            <?php 
                if(isset($_SESSION['admin_logged_in'])){
                    echo "  <form method='GET' action='compose_content.php'>
                                <button class='delete-button' name='announcements' type='submit'>Compose Announcements</button>
                            </form>";
                }
            ?> </h2>

            <?php
                $newsQuery = "SELECT * FROM announcements ORDER BY announcement_id DESC;";
                if($result = mysqli_query($conn, $newsQuery)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){

                            $announcementTitle = $row['announcement_title'];
                            $announcementContent = $row['announcement_content'];
                            $announcementDate = $row['announcement_date'];
                            $announcementTime = $row['announcement_time'];
                            $announcementAuthor = $row['announcement_author'];
                            $id = $row['announcement_id'];

                            $cuttedContent = substr($announcementContent, 0, 70)."...";

                            echo "
                            <div class='news'>
                            <h3><a href='school_news.php?id=$id&type=announcements'>$announcementTitle</a></h3>
                                <span class='news-date'>$announcementDate | $announcementTime</span>
                                <p>$cuttedContent</p> 
                            ";    

                            if(isset($_SESSION['admin_logged_in'])){
                                echo "<form method='POST' action='serverside/delete_post.inc.php' class='crud'>
                                <input type='text' name='ID' value='$id' style='display:none'>
                                <input class='delete-button' type='submit' name='delete_announcement' value='Delete Post'>
                                </form>
                                <form method='GET' action='compose_content.php' class='crud'>
                                <input type='text' name='ID' value='$id' style='display:none'>
                                <input class='delete-button' type='submit' name='edit_announcement' value='Edit Post'>
                                </form>
                                ";   
                            }
                            
                            echo "
                            </div>";
                        }
                    }
                    else{
                        echo "
                        <div class='news'>
                            <h3>No Available Announcements</h3>
                        </div>
                        ";  
                    }
                }
            ?> 

        </div>

        <?php
            }
            else{
                header("Location: index.php");
                exit();
            }
        ?>
        
    </div>


    <?php
        include_once "layouts/footer.php";
    ?>

</body>
</html>