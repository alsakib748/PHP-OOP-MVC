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
        <h2>Add Category</h2>

        <hr />
        <div class="category">
            <form action="<?= BASE_URL; ?>/Admin/insertCategory" method="POST">
                <table>
                    <tr>
                        <td>Category Name</td>
                        <td><input type="text" name="catName" required="1" /></td>
                    </tr>
                    <tr>
                        <td>Category Title</td>
                        <td><input type="text" name="title" required="1" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Save" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>