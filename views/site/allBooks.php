<style>

    .pageTitle {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    form {
        background-color: bisque;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 20px 70px;
        border-radius: 40px;
        width: 50%;
        margin: 20px auto;
    }

    input {
        width: 600px;
        padding: 6px 17px;
        border-radius: 15px;
        border: none;
        font-size: 24px;
    }

    button {
        width: 200px;
        padding: 6px 50px;
        font-size: 16px;
        color: black;
        border: none;
        border-radius: 15px;
        background-color: white;
        cursor: pointer;
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

</style>

<h2 class="pageTitle">Список всех книг</h2>

<form action="" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <input type="text" name="search">
    <button>Найти книгу</button>
</form>

<div class="infoBlock">
    <?php


    foreach ($books as $book) {
        ?>
        <div class="infoItem">
            <ul>
                <li>Название: <?= $book->book_name?></li>
                <li>Анотация: <?= $book->annotation?></li>
                <li>Автор: <?= $book->author?></li>
            </ul>

            <a href="#" class="infoItemLink" id="btn-book-<?=$book->book_name?>" onclick="expandDesc('book-<?=$book->book_name?>', 'btn-book-<?=$book->book_name?>')"> Подробнее </a>

            <div class="infoItemAddition hidden" id="book-<?=$book->book_name?>">
                <ul>
                    <li>Год издания: <?= $book->publication_year?></li>
                    <li>Цена: <?= $book->price?></li>
                    <li>Читатели взявшие книгу:</li>
                    <?php
                    foreach ($bookinstances as $bookinstance) {
                        if ($bookinstance->book_name === $book->book_name && $bookinstance->in_stock === 0) {
                            ?>
                            <li>============================</li>
                            <?php
                            foreach ($readers as $reader) {
                                if ($bookinstance->reader_ticket_id === $reader->reader_ticket_id) {
                                    ?>
                                    <li><?= $reader->surname?></li>
                                    <li><?= $reader->name?></li>
                                    <li><?= $reader->patronymic?></li>
                                    <li><?= $bookinstance->pick_date?></li>
                                    <li><?= $bookinstance->return_date?></li>
                                    <li>Номер билета: <?= $reader->reader_ticket_id?></li>

                                    <?php
                                }
                            }

                        }
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