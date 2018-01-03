<?php
//echo '<pre>';
//print_r($_POST);

function save_news() {
    $db_connect = mysqli_connect('localhost', 'root', '');
//    echo '<pre>';
//    print_r($db_connect);
    if ($db_connect) {
        mysqli_select_db($db_connect, 'db_practice');
//        mysql_query('SET CHARACTER SET utf8');
//        mysql_query("SET SESSION collation_connection ='utf8_general_ci'");
    }
    $sql = "INSERT INTO tbl_news (news_title, author_name, news_description, publication_status) VALUES ('$_POST[news_title]', '$_POST[author_name]', '$_POST[news_description]', '$_POST[publication_status]')";
    if (mysqli_query($db_connect, $sql)) {
        $message = "News Info Saved Successfully!";
        return $message;
    } else {
        die('Query Promblem' . mysqli_error($db_connect));
    }
}

if (isset($_POST['submit'])) {
    $message = save_news();
}
?>

<hr/>
      <a href="add_news.php">Add News</a> ||
      <a href="view_news.php">View News</a>
<hr/>

<h1><?php
    if (isset($message)) {
        echo $message;
    }
    ?></h1>
<form action="" method="post">
    <table>
        <tr>
            <td>News Title</td>
            <td><input type="text" name="news_title" required=""></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" name="author_name" required=""></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="news_description" rows="8" cols="40"></textarea></td>
        </tr>
        <tr>
            <td>Publication Status</td>
            <td>
                <select name="publication_status">
                    <option>---Select Publication Option---</option>
                    <option value="1">Published</option>
                    <option value="0">unpublished</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Save News">
            </td>
        </tr>

    </table>
</form>
