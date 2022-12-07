<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schema"; 
    $conn= new mysqli($host,$username,$password,$dbname);
    

    if(!isset($_GET['id'])){
        echo "<h1>please check details</h1>";
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM contacts WHERE id='$id'";
        $results= $conn -> query($sql);
        $result = $results->fetch_assoc();
    if ($result['type'] == 'Sales Lead'){
        $type = "Support";
    }else{
        $type = "Sales Lead";
    }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="addUser.css">
    <link rel="stylesheet" href="styles.css">

    <script src="addUser.js"></script>
    
</head>
<body>
    <nav>
    <img class="dolpin" src="dolphin.jpg" alt="Dolphin CRM" width=30px height=30px>
        <p>DolphinCRM</p>
    </nav>

    <div class="container">
        <aside>
            <ul>
            <a href="dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="new_contact.php"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                <a href="view-users.php"><li><i class="material-icons">people_outline</i>Users</li></a>
                <hr>
                <a href="logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>
    
<div class="card" style="width: 18rem;">
<button value= >Assigned to me</button>
<button type="submit" name="switch-to">Switch to <?php echo $type?></button>
<?php
    if(isset($_POST['switch-to'])){
        if ($result['type'] == 'Sales Lead'){
            $type = "Support";
            
        }else{
            $type = "Sales Lead";
        }


    }
?>
<img src="contact.png" alt="" style="border-radius-100%" width="50px" height="50px">
    <h1><?php echo $result["title"]."".$result["firstname"]." ".$result["lastname"] ?></h1>
    <h4><?php echo "Created on ".$result["created_at"]." by ".$result["created_by"] ?></h4>
    <div class="card-body">
        <p class="card-text">
            Email: <?php echo $result['email'];  ?>
        </p>
        <p class="card-text">
            Telephone: <?php echo $result['telephone'] ;  ?>
        </p>
        <p class="card-text">
            Company: <?php echo $result['company'];  ?>    
        </p>
        <p class="card-text">
            Assigned To: <?php echo $result['assigned_to'];  ?>
        </p>
        <div class="container">
        <?php
            $sql = "SELECT * FROM notes where id = '$id'";
            $note= $conn -> query($sql);
            $notes = $note->fetch_assoc();
            echo"<h1>Notes</h1>
            
            <p>$notes[comment]</p>";
            
        ?>

    </div>
        <form action="get">
            <label>Add a note about <?php echo $result['firstname'];?><label>
            <input type = "text"> </br>
            <input type = "submit" value= "submit"><br>
        </form>
    </div>
    
<body>
</div>
</html>