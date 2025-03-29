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


if (count($_POST) > 0) {
    $sql = '';
    if ($_FILES['file']['size']) {
        $filename = upload($user['id']);
        $sql = 'img = "' . $filename . '",';
        $article = getUserArticle($mysqli, $id, $userId);
        @unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article['img']); // удаляем картинку с сервера, если пользователь удалит статью
    }

    $title = strip_tags($_POST['title'] ?? null);
    $content = strip_tags($_POST['content'] ?? null);
    $stmt = $pdo->prepare("UPDATE article SET " . $sql . " title = ?, content = ? WHERE id = ? AND userId = ?");
    $stmt->execute([$title, $content, $id, $user['id']]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare
    redirect('/?act=articles');
    die();
}


$stmt = $pdo->prepare("SELECT * from article WHERE id = ? AND userId = ? LIMIT 1");
$stmt->execute([$id, $user['id']]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare
$article = $stmt->fetch(); //
if (!$article) {
    redirect('/?act=articles');
    die();
}

// подключаем шаблон к данному логическому файлу
require_once 'templates/edit.php';