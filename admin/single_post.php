<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])  && isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $post = getById($conn, $post_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - <?= htmlspecialchars($post['post_title']) ?></title>
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

    ?>
    <div class="main-table">

        <div class="card main-blog-card mb-5">
                <img src="../upload/blog/<?=$post['cover_url'] ?>"class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$post['post_title'] ?></h5>
                    <?=$post['post_text'] ?>
                    <p class="card-text"> 
                        <small class="text-body-secondary"><?=$post['created_at'] ?></small>
                    <a href="#" class="btn btn-primary">Read more</a>
                </div>
                </div>
                <div class="card main-blog-card mb-5">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Blog title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text"> 
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    <a href="#" class="btn btn-primary">Read more</a>
         </div>
    
        
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