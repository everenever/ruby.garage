var siteURL = "http://kobets.tk";

// ---- Показываем кнопки редактирования при наведениии на List ----
function list_vision(obj) {
	obj.children[2].className = "ml-auto mr-2 visible";
	obj.children[3].className = "mr-2 visible";
}

// ---- Скрываем кнопки редактирования при потере фокуса List ----
function list_invision(obj) {
	obj.children[2].className = "ml-auto mr-2 invisible";
	obj.children[3].className = "mr-2 invisible";
}

// ---- Показываем кнопки редактирования при наведениии на Task ----
function task_vision(obj) {
	// console.dir(obj.children[3]);
	obj.children[3].children[0].className = "mr-2 visible";
	obj.children[3].children[1].className = "mr-2 visible";
	obj.children[3].children[2].className = "mr-2 visible";
	obj.children[3].children[3].className = "mr-2 visible";
}

// ---- Скрываем кнопки редактирования при потере фокуса Task ----
function task_invision(obj) {
	// console.dir(obj.children[3]);
	obj.children[3].children[0].className = "mr-2 invisible";
	obj.children[3].children[1].className = "mr-2 invisible";
	obj.children[3].children[2].className = "mr-2 invisible";
	obj.children[3].children[3].className = "mr-2 invisible";
}

// ----- Переход на страницу регистрации ------
function reg_page() {
	$('#log_page').load('parts/reg.php');
};

// ------ Переход на страницу авторизации ------
function log_page() {
	$('#log_page').load('parts/log.php');
};

// ----- Добавление списка -----
function addList(id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/addlist.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("user_id=" + id);
	$('#list').load('parts/list.php');	
}

// ----- Удаление списка -----
function delList(id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/dellist.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("id=" + id);
	$('#list').load('parts/list.php');	
}

// ----- Редактирование списка -----
// ----- При нажатии на кнопку редактирования списка снимает readOnly
function editList(obj) {
	// console.dir(obj.parentElement.children[1].children[0]);
	obj.parentElement.children[1].children[0].readOnly = false;
	obj.parentElement.children[1].children[0].className = "form-control bg-light border-0 text-black";
}

// ----- Сохранение изменений названия списка -----
function saveEditList(obj,id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/editlist.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("id=" + id + "&name=" + obj.value);
	$('#list').load('parts/list.php');
}


// ----- Добавление задачи -----
function addTask(obj,id) {
	// console.dir(obj.parentElement.children[1]);
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/addtask.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + id + "&name=" + obj.parentElement.children[1].value);
	$('#list').load('parts/list.php');	
}

// ----- Удаление задачи -----
function delTask(list_id, task_id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/deltask.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + list_id + "&task_id=" + task_id);
	$('#list').load('parts/list.php');	
}

// ----- Редактирование задачи -----
// ----- При нажатии на кнопку редактирования задачи снимает readOnly с названия и дедлайна
function editTask(obj) {
	console.dir(obj.parentElement.parentElement.children[2].children[0]);
	obj.parentElement.parentElement.children[1].children[0].readOnly = false;
	obj.parentElement.parentElement.children[1].children[0].className = "form-control bg-light border-1";
	obj.parentElement.parentElement.children[2].children[0].readOnly = false;
	obj.parentElement.parentElement.children[2].children[0].className = "form-control bg-light border-1";
	obj.parentElement.parentElement.children[2].children[0].type = "datetime-local";
}

// ----- Сохранение изменений названия задачи -----
function saveEditTaskName(obj,list_id,task_id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/edittask.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + list_id + "&task_id=" + task_id + "&name=" + obj.value);
	$('#list').load('parts/list.php');
}

// ----- Сохранение изменений дедлайна -----
function saveEditTaskDeadline(obj,list_id,task_id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/edittask.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + list_id + "&task_id=" + task_id + "&deadline=" + obj.value);
	$('#list').load('parts/list.php');
}

// ----- Сохранение изменений состояния выполнения -----
function saveCheckDone(obj,list_id,task_id) {
	if (obj.checked) { 
		$done = 1;
	} else $done = 0;
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/edittask.php", false);	
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + list_id + "&task_id=" + task_id + "&done=" + $done);
	$('#list').load('parts/list.php');
}

// ----- Поднимаем задачу -----
function upTask(list_id,task_id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/uptask.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + list_id + "&task_id=" + task_id);
	$('#list').load('parts/list.php');
}

// ----- Опускаем задачу -----
function downTask(list_id,task_id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/parts/downtask.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("list_id=" + list_id + "&task_id=" + task_id);
	$('#list').load('parts/list.php');
}