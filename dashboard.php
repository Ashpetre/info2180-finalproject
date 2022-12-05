<?php
session_start();
if (!isset($_SESSION["user"])){
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="addUser.css">
    <script src="login.js"></script>
    <header>
    <nav>
        <img src="dolphin.jpg" alt="Dolphin CRM" srcset="">
        <p>DolphinCRM</p>
    </nav>   
</head>
<aside>
            <ul>
                <a href="dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="new_contact.php"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <a href="view-users.php"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>
<body>
</header>
<div class="dashboard">
        <button class="Addcontact" onclick="window.location.href='new_contact.php'">
        + Add Contact</button>
        <div class="filter">
            <!-- filter -->
        <img src="" alt="">
        <button>All</button>
        <button>Sales Lead</button>
        <button>Support</button>
        <button>Assigned to me</button>
        </div>
        <div id=" table">
        <caption><h2> DASHBOARD </h2></caption>
        <table>
        <thead>
            <tr>
            <th id = "t1"> Name </th>
            <th id = "t2"> Email </th>
            <th id = "t3"> Company </th>
            <th id = "t4"> type </th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "schema"; 
            $conn= new mysqli($host,$username,$password,$dbname);
            // $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $sql = "SELECT * FROM contacts";
            $results = $conn -> query($sql);
            while($row = $results->fetch_assoc()){
                echo "<tr>
                <td>".$row["title"].".".$row["firstname"]." ".$row["lastname"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["company"]."</td>
                <td>".$row["type"]."</td>
                <td> <a href='views.php'> View</a></td>
                </tr>";
            }
            
            ?>
        </tbody>
        </table>
        
        </div>
</div>

</body>

</html>