<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            
            </li>
            <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Category.php">Category 1</a></li>
                <li><a class="dropdown-item" href="Category.php">Category 2</a></li>
            </li>
            </ul>
            <?php
                if($logged){         
            ?>
            <li class="nav-item">
            <a class="nav-link" href="profile.php">@<?=$_SESSION['username']?></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php
                }else{
            ?>
             <li class="nav-item">
            <a class="nav-link" href="login.php">Login | Signup</a>
            </li>
            <?php
                }
            ?>
    </div>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
    </nav>