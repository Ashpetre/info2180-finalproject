<?php
session_start();
if (!isset($_SESSION["user"])){
   
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
    
    <img class="dolpin" src="dolphin.jpg" alt="Dolphin CRM" width=30px height=30px>
        <p>DolphinCRM</p>
    
    </nav>   
</head>
<aside>
            <ul>
                <a href="dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="new_contact.php"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <?php
                 if($_SESSION["status"] == "Admin")
                   echo "<a href='view-users.php'><li><i class='material-icons'>people_outline</i>Users</li></a>";
                ?>
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
                <img src="filter.png" alt="">
                <span>
                    <a href="dashboard.php">All</a>
                </span>
                <span>
                    <a href="dashboard.php?query=Sales Lead" >Sales Lead</a>
                </span>
                <span>
                <a href="dashboard.php?query=Support">Support</a>
                </span>
                <span>
                <a href="dashboard.php?query=Support">Assigned to me</a>
                </span>
 </div>
        <div id=" table">
        <caption><h2> DASHBOARD </h2></caption>
        <table>
        <thead>
            <tr>
            <th id = "t1"> Name </th>
            <th id = "t2"> Email </th>
            <th id = "t3"> Company </th>
            <th id = "t4"> Type </th>
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
            
            if(!isset($_GET['fetch'])){
                if(!isset($_GET['query'])){
                    $sql = "SELECT * FROM contacts";
                } else {
                    $filter = $_GET['query'];
                    $sql = "SELECT * FROM contacts WHERE type='$filter'";   
                }
                $results = $conn -> query($sql);
                
            } else {
                $sql = "SELECT * FROM contacts WHERE assigned_to='$user'";   
                $results = $conn -> query($sql);
            }
            while($row = $results->fetch_assoc()){
                echo "<tr>
                <td>".$row["title"]."".$row["firstname"]." ".$row["lastname"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["company"]."</td>
                <td>".$row["type"]."</td>
                <td><a href='view.php?id=$row[id]'class = 'btn btn-primary'>VIEW</a></td>
                </tr>";
            }
            
            ?>
            
        </tbody>
        </table>
        
        </div>
</div>

</body>

</html>