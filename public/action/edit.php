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
    $mysqli->query("UPDATE article SET " . $sql . " title = '" . $title . "', content = '". $content ."' WHERE id = '" . $id . "' AND userId = '". $user['id'] ."'");
    header("location: /?act=articles");
    die();
}


$result = $mysqli->query("SELECT * from article WHERE id = '" . $id . "' AND userId = '". $user['id'] ."' LIMIT 1");
$article = $result->fetch_assoc(); //
if (!$article) {
    header("location: /?act=articles");
    die();
}

// подключаем шаблон к данному логическому файлу
require_once 'templates/edit.php';