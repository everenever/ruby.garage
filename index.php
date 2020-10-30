<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/ruby.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="parts/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="parts/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="parts/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="parts/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="parts/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="parts/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="parts/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="parts/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="parts/login/css/main.css">
<!--===============================================================================================-->


<body>


<?php 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

?>



<h1 class="text-center">SIMPLE TODO LISTS</h1>
<h2 class="text-center">FROM RUBY GARAGE</h2>


<!-- -------------Общий контейнер------------ -->
<?php 
	// ---------------- Если пользователь вошел ------------------
	if(isset($_COOKIE["user_id"])) {
		
		?>
		<div class="container-md rounded-bottom-list mb-5" id="list">
		<?php
			include 'parts/list.php';
			// include 'parts/list.php';
			// include 'parts/list.php';
			?>
		</div>	
			<!-- ----------------- Кнопка добавления списка заданий ---------------- -->
				<div class="d-flex justify-content-center m-3">
					<button type="button" class="btn btn-primary align-middle" onclick="addList(<?php echo $_COOKIE['user_id'] ?>)"><img src="images\add_list.png" class="small-pictogram mr-2">Add TODO List</button>
				</div>

				<!-- -------------- Кнопка выхода ----------------- -->
				<div class="d-flex justify-content-center m-3">
					<button type="button" class="btn btn-primary align-middle" onclick="document.location='parts/logout.php'"><img src="images\logout.png" class="small-pictogram mr-2">Log Out</button>
				</div>
		
		<?php
		// --------------------- Иначе если пользователь не вошел ---------------
	} else {
		// ----------------- Проверка условий для входа и регистрации -------------
			include 'parts/logquery.php';

		?>
			<div class="container-md" id="log_page">
		<?php	
		// ------------ Если пользователь не вошел - показываем страницу входа ------------------
			include 'parts/log.php';
		?>
			</div>
		<?php	
	}
	?>


<!-- ------------- /Общий контейнер------------ -->

<h6 class="text-center">© Ruby Garage</h6>


	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ruby.js"></script>

<!--===============================================================================================-->
	<script src="parts/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="parts/login/vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="parts/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="parts/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="parts/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="parts/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="parts/login/js/main.js"></script>




</body>
</html>

