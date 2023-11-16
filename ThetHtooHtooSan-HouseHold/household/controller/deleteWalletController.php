<?php

require "../model/dbConnection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST["id"];
  $sql = $pdo->prepare("
UPDATE wallet SET del_flg=1
WHERE id=:id
");
  $sql->bindValue(":id", $id);
  $sql->execute();

  header("Location: /listwallet");
}
