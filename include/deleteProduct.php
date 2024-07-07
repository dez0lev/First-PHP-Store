<?php
require_once('helper.php');

$pdo = getPDO();


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $checkOrder = CheckOrderDelete($id);

    if (!empty($checkOrder)) {

        $stmt = $pdo->prepare("UPDATE `product` SET `active` = 0 WHERE `id` = :id");
        $stmt->execute(['id' => $id]);

    } else {

        $stmt = $pdo->prepare("DELETE FROM `product` WHERE `id` = :id");
        $stmt->execute(['id' => $id]);

    }

    redirect('index.php');

} if (isset($_GET['delfromProduct'])) {
    $id = $_GET['delfromProduct'];

    $stmt = $pdo->prepare("DELETE FROM `product` WHERE `id` = ?");
    $stmt->execute([$id]);

    redirect('index.php');
}