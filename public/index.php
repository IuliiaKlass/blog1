<?php
error_reporting(E_ALL); // все ошибки
ini_set('display_errors', 1); // показывать (отображать) ошибки

session_start(); // старт сессии

require_once 'config.php'; // подключение конфигов
require_once 'functions/helpers.php'; // подключаем вспомогательный файл

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // подключение к БД


// если в гет-запросе (в адресной строке) есть act:
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'register':
            require_once 'action/register.php'; // если в адресной строке есть ?act=register - переходим на страницу action/register.php аналогично и с другими кейсами
            break;
        case 'login':
            require_once 'action/login.php';
            break;
        case 'profile':
            require_once 'action/profile.php';
            break;
        case 'add':
            require_once 'action/add.php';
            break;
        case 'articles':
            require_once 'action/articles.php';
            break;
        case 'edit':
            require_once 'action/edit.php';
            break;
        case 'delete':
            require_once 'action/delete.php';
            break;
        case 'logout':
            require_once 'action/logout.php';
            break;
        case 'view':
            require_once 'action/view.php';
            break;
    }
    die(); // заканчивается работа программы, чтоб не подключилась главная страница
}


$user = null;
$userId = intval($_SESSION['userId'] ?? null);
if ($userId) { // если юзер есть в сессии, то только тогда считывать пользователя
    $result = $mysqli->query("SELECT * FROM user WHERE id = '" . $userId . "' LIMIT 1");
    $user = $result->fetch_assoc(); //
}

$result = $mysqli->query("SELECT * from article ORDER BY id DESC LIMIT 9");

require_once 'templates/index.php'; // подключение главного шаблона