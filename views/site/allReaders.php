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

    .hidden {
        display: none;
    }

    .readerPhoto {
        width: 200px;

    }

</style>

<h2 class="pageTitle">Список всех читателей</h2>

<div class="infoBlock">
    <?php
    foreach ($readers as $reader) {
        ?>
        <div class="infoItem">
            <ul>
                <?php
                if(!empty($reader->image)) :
                    echo '<li><img class="readerPhoto" src="public/img/' . $reader->image . '"></li>';
                endif;
                ?>
                <li><?= $reader->reader_ticket_id?></li>
                <li><?= $reader->surname?></li>
                <li><?= $reader->name?></li>
                <?php
                if(!empty($reader->patronymic)) :
                    echo '<li> '.$reader->patronymic . '</li>';
                endif;
                ?>
            </ul>

            <a href="#" class="infoItemLink" id="btn-reader-<?=$reader->reader_ticket_id?>" onclick="expandDesc('reader-<?=$reader->reader_ticket_id?>', 'btn-reader-<?=$reader->reader_ticket_id?>')"> Подробнее </a>

            <div class="infoItemAddition hidden" id="reader-<?=$reader->reader_ticket_id?>">
                <ul>
                    <li><?= $reader->adress?></li>
                    <li><?= $reader->phone?></li>
                    <li>Взятые книги:</li>
                    <?php
                    foreach ($bookinstances as $bookinstance) {
                        if ($bookinstance->reader_ticket_id === $reader->reader_ticket_id) {
                            ?>
                            <li>============================</li>
                            <li><?=$bookinstance->book_name?></li>
                            <li><?=$bookinstance->pick_date?></li>
                            <li><?=$bookinstance->return_date?></li>
                            <?php
                        };
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    function expandDesc (id, btnID) {
        let infoItemLink = document.getElementById(btnID);
        let infoItemAddition = document.getElementById(id);
        if (infoItemAddition.hasAttribute("class", "hidden")){
            infoItemAddition.removeAttribute("class", "hidden");
            infoItemLink.innerHTML = "Скрыть";
        } else {
            infoItemAddition.setAttribute("class", "hidden");
            infoItemLink.innerHTML = "Подробнее";
        }
    }
</script>