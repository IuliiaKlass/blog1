<?php
/**
 * @var $mysqli // определяем, что данная переменная существует
 * @var $email
 * @var $userId
 */

$user = checkUser($mysqli); // подключаем ф-ю из helpers на проверку юзера из БД

$result = $mysqli->query("SELECT * from article WHERE userId = '". $user['id'] ."' ORDER BY id DESC");

// подключаем шаблон к данному логическому файлу
require_once 'templates/articles.php';