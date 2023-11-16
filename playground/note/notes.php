<?php

$result = mysqli_query($conn, "SELECT notes.id AS note_id, notes.title AS title, notes.body as body, notes.user_id user_id, users.username, username FROM notes LEFT JOIN users ON notes.user_id =users.id");

if (!$result) {
    die("Error");
}
?>

<?php view('header.view.php', [
    "title" => "Notes",
]); ?>
<?php view('nav.view.php'); ?>
<div class="row mt-4">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none" href="/note?id=<?= $row['note_id'] ?>"><?= $row['title'] ?></a></h5>
                    <h6 class="sub-title">Author : <a class="text-decoration-none" href="/note?id=<?= $row['user_id'] ?>"><?= $row['username'] != '' ? $row['username'] : 'Unknown' ?></a></h6>
                    <p class="card-text"><?= substr(htmlentities($row['body']), 0, 200) . '...' ?><a href="/note?id=<?= $row['note_id'] ?>" class="card-link text-decoration-none"> more >></a></p>

                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php view('footer.view.php');
