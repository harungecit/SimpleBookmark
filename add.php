<?php
include ("inc/connection.php");
$user_id = $_POST['user_id'];
$title = $_POST['title'];
$url = $_POST['url'];
$note = $_POST['note'];

$sql = $conn->prepare('INSERT INTO bookmark (title,url,note,owner) VALUES (?,?,?,?)');
$add = $sql->execute(array($title,$url,$note,$user_id));

header("Location: bookmark.php?action=Success"); 
?>