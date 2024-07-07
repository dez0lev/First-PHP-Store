<?php 

session_start();

require_once('helper.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image = $_FILES['path'];

    if ($image['error'] == 0) {

        $path = '../uploads/' . time() . '-' . $image['name'];
        

        if (move_uploaded_file($image['tmp_name'], $path)) {

            $pdo = getPDO();


            $stmt = $pdo->prepare("INSERT INTO product (`id`, `name`, `price`, `desc`, `path`) VALUES (NULL, ?, ?, ?, ?)");
            $stmt->execute([$name, $price, $desc, $path]);

            setMessage('success', "Товар успешно добавлен");
            redirectRole();
        } else {
            setMessage('error', "Ошибка при загрузке файла");
            redirectRole();
        }
    } else {
        setMessage('error', "Ошибка при загрузке файла");
        redirectRole();
    }
}

