<?php

require 'dbConnection.php';

if (isset($_POST["update"])) {
  $updesc = $_POST["mydesc"];
  $upID = $_POST["editId"];

  $sql = $pdo->prepare("
    UPDATE todo SET  description=:note WHERE id=:id
  ");


  $sql->bindValue(":note", $updesc);
  $sql->bindValue(":id",   $upID);

  $result = $sql->execute();
  if (empty($result)) {
    $errors['body'] = "Error occurred.";
  } else {
    $message = "Note has been updated.";
    header("Location: /todo");
  }
} else {
  echo "err";
}
