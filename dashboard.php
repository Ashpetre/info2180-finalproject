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
</head>
<body>
    <header>
        <H4>Dashboard</H4>
        <button id="Addcontact">+ Add Contact</button>
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
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'schema'; 
            $conn= new mysqli($host,$username,$password,$dbname);
            $sql = "SELECT * FROM contacts";
            $results = $conn -> query($sql);
            while($row = $results->fetch_assoc()){
                echo "<tr>
                <td>".$row["title"] + "."+$contacts["firstname"]+ " " +$contacts["lastname"]. "</td>
                <td>".$row["email"]."</td>
                <td>".$row["company"]."</td>
                <td>".$row["type"]."</td>
                <td> <a href='view-users.php'> View</a></td>
                </tr>";
            }
            
            ?>
        </tbody>
        </table>
        
        </div>

        <div class="sidenav">
            <button>Home</button>
            <button>New Contact</button>
            <button>Users</button>
            <button>Logout</button>

        </div>
        
    </header>
</body>

</html>