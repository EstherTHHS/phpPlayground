<?php

require base_path('dbConnection.php');
require base_path('views/header.view.php');
require base_path('views/nav.view.php');

$user = $_SESSION["username"];
$currentUserId = $_SESSION["userid"];
if (!isset($_SESSION["username"])) {
  header("Location: /login");
} else {
  if (isset($_POST["addbtn"])) {
    $mydesc = $_POST["mydesc"];
    if (!strlen($mydesc) > 0) {

      echo '<script>alert("Add new todo is required")</script>';
    } else {
      $sql = $pdo->prepare("
      INSERT INTO todo 
      (
        description,
        user_id
      )
      VALUES
      (
        :description,
        :user_id
      )
      
      ");

      $sql->bindValue(":description",  $mydesc);
      $sql->bindValue(":user_id", $currentUserId);
      $sql->execute();
      header("Location: /todo");
    }
  }




  $sql = $pdo->prepare("
    SELECT * FROM todo WHERE del_flg=0;
");

  $sql->execute();
  $lists = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<link rel="stylesheet" href="todoStyle.css">
<section class="vh-100" style="background-color: #DDF7E3;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
          <div class="card-body py-4 px-4 px-md-5">

            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
              <i class="fas fa-check-square me-1"></i>
              What's on your mind, <?= $user ?>?
            </p>

            <div class="pb-2">
              <div class="card">
                <div class="card-body">
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="d-flex flex-row align-items-center">
                      <input type="text" name="mydesc" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Add new...">

                      <div class="m-3">
                        <input type="submit" name="addbtn" class="btn btn-primary" id="exampleFormControlInput1" value="ADD">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <?php $count = 1 ?>
            <?php foreach ($lists as $list) : ?>
              <?php if ($_SESSION["userid"] === $list['user_id']) : ?>
                <ul class="list-group list-group-horizontal rounded-0 bg-transparent">
                  <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">


                    <p><?= $count++ ?></p>

                  </li>

                  <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">

                    <p class="lead fw-normal mb-0">
                      <?= $list["description"]  ?>
                  </li>


                  <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                    <div class="d-flex flex-row justify-content-end mb-1">

                      <a href="/editTodo?id=<?= $list["id"] ?>" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                      <a href="/deleteTodo?id=<?= $list["id"] ?>" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo"><i class="fas fa-trash-alt"></i></a>

                    </div>
                    <div class="text-end text-muted">
                      <a href="" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
                        <p class="small mb-0"><i class="fas fa-info-circle me-2"></i><?= $list["created_date"] ?></p>
                      </a>
                    </div>
                  </li>

                </ul>
              <?php endif; ?>
            <?php endforeach ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>