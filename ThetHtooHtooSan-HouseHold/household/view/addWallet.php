<?php
require view('header.php');
require view('nav.php');
if (!isset($_SESSION["username"])) {
  header("Location: /login");
}

?>

<div class="d-flex justify-content-center">
  <form action="/addwalletController" method="POST">
    <div class="row justify-content-center align-items-center m-5">
      <div class="row justify-content-center  ">
        <div class="col col-lg-auto ">
          <h3 class="m-5 title text-primary">ADD HouseHold</h3>
        </div>
      </div>


      <?php if (isset($_SESSION["walletErr"])) : ?>
        <?php if ($_SESSION["walletErr"] === "Fill necessary data") : ?>
          <h5 class="text-danger text-center"><?= $_SESSION["walletErr"]  ?> </h5>
        <?php endif; ?>
        <?php $_SESSION["walletErr"]  = null; ?>

      <?php endif; ?>

      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Date</label>
        <input id="" type="date" name="date" class="form-control" id="exampleFormControlInput1" placeholder="">
      </div>
      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">category</label>
        <input id="" type="text" name="category" class="form-control" id="exampleFormControlInput1" placeholder="">
      </div>
      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Today Income</label>
        <input id="" type="text" name="income" class="form-control" id="exampleFormControlInput1" placeholder="0000">
      </div>
      <div class="col-lg-5 col-sm-3 mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Today Expense</label>
        <input id="" type="text" name="expense" class="form-control" id="exampleFormControlInput1" placeholder="0000">
      </div>

      <div class="col-lg-5 col-sm-3 align-self-end">
        <a href="/listwallet"><button type="button" class="btn  col-lg-5 submit-button  col  btn-primary ">Back</button></a>
        <button class="btn  col-lg-5 submit-button float-end col  btn-success " type="submit" name="walletSubmit">Submit</button>
      </div>


    </div>
  </form>

</div>
<?php require view('footer.php'); ?>