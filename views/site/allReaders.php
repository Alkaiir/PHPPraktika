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
        gap: 30px;
    }

    .infoItem {
        padding: 10px;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .infoItemLink {
        border: 1px solid black;
        font-size: 14px;
        padding: 2px;
    }


</style>

<h2 class="pageTitle">Список всех читателей</h2>

<div class="infoBlock">
    <?php


    foreach ($readers as $reader) {
        ?>
        <div class="infoItem">
            <ul>
                <li><?= $reader->reader_ticket_id?></li>
                <li><?= $reader->name?></li>
                <li><?= $reader->surname?></li>
                <li><?= $reader->patronymic?></li>
            </ul>

            <a href="#" class="infoItemLink"> Подробнее </a>
        </div>
        <?php
    }
    ?>
</div>