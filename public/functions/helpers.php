<?php

function redirect(string $uri) : void
{
    header('Location: ' . $uri); // после сеанса перекидываем на другую страницу (редирект)
    die(); // заканчиваем программу, чтоб никуда не перекинуло
}

// ---------------------
function checkUser($pdo) : array // возвращает массив (юзера целиком)
{
    // запретить использование страницы профайл пользователям, которые не авторизованы
    if (empty($_SESSION['userId'])) {
        redirect('/?act=login');
    }

    $userId = (int)$_SESSION['userId'];
// получаем пользователя из базы:
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ? LIMIT 1");
    $stmt->execute([$userId]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare
    $user = $stmt->fetch(); //

    if (!$user) {
        redirect('/?act=login');
    }

    return $user;
}

//------------------
function getUserArticle($pdo, int $id, int $userId)
{
    $stmt = $pdo->prepare("SELECT * FROM article WHERE id = ? AND userId = ?");
    $stmt->execute([$id, $userId]);
    $article = $stmt->fetch(); //
    if (!$article) {
        redirect('/?act=articles');
    }
    return $article;
}


//------------------
function upload(int $userId) : string {
    $img = $_FILES['file']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];
    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($img);
            $ext = 'jpg';
            break;
        case 'image/png':
            $src = imagecreatefrompng($img);
            $ext = 'png';
            break;
        case 'image/gif':
            $src = imagecreatefromgif($img);
            $ext = 'gif';
            break;
    }

    $wNew = 348;
    $hNew = floor($height / ($width/$wNew));
    $dest = imagecreatetruecolor($wNew, $hNew);

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $wNew, $hNew, $width, $height);

    $filename = 'photo-' . $userId . '-' . time() . '.' . $ext;
    $fullFilename = $_SERVER['DOCUMENT_ROOT'] . '/images/' . $filename;

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dest, $fullFilename, 100);
            break;
        case 'image/png':
            imagepng($dest, $fullFilename);
            break;
        case 'image/gif':
            imagegif($dest, $fullFilename);
            break;
    }
     return $filename;
}