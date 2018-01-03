<?php

function view_news() {
    $db_connect = mysqli_connect('localhost', 'root', '');
    if ($db_connect) {
        mysqli_select_db($db_connect, 'db_practice');
    }
    $sql = "SELECT * FROM tbl_news";

    if (mysqli_query($db_connect, $sql)) {
        $result = mysqli_query($db_connect, $sql);
        return $result;
//    while ($news_data = mysqli_fetch_assoc($result)) {
//        echo '<pre>';
//        print_r($news_data);
//    }
    }
}

$result = view_news();
?>

<hr/>
<a href="add_news.php">Add News</a> ||
<a href="view_news.php">View News</a>
<hr/>

<script type="text/javascript">
    function deleteStudent()
    {
        var msg = confirm('Are you sure to delete this?');
        if (msg)
        {
            return true;
        } else {

            return false;
        }
    }

</script>

<form action="" method="get">
    <table border="1" cellpadding="5" width="80%" align="center">
        <tr>
            <th>Id</th>
            <th>News Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        <?php while ($news_data = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $news_data['news_id']; ?></td>
                <td><?php echo $news_data['news_title']; ?></td>
                <td><?php echo $news_data['author_name']; ?></td>
                <td><?php echo $news_data['news_description']; ?></td>
                <td><?php
                    if ($news_data['publication_status'] == 1) {
                        echo 'Published';
                    } else {
                        echo 'Unpublished';
                    };
                    ?></td>
                <td>
                    <a href="edit.php?news_id=<?php echo $news_data['news_id'];?>">Edit</a>
                    <a href="delete.php?news_id=<?php echo $news_data['news_id']; ?>" onclick="return deleteStudent()">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</form>
