<?php
session_start();
$logged = false;
if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
}

if(isset($_GET['post_id'])){
    include_once("admin/data/Post.php");
    include_once("admin/data/Comment.php");
    include_once("db_conn.php");
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostId($conn, $id);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - <?=$post['post_title']?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include 'inc/NavBar.php'; ?>

        <div class="container ms-5 mt-5">
            <section class="d-flex">
                <main class="main-blog">

                <div class="card main-blog-card mb-5">
                    <img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$post['post_title']?></h5>
                        
                        <p class="card-text"><?=$post['post_text']?></p>
                        <a href="#" class="btn btn-primary">Read more</a>
                        <hr>
                            <div class="d-flex justify-content-between">
                            <div class="react-btns">
                                <i class="fa fa-thumbs-up like" aria-hidden="true"></i> Likes (
                                <?php echo likeCountByPostId($conn, $post['post_id']); ?>
                                )
                                <i class="fa fa-comment" aria-hidden="true"></i> Comments (
                                <?php echo getCommentsByPostId($conn, $post['post_id']); ?>
                                )
                            </div>
                            <small class="text-body-secondary"><?=$post['created_at']?></small>
                        </div>
                    </div>
                    <form action="php/login.php" method="post" id="comments">
                        <h5 class="mt-4">Add Comment</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="uname">
                        </div>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                    <hr>
                    <div class="comments">
                        <?php if($comments != 0) {
                            foreach ($comments as $comment) { ?>
                            <div class="comment d-flex">
                                <div>
                                    <img src="img/user-default (1).png" width="40" height="40">   
                                </div>
                                <div class="p-2">
                                    <span>@Username</span>
                                    <p><?=$comment['comment']?></p>
                                </div>
                            </div>
                            <hr> 
                        <?php }} ?>                          
                    </div>
                </div>   
                </main>
                <aside class="aside-main">
                    <div class="list-group category-aside">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            Category
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Category 1</a>
                        <a href="#" class="list-group-item list-group-item-action">Category 2</a>
                        <a href="#" class="list-group-item list-group-item-action">Category 3</a>
                        <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
                    </div>
                </aside>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    </body>
    </html>
    <?php 
} else {
    header("Location: blog.php");
    exit;
}
?>