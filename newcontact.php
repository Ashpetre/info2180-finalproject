<?php
session_start();
?>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "schema";
if (!isset($_GET['titles'])){
 $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
 $stmt = $conn->prepare("SELECT id,firstname,lastname FROM users");
 $stmt->execute();
 $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($users as $row): 
      $name = $row['firstname']." ".$row['lastname'];
      $vname = $row['firstname']."_".$row['lastname'];
      if($row['id'] == 	1)
        echo '<option value='.$vname.' selected = "selected">'.$name.'</option>';
      else
        echo '<option value='.$vname.' >'.$name.'</option>';
   endforeach; 
}
else{
 $result;
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
 $assigneds = explode("_",$assigned);
$creator_id = $_SESSION["user"];
 $created = date("Y-m-d h:i:sa");
 $updated = $created;
 $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
 $stmt = $conn->prepare("SELECT id FROM users WHERE firstname LIKE :assignedf AND lastname LIKE :assignedl");
 $stmt->bindParam(":assignedf",$assigneds[0]);
 $stmt->bindParam(":assignedl",$assigneds[1]);
 $stmt->execute();
 $assigned_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt = $conn->prepare("INSERT INTO contacts (created_by,title,firstname,lastname,email,telephone,company,`type`,assigned_to,created_at,updated_at) VALUES (:creator,:title,:firstname,:lastname,:email,:tele,:company,:tyype,:assigned,:created,:updated)");
 $stmt->bindParam(":creator",$creator_id);
 $stmt->bindParam(":title",$title);
 $stmt->bindParam(":firstname",$firstname);
 $stmt->bindParam(":lastname",$lastname);
 $stmt->bindParam(":email",$email);
 $stmt->bindParam(":tele",$tele);
 $stmt->bindParam(":company",$company);
 $stmt->bindParam(":tyype",$type);
 $stmt->bindParam(":assigned",$assigned_id[0]['id']);
 $stmt->bindParam(":created",$created);
 $stmt->bindParam(":updated",$updated);
 $stmt->execute();
 $result = "New Contact created successfully";
 echo $result;}
?>