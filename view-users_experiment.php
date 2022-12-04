<?php

header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$username = 'user_RL';
$password = 'password123';
$dbname = 'schema';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$statementb = 'SELECT firstname, email, role, created_at FROM users';
$statement = $conn-> query ($statementb); 
$results = $statement->fetchAll(PDO::FETCH_ASSOC)

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="" />
        <title>View Users</title>
    </head>
    
    <body>
        <div class="ViewUsersTable">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                      <td><?= $row['firstname']?></td>
                      <td><?= $row['email']?></td>
                      <td><?= $row['role']?></td>
                      <td><?= $row['created_at']?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>    
            </table>  
        </div>
            </body>
            </html>