<?php
/**
 * @var $mysqli // определяем, что данная переменная существует
 * @var $email
 * @var $userId
 */

$user = checkUser($mysqli); // подключаем ф-ю из helpers на проверку юзера из БД
$error = '';

if (count($_POST) > 0) {
    $title = strip_tags($_POST['title'] ?? null);
    $content = strip_tags($_POST['content'] ?? null);

    if (!$title && !$content && !$_FILES['file']['size']) {
        $error = 'Required fields are not filled in!' ;
    } elseif (!$title || !$content) {
        $error = 'Content is not found';
    } elseif (!$_FILES['file']['size']) {
        $error = 'Images not found';
    } else {
        $filename = upload($user['id']);

        $sql = "INSERT INTO article 
                    SET img = '{$filename}',
                        userId = {$user['id']},
                        title = '{$title}',
                        content = '{$content}',
                        createdAt = NOW()
                        ";
        $mysqli->query($sql);
        header("location: /?act=articles");
        die();
    }
    }



// подключаем шаблон к данному логическому файлу
require_once 'templates/add.php';