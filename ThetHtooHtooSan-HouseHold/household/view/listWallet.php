<?php

require view('header.php');
require view('nav.php');
require '../controller/listWalletController.php';


if (!isset($_SESSION["username"])) {
  header("Location: /login");
} else {
  $user = $_SESSION["username"];
  header("Loaction: /listwallet");
}

?>




<div class=" container py-5 h-100">


  <div><a href="/wallet"><button type="button" class="btn btn-success">Create</button></a></div>
  <div class="row d-flex justify-content-center align-items-center m-5">


    <h3 class="header text-center text-primary">HouseHold</h3>
    <table class="table mt-5 text-center align-middle table-bordered table-hover justify-content-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Date</th>
          <th scope="col">Catagorie</th>
          <th scope="col">Income</th>
          <th scope="col">Expense</th>
          <th scope="col">Balance</th>

          <th scope="col">Action</th>

        </tr>
      </thead>

      <!-- <?php $count = ($page * $rowLimit) - ($rowLimit - 1); ?> -->

      <?php $count = 1; ?>
      <?php $balance = 0; ?>
      <?php foreach ($lists as $key => $list) : ?>
        <tbody>
          <?php if ($_SESSION["userid"] === $list['user_id']) : ?>
            <?php $balance += ($list["income"] - $list["expense"]) ?>

            <tr>
              <td><?= $count++; ?></td>
              <td><?= $list["date"] ?></td>
              <td><?= $list["description"] ?></td>
              <td><?= number_format($list["income"]) ?> Ks</td>
              <td><?= number_format($list["expense"])  ?>Ks</td>
              <td><?= number_format($balance) ?>Ks</td>

              <td>
                <form class="text-danger" action="/editwalletController" method="POST">
                  <input type="hidden" name="id" value="<?= $list["id"] ?>" />
                  <input type="hidden" name="method" value="Edit" />
                  <button type="submit" class="btn btn-link"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #076423;"></i></button>
                </form>

                <form class="text-danger" action="/deletewallerController" method="POST">
                  <input type="hidden" name="id" value="<?= $list["id"] ?>" />
                  <input type="hidden" name="method" value="delete" />
                  <button type="submit" class="btn btn-link"><i class="fa-solid fa-trash" style="color: #f50000;"></i></button>
                </form>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      <?php endforeach; ?>

    </table>

    <!--start pagination  -->
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page <= 1) : ?>
                              <?= "disabled" ?>
                          <?php endif; ?>">
          <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>


        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
          <li class="page-item 
                            <?php
                            if ($page == $i) {
                              echo "active";
                            }
                            ?>
                            "><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>


        <li class="page-item 
                        <?php if ($page >= $totalPages) {
                          echo "disabled";
                        } ?>">
          <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav> -->
    <!-- end pagination -->
  </div>


</div>

<?php require view('footer.php'); ?>