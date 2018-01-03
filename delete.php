<?php

$news_id = $_GET['news_id'];
//echo $news_id;
delete_news($news_id);

function delete_news($news_id) {
    $db_connect = mysqli_connect('localhost', 'root', '');
    if ($db_connect) {
        mysqli_select_db($db_connect, 'db_practice');
    } else {
        die('Database Problem!' . mysql_error());
    }

    $sql = "DELETE FROM tbl_news WHERE news_id='$news_id' ";

    if (mysqli_query($db_connect, $sql)) {
        header('Location:view_news.php');
    } else {
        die('Sql Problem' . mysql_error());
    }
}

function delete_news1($news_id) {
    $db_connect = mysqli_connect('localhost', 'root', '');
    if ($db_connect) {
        mysqli_select_db($db_connect, 'db_practice');
    } else {
        die('Database Problem!' . mysql_error());
    }

    $sql = "DELETE FROM tbl_news WHERE news_id='$news_id' ";

    if (mysqli_query($db_connect, $sql)) {
        header('Location:view_news.php');
    } else {
        die('Sql Problem' . mysql_error());
    }
}