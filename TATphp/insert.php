<?php
if (!isset($_SESSION['user'])) {

  header('location: /');
  exit();
} else {

  $user_id = $_SESSION['user']['id'];
  $balance;
  $nameErr = "";

  if (isset($_POST['date']) && isset($_POST['description']) && isset($_POST['income']) && isset($_POST['expense'])) {
    $date = $_POST['date'];
    $description = $_POST['description'];
    $income = $_POST['income'];
    $expense = $_POST['expense'];

    $query = "Select * from expense Where user_id={$user_id}";
    $result = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
      $balance = $rows['balance'];
    }


    $balance += $income - $expense;

    $query = "INSERT INTO expense (date,description,income,expense,balance,user_id) VALUES ('$date','$description','$income','$expense','$balance','$user_id')";
    $result = mysqli_query($conn, $query);


    if ($result) {
      header('location: display');
      //echo " Data inserted successsfully";

    } else {
      echo "Data insert not successful";
    }
  }
}
