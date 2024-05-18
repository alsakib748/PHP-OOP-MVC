Post Details
<hr />
<article class="postcontent">
    <?php
    foreach ($postbyid as $key => $value) {
    ?>
    <div class="details">
        <div class="title">
            <h2><?= $value['title']; ?></h2>
            <p>Category : <a
                    href="<?php echo BASE_URL; ?>/Index/postByCat/<?= $value['cat']; ?>"><?= $value['name']; ?></a>
            </p>
        </div>
        <div class="desc">
            <p><?= $value['content']; ?></p>
        </div>
    </div>

    <?php } ?>

</article>