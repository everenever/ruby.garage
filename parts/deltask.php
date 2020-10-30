<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

$sqlt = "DELETE FROM tasks WHERE (list_id = $_POST[list_id]) AND (task_id = $_POST[task_id])"; 
$resultt = mysqli_query($connect, $sqlt);


?>