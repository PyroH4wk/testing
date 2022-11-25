<?php include('server.php'); ?>
<? if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
?>
<?php if (!empty($_SESSION['auth']))
    header("Location: logged.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>

<body>
    <div class="form" id="logIn">
        <form method="POST">
            <div class="error"> <?php echo $error2 ?> </div>
            <div class="container">
                <h1>Авторизация</h1>
                <input type="email" name="email" placeholder="Почта"> <br><br>
                <input type="password" name="password" placeholder="Пароль"><br><br>
                <input type="submit" name="logIn" value="Авторизоваться">
                <p>Нету аккаунта? <a href="registration.php"> Зарегистрироваться</a></p>
        </form>
    </div>
    </div>
</body>

</html>
