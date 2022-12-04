<?php
$host = 'localhost';
$username = 'user_RL';
$password = 'password123';
$dbname = 'schema'; 
//$stmt = $conn->prepare("SELECT firstname,lastname FROM users);
//$stmt->execute();
//$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//if (empty($_GET['titles']){
//   foreach ($users as $row): 
//      if($row['id'] == 1)
//        echo '<option value='.$row['firstname'].' '.$row['lastname'].'selected = "selected">'.$row['firstname'].' '.$row['lastname'].'</option>';
//      else
//      echo '<option value='.$row['firstname'].' '.$row['lastname'].'>'.$row['firstname'].' '.$row['lastname'].'</option>';
//   endforeach; 
//}
$result = 'Error with new contact creation';
$title = htmlspecialchars($_GET['titles']);
$firstname = htmlspecialchars($_GET['firstname']);
$lastname = htmlspecialchars($_GET['lastname']);
$email = htmlspecialchars($_GET['emailaddr']);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$tele = htmlspecialchars($_GET['tele']);
$tele = filter_var($tele, FILTER_SANITIZE_NUMBER_INT);
$company = htmlspecialchars($_GET['company']);
$type = htmlspecialchars($_GET['types']);
$assigned = htmlspecialchars($_GET['assigned']);
$assigneds = explode(" ",$assigned);
//$creator_id = $_SESSION["id"];
$created = date("Y-m-d h:i:sa");
$updated = $created;
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->prepare("SELECT id FROM users WHERE firstname LIKE :assignedf AND lastname LIKE :assignedl);
//$stmt->bindParam(":assignedf",$assigneds[0]);
//$stmt->bindParam(":assignedl",$assigneds[1]);
//$stmt->execute();
//$assigned_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->prepare("INSERT INTO contacts (title,firstname,lastname,email,telephone,company,`type`,created_at,updated_at) VALUES (:title,:firstname,:lastname,:email,:tele,:company,:tyype,:created,:updated)");
$stmt->bindParam(":title",$title);
$stmt->bindParam(":firstname",$firstname);
$stmt->bindParam(":lastname",$lastname);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":tele",$tele);
$stmt->bindParam(":company",$company);
$stmt->bindParam(":tyype",$type);
$stmt->bindParam(":created",$created);
$stmt->bindParam(":updated",$updated);
$stmt->execute();
$result = "New Contact created successfully";
echo $result;
?>