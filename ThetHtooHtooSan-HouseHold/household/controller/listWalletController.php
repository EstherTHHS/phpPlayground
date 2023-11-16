<?php
require "../model/dbConnection.php";
// $rowLimit = 2;
// $page = (isset($_GET["page"])) ? $_GET["page"] : 1;
// $startPage = ($page - 1) * $rowLimit;

$userID = $_SESSION["userid"];
$sql = $pdo->prepare("
SELECT * FROM wallet WHERE del_flg=0 AND user_id=:user_id;");

$sql->bindValue(":user_id", $userID);
$sql->execute();
$lists = $sql->fetchAll(PDO::FETCH_ASSOC);

// SELECT * FROM wallet WHERE del_flg=0 AND user_id=:user_id LIMIT 
// $startPage,$rowLimit;
//for pagination
// $sql = $pdo->prepare("
// SELECT count(id) AS total FROM wallet WHERE del_flg=0;
// ");

// $sql->execute();
// $totalList = $sql->fetchAll(PDO::FETCH_ASSOC)[0]['total'];

// $totalPages = ceil($totalList / $rowLimit);


//for income 
$sql = $pdo->prepare("
SELECT SUM(income) AS  totalIncome FROM wallet WHERE del_flg=0 AND user_id=:userID;
");

$sql->bindValue(":userID", $userID);
$sql->execute();
$totalIncome = $sql->fetchAll(PDO::FETCH_ASSOC)[0]['totalIncome'];

//for expense 
$sql = $pdo->prepare("
SELECT SUM(expense) AS  totalExpense FROM wallet WHERE del_flg=0 AND user_id=:userID;
");

$sql->bindValue(":userID", $userID);
$sql->execute();
$totalExpense = $sql->fetchAll(PDO::FETCH_ASSOC)[0]['totalExpense'];
