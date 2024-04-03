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

<h2 class="pageTitle">Список популярных книг</h2>

<div class="infoBlock">
    <?php

    foreach ($populars as $book) {
        ?>
        <div class="infoItem">
            <ul>
                <li><?= $book->book_name?></li>
                <li><?= $book->annotation?></li>
                <li><?= $book->author?></li>
                <li>Взято копий: <?= $book->instances_count?></li>
            </ul>
        </div>
        <?php
    }
    ?>
</div>