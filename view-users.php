<?php

header('Access-Control-Allow-Origin: *');

$host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "schema"; 

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$statementb = 'SELECT firstname, lastname, email, role, created_at FROM users';
$statement = $conn-> query ($statementb);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="view-users.css" > -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="addUser.css">

        <title>View Users</title>
    </head>
    <nav>
    <img class="dolpin" src="dolphin.jpg" alt="Dolphin CRM" width=30px height=30px>
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
    
    <body>
        <div class="ViewUsersTable">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
                
                <?php foreach ($results as $row): ?>
                    <tr>
                      <td><?= $row['firstname']." ".$row['lastname']?></td>
                      <td><?= $row['email']?></td>
                      <td><?= $row['role']?></td>
                      <td><?= $row['created_at']?></td>
                  </tr>
                  <?php endforeach; ?>
                   
            </table>  
        </div>
            </body>
            </html>
