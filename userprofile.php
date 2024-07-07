<?php 

    session_start();
    require_once ('include/helper.php');

    $user = currentUser();
    $userOrders = userOrders($user['id']);

    checkAuth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userprofile.css">
    <script src="js/tabs.js" defer></script>
    <script src="js/timeout.js" defer></script>
    <script src="js/burger.js" defer></script>
</head>
<body>
    <?php require_once('blocks/header.php')?>

    <div class="profile">
        <div class="profile_container">
            <div class="profile_hello">
                <h1> Личный кабинет </h1>
                <p>Добро пожаловать, <?php echo $user['name'] ?></p>
            </div>
            <div class="userinfo">
                <button class="tab-btn active" data-tab="#tab_1">Личные данные</button>
                <button class="tab-btn" data-tab="#tab_2">Заказы</button>
                <form action="include/logout.php" method="post">
                    <button>Выйти</button>
                </form>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-item active" id="tab_1">
                <p>Имя: <?php echo $user['name'] ?> </p>

                <div class="email">
                    <p>Email: <?php echo $user['email'] ?></p>
                    <button class="editBtn">Редактировать</button>
                </div>
                <div class="editItem" id="editEmailForm" >
                    <form action="datachange/changeEmail.php" method="post">
                        <label for="new_email">Новый адрес электронной почты:</label>
                        <input type="email" name="new_email" required>
                        <input type="submit" value="Изменить почту">
                    </form>
                </div>
                <?php if(hasMessage('error')): ?>
                    <div class="error"><?php echo getMessage('error') ?> </div>
                <?php endif; ?>
                <?php if(hasMessage('success')): ?>
                    <div class="success"><?php echo getMessage('success') ?> </div>
                <?php endif; ?>

                <button class="changepass editBtn">Изменить пароль</button>
                <div class="editItem" id="editPasswordForm">
                    <form action="datachange/changePass.php" method="post">
                        <label for="new_password">Новый пароль:</label>
                        <input type="password" name="new_password" required>
                        <input type="submit" value="Изменить пароль">
                    </form>
                </div>
                <?php if(hasMessage('error')): ?>
                    <div class="error"><?php echo getMessage('error') ?> </div>
                <?php endif; ?>
                <?php if(hasMessage('success')): ?>
                    <div class="success"><?php echo getMessage('success') ?> </div>
                <?php endif; ?>
            </div>


            <div class="tab-item" id="tab_2">
                <h2>Активные заказы</h2>
                    <?php $hasActiveOrders = false ?>
                    <?php foreach ($userOrders as $order): ?>
                        <?php if ($order['status'] != 2): ?> 
                            <div class="orders">
                                <?php $hasActiveOrders = true; ?>
                                <?php $product = $order['product_id']; ?>
                                <?php $productID = getProductID($product); ?>
                                <img src="uploads/<?php echo $productID['path']; ?>" alt="">
                                <div class="orders-info">
                                    <p> <?php echo $productID['name'] ?> </p>
                                    <p> ID заказа: <?php echo ($order['id']) ?> </p>
                                    <p> Дата заказа: <?php echo ($order['date']) ?> </p>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>

                    <?php if (!$hasActiveOrders): ?> 
                        <p>Нет активных заказов.</p>
                    <?php endif ?>



                <h2>Завершенные заказы</h2>
                    <?php $hasCompletedOrders = false ?>
                    <?php foreach ($userOrders as $order): ?> 
                        <?php if ($order['status'] == 2): ?> 
                            <div class="orders">
                                <?php $hasCompletedOrders = true; ?>
                                <?php $product = $order['product_id']; ?>
                                <?php $productID = getProductID($product); ?>
                                <img src="uploads/<?php echo $productID['path']; ?>" alt="">
                                <div class="orders-info">
                                    <p> <?php echo $productID['name'] ?> </p>
                                    <p> ID заказа: <?php echo ($order['id']) ?> </p>
                                    <p> Дата заказа: <?php echo ($order['date']) ?> </p>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>

                    <?php if (!$hasCompletedOrders): ?> 
                        <p>Нет завершенных заказов.</p>
                    <?php endif ?>
            </div>
        </div>
    </div>

    <?php require_once('blocks/footer.php')?>
</body>

</html>