<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

$sql = "DELETE FROM lists WHERE id = $_POST[id]"; 
$result = mysqli_query($connect, $sql);

$sqlt = "DELETE FROM tasks WHERE list_id = $_POST[id]"; 
$resultt = mysqli_query($connect, $sqlt);


?>