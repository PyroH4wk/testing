<?php include('server.php'); ?>
<?php if (!empty($_SESSION['auth']))
    header("Location: logged.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <div class="form" id="signUp">
        <form method="POST">
            <div class="error"> <?php echo $error ?> </div>
            <div class="container">
                <h1>Регистрация</h1>
                <input type="text" name="name" placeholder="Имя пользователя"> <br> <br>
                <input type="email" name="email" placeholder="Почта"> <br><br>
                <input type="password" name="password" placeholder="Пароль"><br><br>
                <input type="password" name="repeatPassword" placeholder="Повтор пароля"><br><br>
                <input type="submit" name="signUp" value="Зарегистрироваться">
                <p>Есть аккаунт? <a href="login.php">Авторизоваться</a></p>
        </form>
    </div>
</body>

</html>