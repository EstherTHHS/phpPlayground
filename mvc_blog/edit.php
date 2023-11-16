<?php
require('database.php');
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];

  $query = sprintf(
    "UPDATE `notes` SET `title`='%s', `body`='%s' WHERE id=%d",
    mysqli_real_escape_string($conn, $title),
    mysqli_real_escape_string($conn, $body),
    mysqli_real_escape_string($conn, $_GET['id']),
  );

  $result = mysqli_query($conn, $query);

  if (!$result) {
    $errors['body'] = "Error occurred.";
  } else {
    $message = "Note has been updated.";
  }
}
$user_id = $_SESSION['user']['id'];
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = sprintf(
    "SELECT * FROM notes WHERE id = %d AND user_id = {$user_id}",
    mysqli_real_escape_string($conn, $_GET['id'])
  );

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_assoc($result);
}

?>
<?php require('header.view.php'); ?>
<?php require('nav.view.php'); ?>
<?= $message ?? '' ?>
<?php if ($row) : ?>
  <form action="/note/edit?id=<?= $id ?>" method="POST">
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title" required value="<?= $row['title'] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Body</label>
      <textarea name="body" class="form-control" id="body" required><?= $row['body'] ?></textarea>
    </div>
    <?php if (!empty($errors)) : ?>
      <div><?= $errors['body'] ?></div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
<?php else : ?>
  Not Found
<?php endif; ?>

<?php require('footer.view.php'); ?>