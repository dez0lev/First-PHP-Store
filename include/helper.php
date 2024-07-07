<?php

$userRole = currentUser();

function redirect(string $path) {
    header("Location: $path");
    die();
}


function getPDO(): PDO 
{
    return new \PDO('mysql:host=localhost; dbname=yatsukstore; port=8889', 'root', 'root');
}


function hasMessage(string $key): bool 
{
    return isset($_SESSION['message'][$key]);
}

function setMessage(string $key, string $message): void 
{
    $_SESSION['message'][$key] = $message;
}

function getMessage(string $key): ?string
{
    $message = $_SESSION['message'][$key] ?? null;
    unset($_SESSION['message'][$key]);
    return $message;
}

function findUser(string $email) {

    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `email` = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentUser() {

    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userID = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `id` = :id");
    $stmt->execute(['id' => $userID]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout() {
    unset($_SESSION['user']['id']);
    redirect('../auth.php');
}

function checkAuth() {
    if(!isset($_SESSION['user']['id'])) {
        redirect('auth.php');
    }
}

function checkGuest() {
    if(isset($_SESSION['user']['id'])) {
        redirect('profile.php');
    }
}


function redirectRole() {
    $userRole = currentUser();
    if ($userRole['role']) {
        redirect('../adminprofile.php');
    }

    redirect('../userprofile.php');
}

function CheckUserRole() {
    $userRole = currentUser();
    if(!($userRole['role'])) {
        redirect('userprofile.php');
    }
}


function getProduct() {

    $pdo = getPDO();

    $stmt = $pdo->query("SELECT * FROM `product` where `active` = 1");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function getProductID($id) {
    $pdo = getPDO();
    
    $stmt = $pdo->prepare("SELECT * FROM `product` WHERE `id` = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);

}

function createOrder($userId, $productId, $status) {
    $pdo = getPDO();

    $stmt = $pdo->prepare("INSERT INTO `Order` (`user_id`, `product_id`, `status`) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $productId, $status]);
}

function userOrders($user_id) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM `Order` WHERE `user_id` = :user_id");
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function orders() {
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM `Order`");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function CheckOrderDelete($id) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM `Order` where `product_id` = :product_id");
    $stmt->execute(['product_id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

