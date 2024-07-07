<?php
session_start();
require_once('helper.php');

if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    $pdo = getPDO();
    $stmt = $pdo->prepare("UPDATE `order` SET `status` = 1 WHERE `id` = :order_id");
    $stmt->execute(['order_id' => $orderId]);

    redirectRole();
    exit();
} else {
    echo "Некорректный запрос";
}

