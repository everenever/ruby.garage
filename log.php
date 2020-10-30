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

<!-- ------------------ Login ---------------------------- -->

<?php 

if (isset($_POST["email"]) && isset($_POST["pass"])
  && $_POST["email"] != "" && $_POST["pass"] != "") {
  $log_pass = md5($_POST['pass']);

  
  $sql = "SELECT * FROM users WHERE email LIKE '" . $_POST["email"] . "' AND password LIKE '" . $log_pass . "'"; 
  $result = mysqli_query($connect, $sql);
  $col_users = mysqli_num_rows($result);
  if($col_users == 1) {
    $user = mysqli_fetch_assoc($result);
    // Создаем куки для данных пользователя
    setcookie("user_id", $user["id"], time() + 36000, "/");
    header("Location: /");
  } else {
    $alert = "Неправильные имя или пароль!";
    echo "<script type='text/javascript'>alert('$alert');</script>";
  }
}

?>



<div class="limiter">
  <div class="container-login100">  
    <div class="wrap-login100">
      <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
        <span class="login100-form-title bg-primary">
          Sign In
        </span>

        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
          <input class="input100" type="text" name="email" placeholder="Email">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
          <input class="input100" type="password" name="pass" placeholder="Password">
          <span class="focus-input100"></span>
        </div>
        <div class="container-login100-form-btn mt-3">
          <button class="login100-form-btn btn-primary">
            Sign in
          </button>
        </div>

        <div class="flex-col-c p-t-170 p-b-40">
          <span class="txt1 p-b-9">
            Don’t have an account?
          </span>

          <a href="reg.php" class="txt3 text-primary">
            Sign up now
          </a>
        </div>
      </form>
    </div>
  </div>
</div>



<h6 class="text-center">© Ruby Garage</h6>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
