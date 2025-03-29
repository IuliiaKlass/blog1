<?php
/**
 * @var $pdo // определяем, что данная переменная существует
 * @var $email
 * @var $userId
 */

$user = checkUser($pdo);

$stmt = $pdo->prepare("SELECT * from article WHERE userId = ? ORDER BY id DESC");
$stmt->execute([$user['id']]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare

// подключаем шаблон к данному логическому файлу
require_once 'templates/articles.php';