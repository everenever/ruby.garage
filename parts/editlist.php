<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

$sql = "UPDATE `lists` SET `list_name` = '" . $_POST[name] . "' WHERE id = $_POST[id]"; 
$result = mysqli_query($connect, $sql);

?>