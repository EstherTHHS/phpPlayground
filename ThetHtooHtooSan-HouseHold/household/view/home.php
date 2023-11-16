<?php
require view('header.php');
require view('nav.php');
require '../controller/listWalletController.php';
if (!$_SESSION["username"]) {
  header("Location: /login");
} else {
  $user =  $_SESSION["username"];
  header("Loaction: /home");
}

?>

<h1 class="text-center text-success m-5">WELCOME <?= $user ?> !</h1>

<div class="card mb-5">
  <div class="card-body">
    <h5 class="card-title">Total INCOME <i class="fa-solid fa-chart-line fa-lg" style="color: #40725b;"></i>

    </h5>
    <p class="card-text"><?= $totalIncome ?></p>
    <a href="/listwallet"><button type="button" class="btn btn-primary">Detail</button></a>
  </div>
</div>


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Total Expense <i class="fa-solid fa-chart-gantt" style="color: #40725b;"></i>

    </h5>
    <p class="card-text"><?= $totalExpense ?></p>
    <a href="/listwallet"><button type="button" class="btn btn-primary">Detail</button></a>
  </div>
</div>


<?php require view('footer.php'); ?>