<?php

if (!isset($_SESSION["username"])) {
  header("Location: /login");
}

require view('header.php');
require view('nav.php');
require '../controller/editWalletController.php';

$walletEdit = $_SESSION["editWalletLists"];


?>

<div class="d-flex justify-content-center">

  <form action="/updatewalletController" method="POST">
    <div class="row justify-content-center align-items-center m-5">
      <div class="row justify-content-center  ">
        <div class="col col-lg-auto ">
          <h3 class="m-5 title text-primary">Edit HouseHold</h3>
        </div>
      </div>


      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Date</label>
        <input id="" type="date" name="update" class="form-control" value="<?= $walletEdit[0]["date"]  ?>" id="exampleFormControlInput1" placeholder="" required>
      </div>
      <input id="" type="hidden" name="upID" class="form-control" value="<?= $walletEdit[0]["id"] ?>" id="exampleFormControlInput1" placeholder="">

      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">category</label>
        <input id="" type="text" name="upCategory" value="<?= $walletEdit[0]["description"]  ?>" class="form-control" id="exampleFormControlInput1" placeholder="" required>
      </div>
      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Today Income</label>
        <input id="" type="text" name="upIncome" class="form-control" value="<?= $walletEdit[0]["income"] ?>" id="exampleFormControlInput1" placeholder="">
      </div>
      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Today Expense</label>
        <input id="" type="text" name="upExpense" value="<?= $walletEdit[0]["expense"] ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
      </div>

      <div class="col-lg-5 col-sm-3 align-self-end">
        <a href="/listwallet"><button type="button" class="btn  col-lg-5 submit-button  col  btn-primary ">Back</button></a>
        <button class="btn float-end col-lg-5 submit-button  col btn-success " type="submit" name="walletUpdate">Update</button>
      </div>


    </div>
</div>
</form>
</div>
<?php require view('footer.php'); ?>