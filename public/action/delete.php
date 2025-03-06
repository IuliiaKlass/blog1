<?php
/**
 * @var $mysqli // определяем, что данная переменная существует
 * @var $email
 * @var $userId
 */

$user = checkUser($mysqli); // подключаем ф-ю из helpers на проверку юзера из БД

$id = $_GET['id'] ?? null;
if (!$id) {
    header("location: /?act=articles");
    die();
}

$article = getUserArticle($mysqli, $id, $userId);

$mysqli->query("DELETE FROM article WHERE id = '" . $id . "' AND userId = '". $user['id'] ."'");
header("location: /?act=articles");