<?php
require base_path('views/header.view.php');
require base_path('views/nav.view.php');
// if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST["username"]) {
//   $username = $_POST["username"];
//   $email = $_POST["email"];
//   $pwd = $_POST["password"];
// }

if (!isset($_SESSION["username"])) {
  header("Location: /login");
} else {
  $user = $_SESSION["username"];
  header("Loaction: /home");
}

?>

<body style="background-color: #DDF7E3;">
  <div>
    <h1 class="text-center m-3">Welcome <?= $user ?> !</h1>
  </div>

</body>