<?php

    include_once 'dbh.inc.php';

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $fileName = NULL;
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','gif');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if ($fileSize < 90000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../images/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $fileName = $fileNameNew;
            }
            else{
                header("Location: ../compose_content.php?news=&image=filesize");
                exit();
            }
        }
        else{
            header("Location: ../compose_content.php?news=&image=fileerror");
            exit();
        }
    }
    


    date_default_timezone_set("Asia/Manila");

    $currentDate = date("F d, Y");
    $currentTime = date("h:i A");

    if(isset($_POST['events_submit'])){
        if(empty($title) || empty($author) || empty($content)){
            header("../compose_content.php?news=empty");
        }
        else{
            $insertNews = "INSERT INTO news (news_title, news_content, news_date, news_time, news_author, image) VALUES('$title','$content','$currentDate', '$currentTime','$author','$fileName');";
            if(mysqli_query($conn, $insertNews)){
                header("Location: ../index.php?news=success&file=$fileName");
                exit();
            }
            else{
                header("Location: ../index.php?news=error");
                exit();
            }
        }
    }
    else if(isset($_POST['announcement_submit'])){
        if(empty($title) || empty($author) || empty($content)){
            header("../compose_content.php?news=empty");
        }
        else{
            $insertAnnouncement = "INSERT INTO announcements (announcement_title, announcement_content, announcement_date, announcement_time, announcement_author, image) VALUES('$title','$content','$currentDate', '$currentTime','$author', '$fileName');";
            if(mysqli_query($conn, $insertAnnouncement)){
                header("Location: ../index.php?news=success");
                exit();
            }
            else{
                header("Location: ../index.php?news=error");
                exit();
            }
        }
    }

    // EDIT 

    else if(isset($_POST['events_edit'])){  
        $id = $_POST['id'];
        if(empty($title) || empty($author) || empty($content)){
            header("../edit_content.php?ID=$id&edit_news=Edit+Post&news=empty");
            exit();
        }
        else{
            $updateEvents = "UPDATE news SET news_title='$title', news_content='$content', news_date='$currentDate', news_time='$currentTime', news_author='$author', image='$fileName' WHERE news_id=$id;";
            if(mysqli_query($conn, $updateEvents)){
                header("Location: ../index.php?news=success");
                exit();
            }
            else{
                header("Location: ../index.php?news=error");
                exit();
            }
        }
    }

    else if(isset($_POST['announcement_edit'])){
        $id = $_POST['id'];
        if(empty($title) || empty($author) || empty($content)){
            header("../edit_content.php?ID=$id&edit_announcement=Edit+POST&news=empty");
            exit();
        }
        else{
            $updateEvents = "UPDATE announcements SET announcement_title='$title', announcement_content='$content', announcement_date='$currentDate', announcement_time='$currentTime', announcement_author='$author', image='$fileName' WHERE announcement_id=$id;";
            if(mysqli_query($conn, $updateEvents)){
                header("Location: ../index.php?news=success");
                exit();
            }
            else{
                header("Location: ../index.php?news=error");
                exit();
            }
        }
    }