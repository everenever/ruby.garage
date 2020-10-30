<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

$sql = "INSERT INTO lists (user_id) VALUES ('" . $_COOKIE["user_id"] . "')"; 
$result = mysqli_query($connect, $sql);

?>