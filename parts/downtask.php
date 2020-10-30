<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

// ----- Считаем количество задач в списке -----
$sqlt = "SELECT * FROM tasks WHERE list_id LIKE '" . $_POST['list_id'] . "'"; 
$resultt = mysqli_query($connect, $sqlt);
$col_tasks = mysqli_num_rows($resultt) + 1;

// ----- Используем тот же механизм, что и на уменьшении, -----
// ----- только увеличиваем на 1 -----
$_POST[task_id]++;
$prevTaskId = $_POST[task_id] - 1;

// ----- Если не первый в списке -----
if ($_POST[task_id] > 1) {

	// ----- Текущему присваиваем свободный номер -----
	$sql = "UPDATE `tasks` SET `task_id` = '" . $col_tasks . "' WHERE (list_id = $_POST[list_id]) AND (task_id = $_POST[task_id])"; 
	$result = mysqli_query($connect, $sql);

	// ----- Предыдущему присваиваем номер текущего -----
	$sql = "UPDATE `tasks` SET `task_id` = '" . $_POST[task_id] . "' WHERE (list_id = $_POST[list_id]) AND (task_id = $prevTaskId)"; 
	$result = mysqli_query($connect, $sql);

	// ----- Текущему присваиваем номер предыдущего -----
	$sql = "UPDATE `tasks` SET `task_id` = '" . $prevTaskId . "' WHERE (list_id = $_POST[list_id]) AND (task_id = $col_tasks)"; 
	$result = mysqli_query($connect, $sql);

}

?>