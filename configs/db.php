<?php 
// Данные для подключение к базе данных
$server = "localhost";
$username = "bsxfsjmb_ruby";
$password = "ruby.garage";
$dbname = "bsxfsjmb_ruby";
 
// подключение к базе данных ruby
$connect = mysqli_connect($server, $username, $password, $dbname);
// установим кодировку для корректного отображения кириллицы (кодировка к БД)
mysqli_set_charset($connect, 'utf8');

?>