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

</style>

<h2 class="pageTitle">Список пользователей</h2>

<div class="infoBlock">
    <?php
    foreach ($users as $user) {
        ?>
        <div class="infoItem">
            <ul>
                <li><?= $user->login?></li>
                <li><?= $user->email?></li>
                <?php
                if ($user->role === 2) :
                ?>
                <li>Администратор</li>
                <?php
                else:
                ?>
                <li>Библиотекарь</li>
                <?php
                endif;
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
</div>