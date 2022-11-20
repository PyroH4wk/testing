<?php
session_start();
$error = "";
$error2 = "";
if (array_key_exists("signUp", $_POST)) {
    include('mysqlDB.php');
    $name = mysqli_real_escape_string($mysqlDB, $_POST['name']);
    $email = mysqli_real_escape_string($mysqlDB, $_POST['email']);
    $password = mysqli_real_escape_string($mysqlDB,  $_POST['password']);
    $repeatPassword = mysqli_real_escape_string($mysqlDB,  $_POST['repeatPassword']);
    if (!$name) {
        $error .= "Введите имя пользователя <br>";
    }
    if (!$email) {
        $error .= "Введите почта <br>";
    }
    if (!$password) {
        $error .= "Введите пароль <br>";
    }
    if ($password !== $repeatPassword) {
        $error .= "Пароли не совпадают <br>";
    }
    if ($error) {
        $error = "<b>Ошибка при регистрации</b> <br>" . $error;
    } else {
        $query = "SELECT id FROM users WHERE email = '$email' OR name = '$name'";
        $result = mysqli_query($mysqlDB, $query);
        if (mysqli_num_rows($result) > 0) {
            $error = "<b>Ошибка при регистрации</b> <br>";
            $error .= "<p>Имя пользователя или адрес электронной почты уже существует</p>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
            $result = mysqli_query($mysqlDB, $query);
            $_SESSION['flash'] = 'Регистрация прошла успешно';
            header("Location: login.php");
        }
    }
}
if (array_key_exists("logIn", $_POST)) {
    include('mysqlDB.php');
    $email = mysqli_real_escape_string($mysqlDB, $_POST['email']);
    $password = mysqli_real_escape_string($mysqlDB,  $_POST['password']);
    if (!$email) {
        $error2 .= "Введите почту <br>";
    }
    if (!$password) {
        $error2 .= "Введите пароль <br>";
    }
    if ($error2) {
        $error2 = "<b>Ошибка авторизации</b><br>" . $error2;
    } else {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($mysqlDB, $query);
        $row = mysqli_fetch_array($result);
        if (isset($row)) {
            if (password_verify($password, $row['password'])) {
                if ($row) {
                    $_SESSION['auth'] = true;
                }
            } else {
                $error2 = "Неправильный пароль";
                $error2 = "<b>Ошибка авторизации</b><br>" . $error2;
            }
        } else {
            $error2 = "Неправильная почта";
            $error2 = "<b>Ошибка авторизации</b><br>" . $error2;
        }
    }
}
if (array_key_exists("logged", $_POST)) {
    header("Location: logged.php");
}
if (array_key_exists("mail", $_POST)) {
    header("Location: mail.php");
}
if (array_key_exists("uploads", $_POST)) {
    header("Location: uploads.php");
}
if (array_key_exists("logOut", $_POST)) {
    header("Location: logout.php");
}
if (array_key_exists("gallery", $_POST)) {
    header("Location: gallery.php");
}

