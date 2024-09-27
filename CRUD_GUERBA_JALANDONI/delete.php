<?php
include 'conn.php';

if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];

    $sql = "DELETE FROM `crud` WHERE crud_id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: index.php');
    }else{
        die("Connection Failed: " . mysqli_connect_error($conn));
    }
}
?>