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
        <?php
        if (isset($msg)) {
            echo "<span style='color:blue;font-weight:bold;'>" . $msg . "</span>";
        }
        ?>
        <hr />
        <div class="category">
            <form action="http://localhost/mvc/Category/updateCat" method="POST">
                <table>
                    <?php
                    if (isset($catById)) {
                        foreach ($catById as $value) {
                    ?>
                            <tr>
                                <td>Category Name</td>
                                <td><input type="text" name="catName" required="1" value="<?= $value['name']; ?>" /></td>
                            </tr>
                            <tr>
                                <td>Category Title</td>
                                <td><input type="text" name="title" required="1" value="<?= $value['title']; ?>" /></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" value="<?= $value["id"]; ?>" /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="submit" value="Update" /></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </form>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>