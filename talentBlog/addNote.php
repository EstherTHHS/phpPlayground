<?php

require base_path('dbConnection.php');


$user = $_SESSION["username"];
$currentUserID = $_SESSION["userid"];
if (!isset($_SESSION["username"])) {
  header("Location: /login");
} else {
  if (isset($_POST["addBlog"])) {

    $blogTitle = $_POST["title"];
    $blogBody = $_POST["blog"];
    if (!strlen($blogTitle) > 0 && !strlen($blogBody) > 0) {

      echo '<script>alert("Add Blog is required!")</script>';
    } else {
      $sql = $pdo->prepare("
      INSERT INTO notes 
      (
       note_title,
       note_body,
       user_id
      )
      VALUES
      (
        :note_title,
        :note_body,
        :user_id
      )
      
      ");

      $sql->bindValue(":note_title",  $blogTitle);
      $sql->bindValue(":note_body", $blogBody);
      $sql->bindValue(":user_id", $currentUserID);
      $sql->execute();
      header("Location: /notes");
    }
  }
}


?>

<?php require base_path('views/header.view.php') ?>
<?php require base_path('views/nav.view.php') ?>

<body>
  <section class="vh-100" style="background-color: #DDF7E3;">
    <div class=" container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label text-success">Blog Title</label>
                  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="blogTitle">

                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label text-success">Blog Body</label>
                  <textarea class="form-control" name="blog" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <!-- Submit button -->
                <button type="submit" name="addBlog" class="btn btn-success btn-block mb-4">Create</button>
                <a href="/notes" class="btn btn-primary btn-block mb-4">BACK</a>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




</body>

</html>