<?php
session_start();
require_once('helper.php');

$pdo = getPDO();
$user = currentUser();

if (!isset($user['id'])) {
    setMessage('error', "Пожалуйста, авторизуйтесь для оформления заказа.");
    redirect('../auth.php');
}

if (isset($_GET['product_id'])) {

    $user_id = $_SESSION['user']['id'];
    $product_id = $_GET['product_id']; 
    $status = 0;

    createOrder($user_id, $product_id, $status);

    setMessage('success', "Успешно. Подробнее про статус заказа узнавайте в профиле");
    redirect('../index.php');


} else {
    setMessage('error', "Что-то пошло не так");
    redirect('../index.php');
}