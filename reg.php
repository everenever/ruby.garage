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

<!-- ------------------ Reg ---------------------------- -->


<?php 

if (isset($_POST["regemail"]) && isset($_POST["regpass"]) 
  && isset($_POST["regrepass"]) && $_POST["regemail"] != ""  
  && $_POST["regpass"] != "" && $_POST["regrepass"] != ""
  && $_POST["regpass"] == $_POST["regrepass"]) {
  $reg_pass = md5($_POST['regpass']);

  $sql = "INSERT INTO users (email, password) VALUES ('" . $_POST["regemail"] . "', '" . $reg_pass . "')"; 
  $result = mysqli_query($connect, $sql);
  $alert = "Пользователь успешно добавлен!";
  echo "<script type='text/javascript'>alert('$alert');</script>";
  header("Location: /");
}


?>



<div class="limiter">
  <div class="container-login100">  
    <div class="wrap-login100">
      <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
        <span class="login100-form-title bg-primary">
          Sign Up
        </span>

        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
          <input class="input100" type="text" name="regemail" placeholder="Email">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
          <input class="input100" type="password" name="regpass" placeholder="Password">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input mt-3" data-validate = "Please repeat password">
          <input class="input100" type="password" name="regrepass" placeholder="Repeat password">
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn mt-3">
          <button class="login100-form-btn btn-primary">
            Sign up
          </button>
        </div>

        <div class="flex-col-c p-t-170 p-b-40">
          <span class="txt1 p-b-9">
            Already have an account?
          </span>

          <a href="log.php" class="txt3 text-primary">
            Sign in now
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

