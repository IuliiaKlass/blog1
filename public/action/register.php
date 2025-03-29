 <?php
 /**
  * @var $pdo // определяем, что данная переменная существует
  */

if (count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password2 = $_POST['password2 '] ?? null;

    $password = password_hash($password, PASSWORD_DEFAULT); // password_hash — Создаёт хеш пароля (безопасность)

    $stmt = $pdo->prepare("INSERT INTO user SET email = ?, password = ?");
    $stmt->execute([$email, $password]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare

    redirect('/?act=login');
}

// подключаем шаблон к данному логическому файлу
 require_once 'templates/register.php';