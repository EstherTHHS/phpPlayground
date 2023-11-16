<?php
require 'dbConnection.php';
$errors = [];
//-----------POST method----------------
if (isset($_POST["update"])) {
  $updesc = $_POST["mydesc"];
  $upID = $_POST["editId"];

  $sql = $pdo->prepare("
    UPDATE todo SET  description=:note WHERE id=:id
  ");


  $sql->bindValue(":note", $updesc);
  $sql->bindValue(":id",   $upID);

  $result = $sql->execute();
  if (empty($result)) {
    $errors['body'] = "Error occurred.";
  } else {
    $message = "Note has been updated.";
    header("Location: /todo");
  }
}




//+++++++++++ GET method ++++++++++++++

$user_id = $_SESSION["userid"];
if ($_GET["id"]) {

  $id = $_GET["id"];
  // echo $id;

  $sql = $pdo->prepare("
  SELECT * FROM todo WHERE id=:id  AND user_id=:userID
  ");
  $sql->bindValue(":id", $id);
  $sql->bindValue(":userID", $user_id);
  $sql->execute();
  $todo = $sql->fetchAll(PDO::FETCH_ASSOC);

  // $_SESSION["todoList"] = $todo;

  // echo "<pre>";
  // print_r($todo);
}

?>

<?php require base_path('views/header.view.php') ?>
<?php require base_path('views/nav.view.php') ?>

<body class="container-fluid col-11" style="background-color: #DDF7E3;">
  <?php $message ?? "" ?>
  <?php if ($todo) : ?>
    <h2 class="m-3">Edit To Do</h2>
    <form action="" method="POST">
      <div class="d-flex flex-row align-items-center">
        <input type="text" value="<?= $todo[0]["description"]  ?>" name="mydesc" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Add new...">
        <input type="text" hidden name="editId" id="" value="<?= $todo[0]["id"] ?>">
        <div class="m-3">
          <input type="submit" name="update" class="btn btn-success mb-4" id="exampleFormControlInput1" value="UPDATE">
          <a href="/todo" class="btn btn-primary btn-block mb-4">BACK</a>
        </div>
      </div>
    </form>
  <?php else : ?>
    Not Found
  <?php endif; ?>

</body>