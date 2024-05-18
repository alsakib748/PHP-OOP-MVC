<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Category</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="content">
        <h2>Update Category</h2>

        <hr />
        <div class="category">
            <?php
            foreach ($catById as $key => $value) {
            ?>
                <form action="<?= BASE_URL; ?>/Admin/updateCat/<?= $value["id"]; ?>" method="POST">
                    <table>
                        <tr>
                            <td>Category Name</td>
                            <td><input type="text" name="catName" required="1" value="<?= $value['name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Category Title</td>
                            <td><input type="text" name="title" required="1" value="<?= $value['title']; ?>" /></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Update" /></td>
                        </tr>
                    </table>
                </form>
            <?php } ?>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>