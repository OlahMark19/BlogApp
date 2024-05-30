<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if(isset($_POST['title']) && 
    isset($_FILES['cover']) && 
    isset($_POST['text'])){

    

    }else{
        header("Location: ../post-add.php");
        exit;
    }

} else {
    header("Location: ../admin-login.php");
    exit;
}
?>