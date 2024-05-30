<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    $key = "hhdsfs1263z";
    include "inc/side-nav.php";
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $posts = getAll($conn);
    ?>
    <div class="main-table">
        <h3 class="mb-3">All Posts <a href="post-add.php" class="btn btn-success">Add New</a></h3>
        
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-warning"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php } ?>
        
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
        <?php } ?>
        
        <table class="table t1 table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($posts)) { ?>
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <th scope="row"><?= $post['post_id'] ?></th>
                            <td><?= htmlspecialchars($post['post_title']) ?></td>
                            <td><?= htmlspecialchars($post['post_text']) ?></td>
                            <td>
                                <a href="post-delete.php?post_id=<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">Empty!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        var navList = document.getElementById('navList').children;
        navList.item(1).classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php 
} else {
    header("Location: ../admin-login.php");
    exit;
}
?>