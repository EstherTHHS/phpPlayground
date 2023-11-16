<?php
require "../model/dbConnection.php";
if (isset($_POST["walletUpdate"])) {

  $upDate = $_POST["update"];
  $upCategory = $_POST["upCategory"];
  $upIncome = $_POST["upIncome"] ?? 0;
  $upExpense = $_POST["upExpense"] ?? 0;

  $userID = $_SESSION["userid"];
  $upid = $_POST["upID"];
  $sql = $pdo->prepare("
  UPDATE wallet SET
  date=:date,
  description=:description,
  income=:income,
  expense=:expense,
  user_id=:userid 
  WHERE id=:id
  ");
  $sql->bindValue(":date", $upDate);
  $sql->bindValue(":description", $upCategory);
  $sql->bindValue(":income", $upIncome);
  $sql->bindValue(":expense", $upExpense);
  $sql->bindValue(":userid", $userID);
  $sql->bindValue(":id", $upid);
  $sql->execute();

  header("Location: /listwallet");
} else {
  echo "ERR";
}
