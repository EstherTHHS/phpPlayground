<?php
require('dbConnection.php');


require base_path('views/header.view.php');

require base_path('views/nav.view.php');

$result = false;
$errors = [];
if (isset($_GET["id"])) {
  $detailId = $_GET["id"];

  // $query = "SELECT * FROM notes WHERE  id=$detailId";
  // sprintf();mysqli real escape string
  //to escape sqlinjection
  //SELECT * FROM notes WHERE  id=$detailId drop-table;--abc >>>>SQlinjection
  $sql = $pdo->prepare("SELECT * FROM notes WHERE id=:id");

  $sql->bindValue(":id", $detailId);
  $sql->execute();
  $resDeatials = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (!$result) {
    $errors["body"] = " 404 not found ";
  }
}

?>



<body style="background-color: #DDF7E3;">


  <?php foreach ($resDeatials as $detail) : ?>
    <div class="con mx-5">
      <h4 class="blogTitle my-5 text-center text-uppercase  fw-bold"><?= $detail["note_title"] ?></h4>



      <div class="col text-center ">Last Updated: <span class="fw-bold"><?= $detail["updated_date"] ?></span></div>

      <div class="row m-5 lh-lg">
        <div class="col-md-10 mx-auto ">
          <?= htmlentities($detail["note_body"]) ?>

        </div>
      </div>
    </div>

  <?php endforeach; ?>
</body>