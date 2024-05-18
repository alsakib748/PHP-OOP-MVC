<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="content">
        <h2>Category List</h2>
        <hr />
        <p>
            <?php
            foreach ($cat as $key => $value) {
                echo $value['name'] . '<br/>';
            }
            ?>
        </p>
    </div>
    <script src="" async defer></script>
</body>

</html>