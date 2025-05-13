<?php ini_set('display_errors', 1); error_reporting(E_ALL); ?>
<?php include('includes/db_connect.inc'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GAMESRUS – Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Ysabeau+SC&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/main.js" defer></script>
</head>
<body>
  <div id="wrapper">
    <header>
      <?php include('includes/nav.inc'); ?>
      <input type="search" placeholder="Search..." />
    </header>

