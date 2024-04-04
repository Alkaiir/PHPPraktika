<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Логин <input type="text" name="login"></label>
    <label>Почта <input type="email" name="email"></label>
    <label>Пароль <input type="password" name="password"></label>
    <label>Роль <input type="number" name="role"></label>
    <input type="image">
    <button>Зарегистрироваться</button>
</form>