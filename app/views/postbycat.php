Home
<hr />
<article class="postcontent">
    <?php
    foreach ($getcat as $key => $value) {
    ?>
        <div class="post">
            <div class="title">
                <h2><?= $value['title']; ?></h2>
                <p>Category : <?= $value['name']; ?></p>
            </div>

            <p>
                <?php
                $text = $value["content"];
                if (strlen($text) > 200) {
                    $text = substr($text, 0, 200);
                    echo $text . "...";
                }
                ?>
            </p>
            <div class="readmore"><a href="<?= BASE_URL; ?>/Index/postDetails/<?php echo $value['id']; ?>">Read
                    More...</a>
            </div>
        </div>
    <?php } ?>
</article>