<?php 
session_start();
require_once('include/helper.php');
require_once('include/deleteProduct.php');

$id = $_GET['id'];
$product = getProductID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name'] ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="js/tabs.js" defer></script>
    <script src="js/timeout.js" defer></script>
    <script src="js/burger.js" defer></script>
</head>
<body>
    <?php require_once('blocks/header.php')?>  

    <div class="product container">
        <img src="uploads/<?php echo $product['path']; ?>" alt="">
        <div class="product-info">
            <p class="name"> <?php echo $product['name'] ?> </p>
            <p class="desc"> <?php echo $product['desc'] ?> </p>
            <p class="price"> Цена: $<?php echo $product['price'] ?> </p>
            <?php if(isset($userRole['role'])): ?>
                <a href="?delfromProduct= <?php echo $product['id'] ?>"> Удалить </a>
            <?php else: ?>
                <a href="include/order.php?product_id=<?php echo $product['id']?>">Заказать</a>
                <?php if(hasMessage('error')): ?>
                <div class="message error"><?php echo getMessage('error') ?> </div>
                <?php endif; ?>
                <?php if(hasMessage('success')): ?>
                    <div class="message success"><?php echo getMessage('success') ?> </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>

    <?php require_once('blocks/footer.php')?> 
</body>
</html>
