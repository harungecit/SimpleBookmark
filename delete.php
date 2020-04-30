<?php
include ("inc/connection.php");
$query = $conn->prepare("DELETE FROM bookmark WHERE id = :id");
$delete = $query->execute(array('id' => $_GET['id']));
header("Location: bookmark.php");
?>