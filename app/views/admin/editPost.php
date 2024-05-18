<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Post</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="content">
        <h2>Update Post</h2>
        <?php
        if (isset($postErrors)) {
            echo "<div style='color:red;border: 1px solid red; padding: 5px 10px; margin: 5px;'>";
            foreach ($postErrors as $key => $value) {
                switch ($key) {
                    case 'title':
                        foreach ($value as $val) {
                            echo "Title: " . $val . "<br/>";
                        }
                        break;

                    case 'content':
                        foreach ($value as $val) {
                            echo "Content: " . $val . "<br/>";
                        }
                        break;

                    case 'cat':
                        foreach ($value as $val) {
                            echo "Category: " . $val . "<br/>";
                        }
                        break;
                }
            }
            echo "</div>";
        }
        ?>
        <hr />
        <div class="category">
            <?php
            foreach ($postbyid as $key => $value) {
            ?>
            <form action="<?= BASE_URL; ?>/Admin/updatePost/<?= $value['id']; ?>" method="POST">
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" value="<?= $value['title']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><textarea name="content" id=""><?= $value['content']; ?></textarea></td>
                        <script>
                        CKEDITOR.replace("content");
                        </script>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="cat" class="cat">
                                <option value="">Select One</option>
                                <?php
                                    foreach ($catlist as $key => $cat) {
                                    ?>
                                <option <?php
                                                if ($value['cat'] == $cat['id']) {
                                                    echo "selected";
                                                }
                                                ?> value="<?= $cat['id'] ?>">
                                    <?= $cat['name'] ?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Update Post" /></td>
                    </tr>
                </table>
                table
            </form>
            <?php
            }
            ?>

        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>