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
        <h2>Add New Post</h2>
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
            <form action="<?= BASE_URL; ?>/Admin/addNewPost" method="POST">
                <table>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" /></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><textarea name="content" id=""></textarea></td>
                        <script>
                        CKEDITOR.replace("content");
                        </script>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="cat" class="cat">
                                <option value="">Select</option>
                                <?php
                                foreach ($catlist as $key => $cat) {
                                ?>
                                <option value="<?= $cat['id'] ?>">
                                    <?= $cat['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Add Post" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>