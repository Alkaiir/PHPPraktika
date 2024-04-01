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

    h3 {
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

</style>


<form method="post" class="form">
    <h2><?= $message ?? ''; ?></h2>
    <input type="text" name="login" placeholder="Логин">
    <input type="email" name="email" placeholder="Почта">
    <input type="password" name="password" placeholder="Пароль">
    <button>Добавить</button>
</form>