<?php
    include_once('koneksi.php');
    session_start();
    $username = $_SESSION['username'];
    $caption = $_POST['caption'];
    //get file
    $target = "upload/";
    $nama_file = $_FILES["file-upload"]["name"];
    var_dump($nama_file);
    //move to upload/ folder
    $upload = move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target.$nama_file);

    $query = "INSERT INTO photo (username,url,caption,likes) values
              ('$username','$nama_file','$caption',0)";

    $result = $conn->query($query);
    // var_dump($query);
    // var_dump($result);
    $conn->close(); 
    header("location: feed.php");
?>