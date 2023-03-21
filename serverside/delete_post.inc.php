<?php

    include_once 'dbh.inc.php';

    if(isset($_POST['delete_news'])){
        $deleteID = mysqli_real_escape_string($conn, $_POST['ID']);
        $deleteQuery = "DELETE FROM news WHERE news_id=$deleteID";
        if(mysqli_query($conn, $deleteQuery)){
            header("Location: ../index.php?news=deleted");
            exit();
        }
    }
    else if(isset($_POST['delete_announcement'])){
        $deleteID = mysqli_real_escape_string($conn, $_POST['ID']);
        $deleteQuery = "DELETE FROM announcements WHERE announcement_id=$deleteID";
        if(mysqli_query($conn, $deleteQuery)){
            header("Location: ../index.php?news=deleted");
            exit();
        }
    }