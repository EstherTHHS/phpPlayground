<?php
require '../model/dbConnection.php';




$result = false;
if (isset($_POST["username"]) && isset($_POST["email"])  && isset($_POST["password"]) && isset($_POST["login"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $pwd = $_POST["password"];


  $_SESSION["errMsg1"] = "";
  $_SESSION["errMsg2"] = "";
  $_SESSION["errMsg3"] = "";

  if (strlen($username) > 0 && strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($pwd) > 0) {

    $sql = $pdo->prepare("
    SELECT * FROM user WHERE 
    user_name=:username AND email=:email
    ");
    $sql->bindValue(":username", $username);
    $sql->bindValue(":email", $email);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
      if (password_verify($pwd, $result[0]['pwd'])) {

        // login([
        //   'userid' => $result[0]['id'],
        //   "username" => $username,
        //   "email" => $email
        // ]);

        $_SESSION["userid"] = $result[0]['id'];
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        header("Location: /");
      } else {
        $_SESSION["errMsg1"] = "Password isn't valid";
        header("Location: /login");
      }
    } else {
      $_SESSION["errMsg2"] = "Invalid Email and Password";
      header("Location: /login");
    }
  } else {


    $_SESSION["errMsg3"] = "Require Username ,Email and Password";
    header("Location: /login");
  }
} else {
  echo "ERR";
}
