<?php
$news_id = $_GET['news_id'];
//echo $news_id;
$query_result = edit_news($news_id);
$news_data = mysqli_fetch_assoc($query_result);
edit_news($news_id);
if (isset($_POST['submit'])) {
    update_news($_POST);
}

function edit_news($news_id) {
    $db_connect = mysqli_connect('localhost', 'root', '');
    if ($db_connect) {
        mysqli_select_db($db_connect, 'db_practice');
    } else {
        die('Database Problem!' . mysql_error());
    }

    $sql = "SELECT * FROM tbl_news WHERE news_id='$news_id' ";

    if (mysqli_query($db_connect, $sql)) {
//        header('Location:view_news.php');
        return mysqli_query($db_connect, $sql);
    } else {
        die('Sql Problem' . mysql_error());
    }
}

function update_news($news_data) {
    echo '<pre>';
    print_r($news_data);
    $db_connect = mysqli_connect('localhost', 'root', '');
    if ($db_connect) {
        mysqli_select_db($db_connect, 'db_practice');
    } else {
        die('Database Problem!' . mysql_error());
    }

    $news_id = $news_data['news_id'];
    $news_title = $news_data['news_title'];
    $author_name = $news_data['author_name'];
    $news_description = $news_data['news_description'];
    $publication_status = $news_data['publication_status'];

    $sql = "UPDATE tbl_news SET news_title='$news_title',author_name='$author_name',news_description='$news_description',publication_status='$publication_status' WHERE news_id='$news_id' ";

    if (mysqli_query($db_connect, $sql)) {
        header('Location:view_news.php');
    } else {
        die('Query Prombem' . mysqli_error($db_connect));
    }
}
?>

<form action="" method="post">
    <table>
        <tr>
            <td>News Title</td>
            <td><input type="text" name="news_title" required="" value="<?php echo $news_data['news_title'] ?>"></td>
            <td><input type="hidden" name="news_id" value="<?php echo $news_data['news_id'] ?>"></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" name="author_name" required="" value="<?php echo $news_data['author_name']; ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="news_description" rows="8" cols="40" ><?php echo $news_data['news_description']; ?></textarea></td>
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
                <input type="submit" name="submit" value="Update">
            </td>
        </tr>

    </table>
</form>