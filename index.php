<?php
  require 'config.php';
  if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM user WHERE `id` = $id");
    $row = mysqli_fetch_assoc($result);
  } else {
    header("location: login.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $row["username"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>