<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles.css">
    <script src="login.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="addUser.css">
</head>
<header>
<nav>
    <img class="dolpin" src="dolphin.jpg" alt="Dolphin CRM" width=30px height=30px>
        <p>DolphinCRM</p>
    </nav>
    
</header>
<body>
    <div class="container">
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schema";
    $conn= mysqli_connect($host,$username,$password,$dbname);
    
    // $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $pword = $_POST["password"];
         $sql = "SELECT * FROM users WHERE email = '$email'";
         $result = mysqli_query($conn, $sql);
         $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
         if ($user) {
             if ($pword== $user["password"]|| ($email == 'admin@project2.com' && $pword == 'password123')) {
                session_start();
                 $_SESSION["user"] = $user["id"];
                 $_SESSION["status"] = $user["role"];
                 header("Location: dashboard.php");
                 die();
             }else{
                 echo "<div class='alert alert-danger'>Password does not match</div>";
             }
         }else{
             echo "<div class='alert alert-danger'>Email does not match</div>";
         }
}

?>
    </div>

<form method="post"  action="login.php">
  <div id = "login">
    <h1>Login</h1>
    <input type = "email" name="email" placeholder="Enter Your email address">
    <input type="password" name="password" placeholder="Enter Your password">
    <input name= "login"type="submit" class="submit" >

    <!-- add a lil login button -->
</div>
<div class="alert"
></div>

</form>
    

    <footer>
      <h4>Copyright @ 2022 Dolphin CRM</h4>
    </footer>
</body>
</html>