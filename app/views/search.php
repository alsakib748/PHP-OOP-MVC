<div class="searchoption">
    <div class="menu">
        <a href="<?= BASE_URL; ?>">Home</a>
    </div>
    <div class="search">
        <form action="<?= BASE_URL . "/Index/search"; ?>" method="POST">
            <input type="text" name="keyword" placeholder="Search here..." />

            <select class="catsearch" name="cat">
                <option value="">Select One</option>
                <?php
                foreach ($catlist as $key => $cat) {
                ?>
                <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
                <?php
                }
                ?>
            </select>
            <button class="submitbtn" type="submit">Search</button>
        </form>
    </div>
</div>