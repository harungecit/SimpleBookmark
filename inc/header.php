<?php
ob_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>PHP CRUD Functions Bookmark Application</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type = "text/javascript" src="../js/materialize.min.js"></script>
	<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>  
</head>
<body>
  <nav class="red darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Bookmark</a>
      <ul class="right hide-on-med-and-down">
      <li><a href="bookmark.php"><i class="material-icons">bookmark</i> Bookmark</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="bookmark.php"><i class="material-icons">bookmark</i> Bookmark</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>