<?php
require '../model/dbConnection.php';
if (isset($_POST["walletSubmit"])) {
  $date = $_POST["date"];
  $category = $_POST["category"];
  $income =  $_POST["income"] ?? 0;
  $expense =  $_POST["expense"] ?? 0;
  $userID = $_SESSION["userid"];
  $_SESSION["walletErr"] = "";

  if (strlen($date) > 0 && strlen($category) > 0 && strlen($income) > 0 && strlen($expense) > 0) {
    $sql = $pdo->prepare("
  INSERT INTO wallet
  (
  date,
  description,
  income,
  expense,
  user_id
  )
  Values
  (
  :date,
  :description,
  :income,
  :expense,
  :user_id
  )
  ");

    $sql->bindValue(":date", $date);
    $sql->bindValue(":description", $category);
    $sql->bindValue(":income", $income);
    $sql->bindValue(":expense", $expense);
    $sql->bindValue(":user_id", $userID);
    $sql->execute();
    header("Location: /listwallet");
  } else {
    $_SESSION["walletErr"] = "Fill necessary data";
    header("Location: /wallet");
  }
} else {
  echo "ERR";
}
