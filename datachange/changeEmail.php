<?php 
session_start();
require_once('../include/helper.php');

$new_email =  filter_var(trim($_POST['new_email']), FILTER_VALIDATE_EMAIL);

$userEmail = currentUser();

$pdo = getPDO();

 
if ($userEmail['email'] == $new_email) {
    setMessage('error', "Новый Email не должен совпадать со старым");
    redirectRole();
} elseif ($new_email === false) {
    $_SESSION['message'] = 'Введите корректный email';
    redirectRole();
    exit();
} else {
    $pdo->query(
        "UPDATE user
        SET `email` = '$new_email'
        WHERE id = " . $userEmail['id']
    );
    setMessage('success', "Email успешно изменен");
    redirectRole();
} 





