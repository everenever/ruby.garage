<?php 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

$sql = "SELECT * FROM lists WHERE user_id LIKE '" . $_COOKIE["user_id"] . "'"; 
$result = mysqli_query($connect, $sql);
$col_users = mysqli_num_rows($result);

?>


<!-- -------------------- List - Список дел --------------------- -->
<?php
while ($row = mysqli_fetch_assoc($result)) {


	$sqlt = "SELECT * FROM tasks WHERE list_id LIKE '" . $row['id'] . "' ORDER BY task_id"; 
	$resultt = mysqli_query($connect, $sqlt);
	$col_tasks = mysqli_num_rows($resultt);
?>	
<div class="container-md bg-light rounded-bottom-list mb-5"> 
	<div class="row p-2 bg-primary text-white" onmouseover="list_vision(this)" onmouseout="list_invision(this)">
		<img src="images\calendar.png" class="pictogram">
		<div style="margin: 3px; margin-left: 10px; width: calc(100% - 130px);"><input type="text" class="form-control bg-primary border-0 text-white" value="<?php echo $row['list_name'] ?>" onchange="saveEditList(this,<?php echo $row['id'] ?>)" readonly></div>
		<a href="#" class="ml-auto mr-2 invisible" onclick="editList(this)"><img src="images\edit.png" class="pictogram"></a>
		<a href="#" class="mr-2 invisible" onclick="delList(<?php echo $row['id'] ?>)"><img src="images\del.png" class="pictogram"></a>
	</div>

	<div class="row p-2 bg-secondary">
		<div class="input-group">
			<a href="#" class="mr-2 mt-1" onclick="addTask(this,<?php echo $row['id'] ?>)"><img src="images\add_task.png" class="pictogram"></a>
			<input type="text" class="form-control" placeholder="Start typing here to create a task">
	    	<button class="btn btn-success" type="button" onclick="addTask(this,<?php echo $row['id'] ?>)">Add Task</button>
		</div>
	</div>

<!-- ------------------------ Tasks - Таблица с заданиями ------------------------ -->
	<div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>Done</th>
                <th>Task</th>
                <th>Deadline</th>
                <th>Functions</th>
            </thead>
            <!-- формируем таблицу с заданиями -->
                <tbody>
                	<?php
                	while ($rowt = mysqli_fetch_assoc($resultt)) {
                	?>	
	                    <tr onmouseover="task_vision(this)" onmouseout="task_invision(this)">
	                    	<td class="align-middle"><input type="checkbox" aria-label="Checkbox" <?php if ($rowt['done']){ echo "checked";} ?> onchange="saveCheckDone(this,<?php echo $row['id'],' , ', $rowt['task_id'] ?>)"></td>
	                    	<td><input class="form-control border-0 bg-transparent" type="text" value="<?php echo $rowt['task_name'] ?>" onchange="saveEditTaskName(this,<?php echo $row['id'],' , ', $rowt['task_id'] ?>)" readonly></td>
	                    	<td><input class="form-control border-0 bg-transparent" type="text" value="<?php if ($rowt['deadline']>0) { echo $rowt['deadline']; } ?>" onchange="saveEditTaskDeadline(this,<?php echo $row['id'],' , ', $rowt['task_id'] ?>)" readonly></td>
	                    	<td class="align-middle">
	                    		<a href="#" class="mr-2 invisible" onclick="upTask(<?php echo $row['id'],' , ', $rowt['task_id'] ?>)"><img src="images\arrow_up.png" class="small-pictogram"></a>
	                    		<a href="#" class="mr-2 invisible" onclick="downTask(<?php echo $row['id'],' , ', $rowt['task_id'] ?>)"><img src="images\arrow_down.png" class="small-pictogram"></a>
	                    		<a href="#" class="mr-2 invisible" onclick="editTask(this)"><img src="images\edit.png" class="small-pictogram"></a>
	                    		<a href="#" class="mr-2 invisible" onclick="delTask(<?php echo $row['id'],' , ', $rowt['task_id'] ?>)"><img src="images\del.png" class="small-pictogram"></a>
	                    	</td>
	                    </tr>
	                <?php
	            	}
	            	?>
                </tbody>
        </table>
    </div>
</div>    
<?php
}
?>	    
