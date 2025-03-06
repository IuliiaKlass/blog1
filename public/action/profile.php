<?php
/**
 * @var $mysqli // определяем, что данная переменная существует
 * @var $email
 */

$user = checkUser($mysqli); // подключаем ф-ю из helpers на проверку юзера из БД


if (count($_POST) > 0) {
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $mysqli->query("UPDATE user SET name = '" . $name . "', surname = '" . $surname . "', phone = '" . $phone . "', about = '" . $about . "' WHERE id = '". $user['id'] ."'  ");
    header("location: /?act=add");
    die();
}

// подключаем шаблон к данному логическому файлу
require_once 'templates/profile.php';