<style>
    .login-content {
        height: 100vh;
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form {
        background-color: bisque;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 60px 70px;
        border-radius: 40px;
    }

    .login-title {
        color: black;
        font-size: 40px;
    }

    .login-input {
        width: 400px;
        padding: 12px 35px;
        border-radius: 15px;
        border: none;
        font-size: 24px;
    }

    .login-button {
        padding: 12px 105px;
        font-size: 24px;
        color: black;
        border: none;
        border-radius: 15px;
        background-color: white;
        cursor: pointer;
    }

</style>



<?php
if (!app()->auth::check()):
    ?>
<div class="login-content">
    <form class="form" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h2 class="login-title">Авторизация</h2>
        <h3><?= $message ?? ''; ?></h3>
        <input class="login-input" placeholder="Логин" type="text" name="login">
        <input class="login-input" placeholder="Пароль" type="password" name="password">
        <button class="login-button">Войти</button>
    </form>
</div>
<?php endif;