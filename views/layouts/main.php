<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <title>Pop it MVC</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
    }

    body {
        font-family: Comfortaa, sans-serif;
    }

    nav {
        height: 100px;
        background-color: bisque;
        padding: 0 130px;
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: space-between;
    }

    a {
        font-size: 24px;
        text-decoration: none;
        color: black;

    }


</style>

<body>
<?php
if (app()->auth::check()):
?>
<header>
    <nav>
        <?php
        if (app()->auth::checkAdmin()):
        ?>
        <a href="<?= app()->route->getUrl('/') ?>">Главная</a>
        <a href="<?= app()->route->getUrl('/addlibrarian') ?>">Добавить библиотекаря</a>
        <a href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
        <?php
        else :
        ?>
        <a href="<?= app()->route->getUrl('/') ?>">Главная</a>
        <a href="<?= app()->route->getUrl('/') ?>">Добавить читателя</a>
        <a href="<?= app()->route->getUrl('/') ?>">Все читатели</a>
        <a href="<?= app()->route->getUrl('/') ?>">Все книги</a>
        <a href="<?= app()->route->getUrl('/') ?>">Популярные книги</a>
        <a href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<?php
endif;
?>

<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
