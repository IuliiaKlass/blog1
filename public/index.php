<?php
error_reporting(E_ALL); // все ошибки
ini_set('display_errors', 1); // показывать (отображать) ошибки

session_start(); // старт сессии

require_once 'config.php'; // подключение конфигов
require_once 'functions/helpers.php'; // подключаем вспомогательный файл

// из https://phpdelusions.net/pdo (https://www.youtube.com/watch?v=Q8cX-RrdaFU - 5минута)
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, DB_USER, DB_PASS, $options);


// REQUEST - объединение, где содержится и все что в GET и все что в POST
// если в гет-запросе (в адресной строке) есть act:
if (isset($_REQUEST['act'])) {
    switch ($_REQUEST['act']) {
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
$userId = (int)($_SESSION['userId'] ?? null);
if ($userId) { // если юзер есть в сессии, то только тогда считывать пользователя
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ? LIMIT 1");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(); //
}

$stmt = $pdo->query("SELECT * from article ORDER BY id DESC LIMIT 9");

require_once 'templates/index.php'; // подключение главного шаблона