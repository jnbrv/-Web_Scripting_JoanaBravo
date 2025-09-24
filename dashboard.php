<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background: #760216;
      color: #fff;
      padding: 15px;
      text-align: right;
    }
    .navbar a {
      color: #fff;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
    }
    .container {
      text-align: center;
      margin-top: 100px;
    }
    h1 {
      color: #333;
    }
    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #27ae60;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
    }
    .btn:hover {
      background: #219150;
    }
  </style>
</head>
<body>

  <div class="navbar">
    Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>
    <a href="logout.php">Logout</a>
  </div>

  <div class="c
