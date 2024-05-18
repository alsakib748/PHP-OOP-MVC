<h2>Category List</h2>
<?php

if (!empty($_GET["msg"])) {
    $msg = unserialize(urldecode($_GET["msg"]));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold;'>" . $value . "</span>";
    }
}

?>
<table>
    <tr>
        <th>Serial</th>
        <th>Category Name</th>
        <th>Category Title</th>
        <th>Action</th>
    </tr>
    <?php
    $i = 0;
    foreach ($cat as $key => $value) {
        echo $value['name'] . '<br/>';
        $i++;
    ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $value["name"]; ?></td>
        <td><?= $value["title"]; ?></td>
        <td>
            <a href="<?= BASE_URL; ?>/Admin/editCategory/<?= $value["id"]; ?>">Edit</a> |
            <a onclick="return confirm('Are sure to delete?')"
                href="<?= BASE_URL; ?>/Admin/deleteCategory/<?= $value["id"]; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>