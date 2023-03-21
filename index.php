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
    <!-- ADJUST BTN -->
    <a href="#" id="adjust-btn"><i class="fa fa-adjust"></i></a>
    <main>
        <div class="container">
        
            <div class="image-slider" id="image-slider">
                <img src="images/image_3.jpg" class='image-slides' alt="Second Image">
            </div>

            <div class="social-media">
                <h3>Like us on facebook</h3>
                <div class="fb-page" data-href="https://www.facebook.com/taguigIS/" data-height="127" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/taguigIS/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/taguigIS/">Taguig Integrated School</a></blockquote></div>
                <h3>Our Location</h3>
                <div class="mapouter"><div class="gmap_canvas"><iframe width="300" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Taguig%20Integrated%20School&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net"></a></div><style>.mapouter{text-align:right;height:300px;width:300px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:300px;}</style>
                </div>
            </div>
        </div>
    </main>

    <div id="events">
        <div class="container">
            <h2>Events <?php 
            if(isset($_SESSION['admin_logged_in'])){
                echo "  <form method='GET' action='compose_content.php'>
                            <button name='news' type='submit'>Compose Events</button>
                        </form>";
            }
            ?> </h2>

            <?php
                $newsQuery = "SELECT * FROM news ORDER BY news_id DESC LIMIT 3;";
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

                        echo "  <div class='view_all'>
                                    <h3><a href='news.php?type=events'>View All Events</a></h3>
                                </div>";
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
            <h2>Announcements 
            <?php 
                if(isset($_SESSION['admin_logged_in'])){
                    echo "  <form method='GET' action='compose_content.php'>
                                <button class='delete-button' name='announcements' type='submit'>Compose Announcements</button>
                            </form>";
                }
            ?> </h2>

            <?php
                $newsQuery = "SELECT * FROM announcements ORDER BY announcement_id DESC LIMIT 3;";
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

                        echo "  <div class='view_all'>
                                    <h3><a href='news.php?type=announcements'>View All Announcements</a></h3>
                                </div>";
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
        
    </div>

    <?php
        include_once "layouts/footer.php";
    ?>

<script>
    var trigger = false;

document.getElementById('adjust-btn').addEventListener('click',function(e){
    e.preventDefault();
    if(trigger){
        // DARK
        this.style.color = "#fff";
        document.querySelector('body').style.backgroundColor = "#444";
        trigger = false;
    }
    else{
        // LIGHT
        this.style.color = "#111";
        document.querySelector('body').style.backgroundColor = "#f1f1f1";
        trigger = true;
    } 
});
</script>


</body>
</html>

