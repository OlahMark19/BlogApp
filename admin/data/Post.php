<?php

//Get All Users

function getAll($conn){
    $sql = "SELECT * FROM post";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
    }else{
        return 0;
    }

}

//Delete by ID

function deleteById($conn, $id){
    $sql = "DELETE FROM post WHERE post_id=? ";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if($res){
        return 1;
    }else{
        return 0;
    }


}
