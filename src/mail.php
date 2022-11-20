<?php include('server.php'); ?>
<?php if (!empty($_SESSION['auth'])) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Почта</title>
    </head>

    <body>
        <h1>Почта</h1>
        <form method="POST">
            <input type="submit" name="logOut" value="Выйти">
            <input type="submit" name="uploads" value="Загрузки">
            <input type="submit" name="gallery" value="Галерея">
            <input type="submit" name="logged" value="Аккаунт">
    </body>

    </html>
<?php else : ?>
    <p>Пожалуйста, авторизуйтесь</p>
    <p><a href="login.php"> Авторизация</a></p>
<?php endif; ?>