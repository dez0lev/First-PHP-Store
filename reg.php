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
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <script src="js/timeout.js" defer></script>
    <script src="js/burger.js" defer></script>
</head>
<body>
    <?php require_once('blocks/header.php')?>

    <div class="auth">
        <h1>Регистрация</h1>
        <div>Есть аккаунт? <a href="auth.php">Войти</a></div>
        <form action="include/signup.php" method="post">
            <input type="text" name="username" placeholder="Ваше имя" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="password_confirm" placeholder="Подтвердите пароль" required>
            <button type="submit">Зарегистрироваться</button>
            <?php
                if($_SESSION['message'] ?? '') {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </div>

</body>
</html>