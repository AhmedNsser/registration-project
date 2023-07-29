<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("location: index.php");
  }
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $cred_card = $_POST["cred_card"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $select = "SELECT * FROM user WHERE username = '$username' OR birthday = '$birthday' OR address = '$address' OR cred_card = '$cred_card' OR email = '$email'"; 
    $duplicate = mysqli_query($conn,$select );
    if(mysqli_num_rows($duplicate) > 0 ) {
        echo "<script> alert('Not truro'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO `user`(`username`, `birthday`, `address`, `cred_card`, `email`, `pssword`) VALUES
             ("."'$username' , "."'$birthday', "."'$address' , "."'$cred_card' , "."'$email', "."'$password')";
            mysqli_query($conn,$query);
            echo "<script> alert('truro'); </script>";
        }else {
        echo "<script> alert('the password Not truro'); </script>";
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
    </head>
    <body>
        <h2>Registration</h2>
        <form action="" method="post" autocomplete="off">
        <!-- username -->
            <label for="username">User Name : </label>
            <input type="text" name="username" id = " username " required value=""> <br>
        <!-- birthday -->
            <label for="birthday">birthday</label>
            <input placeholder="Select date" type="date" name="birthday" id="birthday" required ><br>
        <!-- Address -->
            <label for="address">Address : </label>
            <input type="text" name="address" id = "address" required value=""> <br>
        <!-- Cred Card -->
            <label for="cred_card">Cred Card : </label>
            <input type="number" name="cred_card" id ="cred_card" required value="111-1111-1111-111"> <br>
        <!-- email -->
            <label for="email">Email : </label>
            <input type="email" name="email" id = "email" required value=""> <br>
        <!-- Password -->
            <label for="password">Password : </label>
            <input type="password" name="password" id = "password" required value=""> <br>
        <!-- confirmpassword -->
            <label for="confirmpassword">Confirm Password : </label>
            <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
        <!-- submit -->
            <button type="submit" name="submit">Registration</button>
    </form> <br>
        <a href="login.php">Login</a>
    </body>
</html>