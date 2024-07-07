<?php
session_start();
require_once('helper.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);

    if (empty($username)) {
        $_SESSION['message'] = 'Введите ваше имя';
        redirect('../reg.php');
        exit();
    }

    if ($email === false) {
        $_SESSION['message'] = 'Введите корректный email';
        redirect('../reg.php');
        exit();
    }

    if ($password !== $password_confirm) {
        $_SESSION['message'] = 'Пароли не совпадают';
        redirect('../reg.php');
        exit();
    }

    if (empty($password)) {
        $_SESSION['message'] = 'Поле пароля не может быть пустым';
        redirect('../reg.php');
        exit();
    }


    $password = password_hash($password, PASSWORD_DEFAULT);


    $pdo = getPDO();


    try {
        $query = "INSERT INTO `user` (`id`, `role`, `name`, `email`, `password`) VALUES (NULL, NULL, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $email, $password]);
        

        redirect('../userprofile.php');
        exit();
    } catch (PDOException $e) {

        $_SESSION['message'] = 'Ошибка при регистрации: ' . $e->getMessage();
        redirect('../reg.php');
        exit();
    }

} else {
    $_SESSION['message'] = 'Некорректный запрос';
    redirect('../reg.php');
    exit();
}
?>
