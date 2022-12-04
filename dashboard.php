<?php
session_start();
if (!isset($_SESSION["user"])){
    header("Location: dashboard.php");
}
?>
<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'schema'; 
    $conn= mysqli_connect($host,$username,$password,$dbname);
    // $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $contacts = filter_input(INPUT_GET, "contacts", FILTER_SANITIZE_STRING);
    $contacts = $conn -> query("SELECT * FROM contacts");
    $results = $contacts -> fetchAll(PDO::FETCH_ASSOC);
?>
    <?php if (isset($context)):?>
        <div class ="table">
        <caption><h2> DASHBOARD </h2></caption>
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
            <?php foreach ($results as $contacts): ?>
            <tr>
                <td><?php echo $contacts["title"] + "."+$contacts["firstname"]+ " " +$contacts["lastname"]; ?></td>
                <td><?php echo $contacts["email"]; ?></td>
                <td><?php echo $contacts["company"]; ?></td>
                <td><?php echo $contacts["type"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif; ?>



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