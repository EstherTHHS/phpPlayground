<?php

require "dbConnection.php";;
$errors = [];
//-----------POST method----------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $blogTitle = $_POST["blogTitle"];
  $blogContent = $_POST["blogContent"];

  $sql = $pdo->prepare("
    UPDATE notes SET 
    note_title=:title,
    note_body=:body
    WHERE id=:id
  ");


  $sql->bindValue(":title",  $blogTitle);
  $sql->bindValue(":body",  $blogContent);
  $sql->bindValue(":id",  $_GET['id']);

  $result = $sql->execute();
  // $result = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (empty($result)) {
    $errors['body'] = "Error occurred.";
  } else {
    $message = "Note has been updated.";
    header("Location: /notes");
  }
}






//+++++++++++ GET method ++++++++++++++
// echo $_SESSION["userid"];
$user_id = $_SESSION["userid"];
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = $pdo->prepare("
  SELECT * FROM notes WHERE id=:id AND user_id=:userID
  ");
  $sql->bindValue(":id", $id);
  $sql->bindValue(":userID", $user_id);
  $sql->execute();
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>";
  // print_r($result);
}
?>

<?php require 'views/header.view.php'; ?>
<?php require 'views/nav.view.php'; ?>


<body>
  <section class="vh-100" style="background-color: #DDF7E3;">
    <div class=" container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5" style="background-color: #fff;">
          <?php $message ?? "" ?>
          <?php if ($result) : ?>

            <form class="form p-5" action="/noteEdit?id=<?= $id  ?>" method="POST">
              <div class="row mb-4">
                <div class="col">
                  <input type="hidden" name="blogId" value="<?= $result[0]['id'] ?>">
                  <div class="form-outline">
                    <label for="exampleFormControlInput1" class="form-label text-success">Blog Title</label>
                    <input type="text" name="blogTitle" id="exampleFormControlInput1" class="form-control" value="<?= $result[0]['note_title'] ?>" />

                  </div>
                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="blogContent">Blog Content</label>
                    <textarea class="form-control" name="blogContent" id="blogContent" rows="10">
                     <?= $result[0]['note_body'] ?>
                </textarea>
                  </div>
                </div>
              </div>
              <?php if (!empty($errors)) : ?>
                <div><?= $errors['body'] ?></div>
              <?php endif; ?>
              <button class=" btn btn-success btn-block mb-4" type="submit" name="updateBlog">Update</button>
              <a href="/notes"> <input type="button" value="Back" class="btn btn-primary btn-block "></a>

            </form>
          <?php else : ?>
            Not Found
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>





</body>