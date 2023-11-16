<?php
require '../model/dbConnection.php';

$userID = $_SESSION["userid"];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST["id"];
  $sql = $pdo->prepare("
  SELECT * FROM wallet WHERE id=:id  AND user_id=:user_id");

  $sql->bindValue(":id",  $id);
  $sql->bindValue(":user_id", $userID);
  $sql->execute();
  $editLists = $sql->fetchAll(PDO::FETCH_ASSOC);

  $_SESSION["editWalletLists"] =  $editLists;
  header("Location: /editwallet");
}
