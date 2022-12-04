<?php

header('Access-Control-Allow-Origin: *');

$host = 'localhost:8888';
$username = 'user';
$password = 'pw123';
$dbname = 'schema';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$statement= 'SELECT name, email, role, created from (name of table with data in sql)';
$results = $conn-> query ($statement->fetchAll(PDO::FETCH_ASSOC)); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="view-users.css" />
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
                      <td><?= $row['name']?></td>
                      <td><?= $row['email']?></td>
                      <td><?= $row['role']?></td>
                      <td><?= $row['created']?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>    
            </table>  
        </div>
            </body>
            </html>
