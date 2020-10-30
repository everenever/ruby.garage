<?php
// --------------- Проверка для страницы входа ---------------------
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

// ------------------- Проверка для страницы регистрации -------------------
if (isset($_POST["regemail"]) && isset($_POST["regpass"]) 
  && isset($_POST["regrepass"]) && $_POST["regemail"] != ""  
  && $_POST["regpass"] != "" && $_POST["regrepass"] != ""
  && $_POST["regpass"] == $_POST["regrepass"]) {

  $reg_pass = md5($_POST['regpass']);

  $sql = "INSERT INTO users (email, password) VALUES ('" . $_POST["regemail"] . "', '" . $reg_pass . "')"; 
  $result = mysqli_query($connect, $sql);
  $alert = "Пользователь успешно добавлен!";
  echo "<script type='text/javascript'>alert('$alert');</script>";

}
?>