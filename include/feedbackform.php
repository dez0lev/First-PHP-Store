<?php 
session_start();
require_once('helper.php');

$name = trim($_POST['name']);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$product = trim($_POST['product']);
$desc = trim($_POST['desc']);

$pdo = getPDO();

try {
    $query = "INSERT INTO `feedbackform` (`id`, `username`, `email`, `product`, `desc`) VALUES (NULL, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $email, $product, $desc]);
    
    setMessage('success', "Форма успешно отправлена!");
    redirect('../index.php');
    exit();
} catch (PDOException $e) {
    setMessage('error', "Что-то пошло не так");
    redirect('../index.php');
    exit();
}

