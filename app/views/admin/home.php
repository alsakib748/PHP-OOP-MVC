<div class="home-content">
    <h2> Welcome in Admin Panel </h2>
    <hr />
    Welcome...
    <?php

    echo Session::get("username");

    ?>
    <aside class="adminleft">
        <div class="widget">
            <h3>Site Option</h3>
            <ul>
                <li><a href="<?= BASE_URL; ?>/Admin">Home</a></li>
                <li><a href="<?= BASE_URL; ?>/Login/logout">Logout</a></li>
            </ul>
        </div>

        <div class="widget">
            <h3>Category Option</h3>
            <ul>
                <li><a href="<?= BASE_URL; ?>/Admin/addcategory">Add Category</a></li>
                <li><a href="<?= BASE_URL; ?>/Admin/categoryList">Category List</a></li>
            </ul>
        </div>

        <div class="widget">
            <h3>Post Option</h3>
            <ul>
                <li><a href="<?= BASE_URL; ?>/Admin/addArticle">Add Article</a></li>
                <li><a href="<?= BASE_URL; ?>/Admin/articleList">Article List</a></li>
            </ul>
        </div>
    </aside>

    <article class="adminright">
        <h2>Welcome in Admin Panel...</h2>
    </article>

</div>