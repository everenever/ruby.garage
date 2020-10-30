<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

$sqlt = "SELECT * FROM tasks WHERE list_id LIKE '" . $_POST['list_id'] . "'"; 
$resultt = mysqli_query($connect, $sqlt);
$col_tasks = mysqli_num_rows($resultt) + 1;


$sql = "INSERT INTO tasks (list_id, task_id, task_name) VALUES ('" . $_POST['list_id'] . "', '" . $col_tasks . "', '" . $_POST['name'] . "')"; 
$result = mysqli_query($connect, $sql);

?>