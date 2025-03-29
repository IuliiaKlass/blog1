<?php
/**
 * @var $pdo // определяем, что данная переменная существует
 * @var $email
 */

$user = checkUser($pdo); // подключаем ф-ю из helpers на проверку юзера из БД


if (count($_POST) > 0) {
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;

    $stmt = $pdo->prepare("UPDATE user SET name = ?, surname = ?, phone = ?, about = ? WHERE id = ?");
    $stmt->execute([$name, $surname, $phone, $about, $_SESSION['userId']]);

    redirect('/?act=add');
    die();
}

// подключаем шаблон к данному логическому файлу
require_once 'templates/profile.php';