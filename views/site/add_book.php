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

    input {
        width: 400px;
        padding: 12px 35px;
        border-radius: 15px;
        border: none;
        font-size: 24px;
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

    .checkbox {
        width: 15px;
        height: 15px;
    }

    .checkbox-container {
        height: 20px;
        display: flex;
        gap: 20px;
    }

</style>


<form method="post" class="form">
    <h2><?= $message ?? ''; ?></h2>
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <input type="text" name="book_name" placeholder="Название книги">
    <input type="number" name="publication_year" placeholder="Год публикации">
    <input type="number" name="price" placeholder="Цена">
    <div class="checkbox-container">
        <input type="checkbox" name="new_publication" class="checkbox" value="1">
        <label for="new_publication">Новая ли публикация</label>
    </div>
    <input type="text" name="annotation" placeholder="Анотация">
    <input type="text" name="author" placeholder="Автор">
    <button>Добавить</button>
</form>
