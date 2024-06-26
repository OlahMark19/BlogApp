<?php

//Get All Users

function getAllComment($conn){
    $sql = "SELECT * FROM comment";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
    }else{
        return 0;
    }

}

function getCommentById($conn, $id){
    $sql = "SELECT * FROM comment WHERE comment_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetch();
        return $data;
    }else{
        return 0;
    }

}
function CountByPostId($conn, $id){
    $sql = "SELECT * FROM comment WHERE post_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();

}

function getCommentsByPostId($conn, $id){
    $sql = "SELECT * FROM post_like WHERE post_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
    }else{
        return 0;
    }
}
function likeCountByPostId($conn, $id){
    $sql = "SELECT * FROM comment WHERE post_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();

}

//Delete by ID

function deleteCommentById($conn, $id){
    $sql = "DELETE FROM comment WHERE comment_id=? ";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if($res){
        return 1;
    }else{
        return 0;
    }


}
