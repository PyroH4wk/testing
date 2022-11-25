<?php include('server.php'); ?>
<?php if (!empty($_SESSION['auth'])) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Фотоальбом</title>
    </head>

    <body>
        <h1>Галерея</h1>
        <form method="POST">
            <input type="submit" name="logOut" value="Выйти">
            <input type="submit" name="logged" value="Аккаунт">
            <input type="submit" name="uploads" value="Загрузки">
            <input type="submit" name="mail" value="Почта">
        </form>
        <?php
        $files = scandir(__DIR__ . '/uploads');
        $links = [];
        foreach ($files as $fileName) {
            if ($fileName === '.' || $fileName === '..') {
                continue;
            }
            $links[] = 'http://localhost/uploads/' . $fileName;
        }
        foreach ($links as $link) : ?>
            <a href="<?= $link ?>"><img src="<?= $link ?>" height="200px"></a>
        <?php endforeach; ?>
    </body>

    </html>
<?php else : ?>
    <p>Пожалуйста, авторизуйтесь</p>
    <p><a href="login.php"> Авторизация</a></p>
<?php endif; ?>

