<?php
require(base_path('database.php'));
if (!$_SESSION["user"]) {
    header('location: /login?redirect_to=/todos');
    exit();
}

$user_id = $_SESSION['user']['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['action'] ?? '' === "DELETE") {
        $todo_id = $_POST['todo_id'];
        $delete = sprintf(
            "DELETE FROM `todos` WHERE id = '%d'",
            mysqli_real_escape_string($conn, $todo_id)
        );
        $query = mysqli_query($conn, $delete);
    } else {
        $body = $_POST['body'];
        $insert = sprintf(
            "INSERT INTO `todos` (`body`, `user_id`) VALUES ('%s', %d)",
            mysqli_real_escape_string($conn, $body),
            mysqli_real_escape_string($conn, $user_id)
        );
        $insert = "INSERT INTO `todos` (`body`, `user_id`) VALUES ('$body', $user_id)";
        $query = mysqli_query($conn, $insert);
    }
}

$query_string = sprintf(
    "SELECT * FROM todos WHERE user_id = '%d'",
    mysqli_real_escape_string($conn, $user_id)
);

$result = mysqli_query($conn, $query_string);

if (!$result) {
    die("Query to show fields from table failed!" . mysqli_error($conn));
}

?>

<?php view('header.view.php'); ?>
<?php view('nav.view.php'); ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div id="add-todo-form" class="mt-5">
            <form action="/todos" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="add-todo" name="body" placeholder="Enter your todo here">
                    <button class="btn btn-primary" name="add-todo-btn" id="add-todo-btn" type="submit">Add</button>
                </div>
            </form>
        </div>
        <!-- ./add todo -->

        <!-- todo table -->
        <table class="table border rounded mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th class="text-center" scope="col">Tasks</th>
                    <th class="text-center" scope="col">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $sno = 1;
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <th scope="row"><?php echo $sno++; ?></th>
                        <td class="text-center">
                            <div class="task-list">
                                <?php echo $row['body']; ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <form action="/todos" method="post">
                                <input type="hidden" name="todo_id" value="<?= $row['id'] ?>" />
                                <input type="hidden" name="action" value="DELETE" />
                                <button class="btn btn-danger" name="dlt-todo-btn" id="dlt-todo-btn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <!-- ./todo table -->
    </div>
</div>
<?php view('footer.view.php');
