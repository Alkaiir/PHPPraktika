<style>

    .form {
        background-color: bisque;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 60px 70px;
        border-radius: 40px;
        width: 50%;
        margin: 40px auto;
    }

    h2 {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    a {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    input, select {
        width: 400px;
        padding: 12px 35px;
        border-radius: 15px;
        border: none;
        font-size: 24px;
        background: #fff;
    }

    button {
        padding: 12px 105px;
        font-size: 24px;
        color: black;
        border: none;
        border-radius: 15px;
        background-color: white;
        cursor: pointer;
    }

</style>


<form method="post" class="form">
    <h2><?= $message ?? ''; ?></h2>
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <select type="text" name="book_name" placeholder="Название книги">
        <?php
        foreach ($books as $book) {
            ?>
            <option value="<?=$book->book_name?>"><?=$book->book_name?></option>
            <?php
        }
        ?>
    </select>
    <input type="date" name="pick_date" placeholder="Дата выдачи">
    <input type="date" name="return_date" placeholder="Дата возврата">
    <select type="number" name="reader_ticket_id" placeholder="Номер билета читателя">
        <?php
        foreach ($readers as $reader) {
            ?>
            <option value="<?=$reader->reader_ticket_id?>"><?=$reader->reader_ticket_id . ' ' . $reader->surname . ' ' . $reader->name?></option>
            <?php
        }
        ?>
    </select>
    <button>Добавить</button>
</form>
