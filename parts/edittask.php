<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

if (isset($_POST[name])) {
$sql = "UPDATE `tasks` SET `task_name` = '" . $_POST[name] . "' WHERE (list_id = $_POST[list_id]) AND (task_id = $_POST[task_id])"; 
$result = mysqli_query($connect, $sql);
}

if (isset($_POST[deadline])) {
$sql = "UPDATE `tasks` SET `deadline` = '" . $_POST[deadline] . "' WHERE (list_id = $_POST[list_id]) AND (task_id = $_POST[task_id])"; 
$result = mysqli_query($connect, $sql);
}

if (isset($_POST[done])) {
$sql = "UPDATE `tasks` SET `done` = '" . $_POST[done] . "' WHERE (list_id = $_POST[list_id]) AND (task_id = $_POST[task_id])"; 
$result = mysqli_query($connect, $sql);
}

?>

