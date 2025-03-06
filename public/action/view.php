<?php
/**
 * @var $mysqli // определяем, что данная переменная существует
 */

$id = (int)$_GET['id'];
$result = $mysqli->query("SELECT * FROM article WHERE id = '" . $id . "'");
$article = $result->fetch_assoc(); //

require_once 'templates/viev.php';