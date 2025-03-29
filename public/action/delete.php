<?php
/**
 * @var $pdo // определяем, что данная переменная существует
 * @var $email
 * @var $userId
 */

$user = checkUser($pdo); // подключаем ф-ю из helpers на проверку юзера из БД
$id = $_GET['id'] ?? null;
if (!$id) {
    redirect('/?act=articles');
    die();
}

$article = getUserArticle($pdo, $id, $user['id']);

$stmt = $pdo->prepare("DELETE FROM article WHERE id = ? AND userId = ?");
$stmt->execute([$id, $user['id']]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare

redirect('/?act=articles');