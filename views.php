<php

$title = 'Full Contact Details';

?>
<?php
// <!-- Function to get emails to bring up specific contact  -->

    $sql = "select * from contacts where email = :mail";
    $stmt = $this->schema-prepare($sql);
    $stmt->bindParam(':mail', $mail)
    $stmt->execute();
    $result = $stmt->fetch()
    return $result;

?>

<!-- Supposedly to get database  -->
<?php
$host = 'localhost';
$username = 'user_RL';
$password = 'password123';
$dbname = 'schema';
$con = mysqli_connect($host, $username, $password, $dbname);
?>

<!-- First card -->
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <p class="card-text">
            Email <?php echo $_POST['email'];  ?>
        </p>
        <p class="card-text">
            Telephone <?php echo $_POST['telephone'] ;  ?>
        </p>
        <p class="card-text">
            Company <?php echo $_POST['company'];  ?>    
        </p>
        <p class="card-text">
            Assigned To <?php echo $_POST['assigned_to'];  ?>
        </p>
    </div>
</div>


<!-- Second card with notes  -->
    <?php 
        $sql="SELECT * FROM 'notes'";
        $res=mysqli_query($con, $sql);
        
        while ($row = $results->fetch_assoc()){
            echo" <div class='card'>
            <div class='card-body'>
            <h3>Notes</h3>
            <h3 class='card title'>".$row["created_by"]."</h3>
            <p class='card-text'>".$row["comment"]."</p>
            </div>";
        }
    ?>

    <div class='container'>
            <form class="form' method="POST">
                <label for="title" class="form-label"> Add a note about .$fetch["firstname"]</label>
                <input type="text" name="comment" id="comment" placeholder="Enter details here">
                <button type="submit" class="btn btn-primary" name="submit">Add Note</button>
    </div>
<!-- View button that would be displayed on the dashboard -->
    <td><a href="view.php?mail=<?php echo $contacts['email'] ?>" class="btn btn-primary">View</a></td> 
    OR?
    <td><a href="view.php?mail=<?= $contacts['email'] ?>" class="btn btn-primary">View</a></td> 

