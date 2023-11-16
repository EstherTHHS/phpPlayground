<?php
require('dbConnection.php');
if (!isset($_SESSION["username"])) {
  header("Location: /login");
} else {
  $sql = $pdo->prepare("
  SELECT * FROM notes
    LEFT JOIN users
    ON notes.user_id=users.id WHERE  notes.del_flg=0 ;
  ");

  $sql->execute();
  $noteLists = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php require base_path('views/header.view.php') ?>
<?php require base_path('views/nav.view.php') ?>

<body style="background-color: #DDF7E3;">



  <section class="vh-100">

    <div class="ms-5 me-5 mt-3 ">
      <a href="/addnote" class="btn btn-success">Create BLog</a>
    </div>

    <?php foreach ($noteLists  as $note) : ?>

      <div class="card ms-5 me-5 mt-3">

        <div class="card-body">
          <a href="note?id=<?= $note["id"] ?>">
            <h4 class="card-title text-decoration-underline"> <?= $note["note_title"] ?>
            </h4>

            <span> Author:<?= $note["username"] ?></span>

          </a>
          <p class="card-text"><?= substr(htmlentities($note["note_body"]), 0, 100)  ?></p>

          <a href="note?id=<?= $note["id"] ?>" class="btn btn-primary">Read More...</a>
          <?php if ($_SESSION["userid"] === $note['user_id']) : ?>
            <a href="/noteEdit?id=<?= $note["id"] ?>" class="btn btn-primary">Edit</a>
            <a href="/deleteNote?id=<?= $note["id"] ?>" class="btn btn-danger">Delete</a>
          <?php endif; ?>
        </div>
      </div>


    <?php endforeach; ?>



  </section>

</body>

</html>