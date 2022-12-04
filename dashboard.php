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
    <link rel="stylesheet" href="styles.css">
    <script src="login.js"></script>
    <header>
    <h3>Dolphin CRM</h3>
    <img src="dolphin.jpg" alt="dolphin">    
</head>
<body>
</header>
<div class="dashboard">
<H4>Dashboard</H4>
        <button class="Addcontact" onclick="window.location.href='AddUser.php'">
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
            $dbname = "dolphin_crm"; 
            $conn= new mysqli($host,$username,$password,$dbname);
            // $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $sql = "SELECT * FROM contacts";
            $results = $conn -> query($sql);
            while($row = $results->fetch_assoc()){
                echo "<tr>
                <td>".$row["title"] + "."+$contacts["firstname"]+ " " +$contacts["lastname"]. "</td>
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
        <div class="sidenav">
            <a href="dashboard.php">Home</a>
       		<a href="new_contact.html">New contact</a>
       		<a href="view_users.html">Users</a>
       		<a href="logout.html">logout</a>

        </div>
        
</body>

</html>