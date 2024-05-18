<h2>Article List</h2>
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
        <th width="5%">NO</th>
        <th>Title</th>
        <th>Content</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    <?php
    $i = 0;
    foreach ($listPost as $key => $value) {
        $i++;
    ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $value['title']; ?></td>
            <td><?= $value['content']; ?></td>
            <td>
                <?php
                foreach ($catlist as $key => $cat) {
                    if ($cat['id'] == $value['cat']) {
                        echo $cat['name'];
                    }
                }
                ?>
            </td>
            <td>
                <a href="<?= BASE_URL; ?>/Admin/editArticle/<?= $value["id"]; ?>">Edit</a> ||
                <a onclick="return confirm('Are sure to delete?')" href="<?= BASE_URL; ?>/Admin/deleteArticle/<?= $value["id"]; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>