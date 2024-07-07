<?php

require_once('include/helper.php');

$products_per_page = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$total_products = $pdo->query("SELECT COUNT(*) FROM product")->fetchColumn();
$total_pages = ceil($total_products / $products_per_page);

if (!is_int($page) || $page > $total_pages || $page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $products_per_page;

$pdo = getPDO();
$stmt = $pdo->prepare("SELECT * FROM `product` LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $products_per_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
