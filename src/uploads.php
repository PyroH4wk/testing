<?php include('server.php'); ?>
<?php if (!empty($_SESSION['auth'])) : ?>
    <?php
    if (!empty($_FILES['attachment'])) {
        $file = $_FILES['attachment'];

        $srcFileName = $file['name'];
        $newFilePath = __DIR__ . '/uploads/' . $srcFileName;

        $allowedExtensions = ['jpg', 'png', 'gif'];
        $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
        if (!in_array($extension, $allowedExtensions)) {
            $error = 'Загрузка файлов с таким расширением запрещена!';
        } elseif ($file['error'] !== UPLOAD_ERR_OK) {
            $error = 'Ошибка при загрузке файла.';
        } elseif (file_exists($newFilePath)) {
            $error = 'Файл с таким именем уже существует';
        } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
            $error = 'Ошибка при загрузке файла';
        } else {
            $result = 'http://localhost/uploads/' . $srcFileName;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Загрузка</title>
    </head>

    <body>
        <h1>Загрузка</h1>
        <form method="POST">
            <input type="submit" name="logOut" value="Выйти">
            <input type="submit" name="mail" value="Почта">
            <input type="submit" name="logged" value="Аккаунт">
            <input type="submit" name="gallery" value="Галерея">
        </form>
        <?php if (!empty($error)) : ?>
            <?= $error ?>
        <?php elseif (!empty($result)) : ?>
            <?= $result ?>
        <?php endif; ?>
        <br>
        <form action="/uploads.php" method="post" enctype="multipart/form-data">
            <input type="file" name="attachment">
            <input type="submit">
    </body>

    </html>
<?php else : ?>
    <p>Пожалуйста, авторизуйтесь</p>
    <p><a href="login.php"> Авторизация</a></p>
<?php endif; ?>