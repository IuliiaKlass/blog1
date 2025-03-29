<?php
/**
 * @var $pdo // определяем, что данная переменная существует
 */

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM article WHERE id = ?");
$stmt->execute([$id]); // в execute прокидываем те переменные, которые мы поставили под вопросиком в prepare
$article = $stmt->fetch();

require_once 'templates/viev.php';