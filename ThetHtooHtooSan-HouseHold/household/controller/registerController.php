<?php

require '../model/dbConnection.php';

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["pwd"]) && isset($_POST["confirmPwd"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $confirmPwd = $_POST["confirmPwd"];
  $_SESSION["regErr1"] = "";
  $_SESSION["regErr2"] = "";
  $_SESSION["regErr3"] = "";


  if (strlen($username) > 0 && strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($pwd) > 0 && strlen($confirmPwd)) {
    if ($pwd !==   $confirmPwd) {
      $_SESSION["regErr3"] = "Password doesn't match";
      header("Location: /register");
    } else {

      $sql = $pdo->prepare("
      SELECT * FROM user WHERE 
      email=:email
      ");
      $sql->bindValue(":email",  $email);
      $sql->execute();
      $result = $sql->fetchAll(PDO::FETCH_ASSOC);
      if (count($result) == 0) {
        $sql = $pdo->prepare("
          INSERT INTO user
          (
            user_name,
            email,
            pwd,
            con_pwd
          ) 
          Values
          (
            :username,
            :email,
            :pwd,
            :conpwd
          )
        
      ");

        $sql->bindValue(":username", $username);
        $sql->bindValue(":email",  $email);

        $sql->bindValue(":pwd", password_hash($pwd, PASSWORD_DEFAULT));
        $sql->bindValue(":conpwd", password_hash($confirmPwd, PASSWORD_DEFAULT));

        $sql->execute();
        header("Location: /");
      } else {
        $_SESSION["regErr2"] = "Email is already registered";
        header("Location: /register");
      }
    }
  } else {
    $_SESSION["regErr1"] = "Require username,email and password";
    header("Location: /register");
  }
} else {
  echo "err";
}
