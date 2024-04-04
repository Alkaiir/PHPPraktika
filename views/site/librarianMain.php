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

    button {
        cursor: pointer;
        border: 1px solid black;
        font-size: 14px;
        padding: 2px;
        background: white;
    }

</style>

<h2 class="pageTitle">Список взятых книг</h2>

<div class="infoBlock">
    <?php

    foreach ($bookinstances as $bookinstance) {
        if ($bookinstance->in_stock === 0) :
        ?>
        <div class="infoItem">
            <ul>
                <li><?= $bookinstance->bookinstance_id?></li>
                <li><?= $bookinstance->book_name?></li>
                <li><?= $bookinstance->pick_date?></li>
                <li><?= $bookinstance->return_date?></li>
                <?php
                foreach ($readers as $reader) {
                    if ($reader->reader_ticket_id === $bookinstance->reader_ticket_id) {
                        ?>
                        <li><?= $reader->surname?> <?= $reader->name?> <?= $reader->patronymic?></li>
                        <?php

                    }
                }
                ?>
                <form method="post">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <input type="hidden" name="bookinstance_id" value="<?= $bookinstance->bookinstance_id?>">
                    <button>Принять книгу</button>
                </form>
            </ul>
        </div>
        <?php
        endif;
    }
    ?>
</div>