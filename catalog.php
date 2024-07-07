<?php
session_start();
require_once('include/helper.php');
require_once('include/deleteProduct.php');
require_once('include/pagination.php');

$userRole = currentUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/catalog.css">
    <script src="js/timeout.js" defer></script>
    <script src="js/burger.js" defer></script>
</head>
<body>
    <?php require_once('blocks/header.php') ?>


    <div class="products container">
        <?php foreach ($products as $product): ?>

            <div class="product">
                <a class="hrefproduct" href="product.php?id=<?php echo $product['id']; ?>">
                    <img src="uploads/<?php echo $product['path']; ?>" alt="">
                    <p> <?php echo $product['name'] ?> </p>
                    <p> $ <?php echo $product['price'] ?>  </p>
                </a>
                <?php if(isset($userRole['role'])): ?>
                    <a href="?del= <?php echo $product['id'] ?>"> Удалить </a>
                <?php else: ?>
                    <a href="include/order.php?product_id=<?php echo $product['id']?>">Заказать</a>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>
    </div>

    <div class="pagination container">

        <?php if($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Предыдущая</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" <?php echo ($i == $page) ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Следующая</a>
        <?php endif; ?>
        
    </div>

    <?php require_once('blocks/footer.php') ?>
</body>
</html>