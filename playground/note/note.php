<?php

$result = false;
$errors = [];
if (isset($_GET['id'])) {
    $query = sprintf(
        "SELECT * FROM notes WHERE id = %d",
        mysqli_real_escape_string($conn, $_GET['id'])
    );

    $result = mysqli_query($conn, $query);
}

?>

<?php view('header.view.php'); ?>
<?php view('nav.view.php'); ?>
<div class="row mt-4">

    <?php if ($result && mysqli_num_rows($result) > 0) : ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-sm-6 mb-4">
                <div>
                    <h5 class="card-title"><?= $row['title'] ?></h2>
                        <p class="card-text"><?= htmlentities($row['body']) ?></p>
                        <?php if ($_SESSION['user']['id'] ?? 0 === $row['user_id']) : ?>
                            <span><a href="/note/edit?id=<?= $row['id'] ?>" class="card-link text-decoration-none">Edit</a></span> |
                            <form class="text-danger" action="/note/destroy" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>
                        <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <h2>404 Not Found.</h2>
    <?php endif; ?>

</div>
<?php view('footer.view.php'); ?>