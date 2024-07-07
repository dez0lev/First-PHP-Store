<?php
session_start();
require_once('include/helper.php');
require_once('include/deleteProduct.php');
$products = getProduct();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/timeout.js" defer></script>
    <script src="js/burger.js" defer></script>
    <title>Главная страница</title>
</head>
<body>

    <?php require_once('blocks/header.php')?>
  
    <div class="info container">
        <h1>YatsukStore - магазин оригинальной одежды. Направлен на ресейлинг одежды с китайской площадки "POIZON"</h1>
        <img src="img/poizon.png" alt="poizon">
    </div>

    <div class="products container">
        <?php 
        $productCount = 0;

        foreach ($products as $product):
            if ($productCount >= 9) {
                break;
            }
            $productCount++;
        ?>
            <div class="product">
                <a class="hrefproduct" href="product.php?id=<?php echo $product['id']; ?>">
                    <img src="uploads/<?php echo $product['path']; ?>" alt="">
                    <p> <?php echo $product['name'] ?> </p>
                    <p> $ <?php echo $product['price'] ?> </p>
                </a>
                <?php if(isset($userRole['role'])): ?>
                    <a href="?del= <?php echo $product['id'] ?>"> Удалить </a>
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
        <?php endforeach; ?>
    </div>

    <div class="form container">
        <h2>Форма для обратной связи</h2>
        <form action="include/feedbackform.php" method="post">
            <input type="text" name="name" placeholder="Имя" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="product" placeholder="Товар" required>
            <input type="text" name="desc" placeholder="Пожелания">
            <button type="submit">Отправить</button>
            <?php if(hasMessage('error')): ?>
                <div class="message error"><?php echo getMessage('error') ?> </div>
            <?php endif; ?>
            <?php if(hasMessage('success')): ?>
                <div class="message success"><?php echo getMessage('success') ?> </div>
            <?php endif; ?>
        </form>
    </div>


    <?php require_once('blocks/footer.php')?>
</body>

</html>