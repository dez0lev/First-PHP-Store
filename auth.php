<?php
    session_start();
    require_once('include/helper.php');

    checkGuest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <script src="js/timeout.js" defer></script>
    <script src="js/burger.js" defer></script>
</head>
<body>
    <?php require_once('blocks/header.php')?>

    <div class="auth">
        <h1>Вход</h1>
        <div>Нет аккаунта? <a href="reg.php">Регистрация</a></div>
        <form action="include/signin.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Войти</button>
            <?php if(hasMessage('error')): ?>
                <div class="msg"><?php echo getMessage('error') ?> </div>
            <?php endif; ?>
        </form>
    </div>

</body>
</html>