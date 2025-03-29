<?php
/**
 * @var $pdo // определяем, что данная переменная существует
 * @var $email
 */

$error = ''; // заводим переменную для вывода ошибок
if (count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    // получаем пользователя из базы:
    $stmt = $pdo->prepare("SELECT * from user WHERE email = ?");
    $stmt->execute([$email]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare
    $user = $stmt->fetch(); //

    //проверяет если юзер найден и пароль введенный пользователем совпадает с паролем из базы данных, то вход
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        redirect('/?act=profile'); // после входа перекидываем на другую страницу (редирект)
        die();// заканчиваем программу, чтоб никуда не перекинуло
    } else {
        $error = 'User is not found'; // если пользователь не найден, то выдает ошибку с данным текстом
    }


}


// подключаем шаблон к данному логическому файлу
require_once 'templates/login.php';