<?php 
session_start();
require_once('../include/helper.php');

$new_pass = trim($_POST['new_password']);

$userPass = currentUser();

$pdo = getPDO();
 
if (password_verify($new_pass, $userPass['password'])) {
    setMessage('error', "Новый пароль не должен совпадать со старым");
    redirectRole();
} else {
    // Хешируем новый пароль
    $new_pass_hashed = password_hash($new_pass, PASSWORD_DEFAULT);

    // Обновляем пароль в базе данных
    $pdo->query(
        "UPDATE user
        SET `password` = '$new_pass_hashed'
        WHERE id = " . $userPass['id']
    );
    setMessage('success', "Пароль успешно изменен");
    redirectRole();
}
