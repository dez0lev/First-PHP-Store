<?php
session_start();
require_once('helper.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    if ($email && $password) {
        $user = findUser($email);
        $userRole = currentUser();

        if (!$user) {
            setMessage('error', "Пользователь $email не найден");
            redirect('../auth.php');
        }

        if (!password_verify($password, $user['password'])) {
            setMessage('error', "Неверный пароль");
            redirect('../auth.php');
        }

        $_SESSION['user']['id'] = $user['id'];

        redirectRole();
        
    } else {
        setMessage('error', "Введите корректные email и пароль");
        redirect('../auth.php');
    }
} else {
    setMessage('error', "Некорректный запрос");
    redirect('../auth.php');
}


