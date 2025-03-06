 <?php
 /**
  * @var $mysqli // определяем, что данная переменная существует
  */

if (count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password2 = $_POST['password2 '] ?? null;

    $password = password_hash($password, PASSWORD_DEFAULT); // password_hash — Создаёт хеш пароля (безопасность)

    $mysqli->query("INSERT INTO user SET email = '" . $email . "', password = '" . $password . "' ");
    header('Location: /?act=login'); // после регистрации перекидываем на другую страницу (редирект)
    die(); // заканчиваем программу, чтоб никуда не перекинуло
}

// подключаем шаблон к данному логическому файлу
 require_once 'templates/register.php';