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
        if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){

            include_once "serverside/dbh.inc.php";

            $id = strval($_GET['id']);
            $type = strval($_GET['type']);   

            if($type == "announcements"){
                $sql = "SELECT * FROM $type WHERE announcement_id=$id;";
                
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $title = $row['announcement_title'];
                            $content = $row['announcement_content'];
                            $image = $row['image'];
                            $author = $row['announcement_author'];
                            
                            echo "<div class='headline'>
                                    <div class='container'>
                                        <h2>$title <span class='author'>by: $author</span></h2>
                                    </div>
                                </div>;";



                            if($image != "" || $image != NULL){
                                    echo "  <div class='news_image'>
                                                <div class='container'>
                                                    <img src='./images/$image'>
                                                </div>
                                            </div>
                                    ";
                            }
                            
                            

                            echo "
                                <div class='news_content'>
                                    <div class='container'>
                                        <p>$content</p>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    else{
                        header("Location: index.php?error=notexist");
                        exit();
                    }
                }else{
                    header("Location: index.php?error=notexist");
                    exit();
                }
            
            }
            else if($type == "news"){
                $sql = "SELECT * FROM $type WHERE news_id=$id;";

                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $title = $row['news_title'];
                            $content = $row['news_content'];
                            $image = $row['image'];
                            $author = $row['news_author'];
                            echo "<div class='headline'>
                                    <div class='container'>
                                        <h2>$title <span class='author'>by: $author</span></h2>
                                    </div>
                                </div>";
                                
                            if($image != "" || $image != NULL){
                                    echo "  <div class='news_image'>
                                                <div class='container'>
                                                    <img src='./images/$image'>
                                                </div>
                                            </div>
                                    ";
                            }


                                echo "
                                <div class='news_content'>
                                    <div class='container'>
                                        <p>$content</p>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    else{
                        header("Location: index.php?error=notexist");
                        exit();
                    }
                }else{
                    header("Location: index.php?error=notexist");
                    exit();
                }
            }

            

            
        }
        else{

        }
    ?>

    <?php
        include_once "layouts/footer.php";
    ?>
</body>
</html>