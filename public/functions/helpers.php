<?php

function checkUser($mysqli) : array // возвращает массив (юзера целиком)
{
    // запретить использование страницы профайл пользователям, которые не авторизованы
    if (empty($_SESSION['userId'])) {
        header("location: /?act=login"); // иначе перекидывать на страницу авторизации
        die();
    }

    $userId = (int)$_SESSION['userId'];
// получаем пользователя из базы:
    $result = $mysqli->query("SELECT * FROM user WHERE id = '" . $userId . "' LIMIT 1");
    $user = $result->fetch_assoc(); //

    if (!$user) {
        header("location: /?act=login"); // иначе перекидывать на страницу авторизации
        die();
    }

    return $user;
}

//------------------
function getUserArticle($mysqli, int $id, int $userId) : array
{
    $result = $mysqli->query("SELECT * FROM article WHERE id = '" . $id . "' AND userId = '" . $userId. "'");
    $article = $result->fetch_assoc(); //
    if (!$article) {
        header("location: /?act=articles");
        die();
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