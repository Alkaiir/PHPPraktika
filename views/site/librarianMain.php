<style>

    .pageTitle {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .infoBlock {
        margin: 0 auto;
        width: 50%;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .infoItem {
        padding: 10px;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

</style>

<h2 class="pageTitle">Список пользователей</h2>

<div class="infoBlock">
    <?php


    foreach ($bookinstances as $bookinstance) {
        ?>
        <div class="infoItem">
            <ul>
                <li><?= $bookinstance->bookinstance_id?></li>
                <li><?= $bookinstance->book_name?></li>
                <li><?= $bookinstance->pick_date?></li>
                <li><?= $bookinstance->return_date?></li>
                    <li><?= $readers?></li>
            </ul>
        </div>
        <?php
    }
    ?>
</div>