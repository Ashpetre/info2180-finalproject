<php

$title = 'Full Contact Details';

?>

<!-- First card -->
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <p class="card-text">
            Email: <?php echo $_POST['email'];  ?>
        </p>
        <p class="card-text">
            Telephone: <?php echo $_POST['telephone'] ;  ?>
        </p>
        <p class="card-text">
            Company: <?php echo $_POST['company'];  ?>    
        </p>
        <p class="card-text">
            Assigned To: <?php echo $_POST['assigned_to'];  ?>
        </p>

<!-- Function to get names/could use emails instead  -->
public function getContactInfo($mail){
    $sql = "select * from contacts where email = :mail";
    $stmt = $this->schema-prepare($sql);
    $stmt->bindParam(':mail', $mail)
    $stmt->execute();
    $result = $stmt->fetch()
    return $result;
}

<!-- View button that would be displayed on the dashboard -->
    <td><a href="view.php?mail=<?php echo $contacts['email'] ?>" class="btn btn-primary">View</a></td> 
    OR?
    <td><a href="view.php?mail=<?= $contacts['email'] ?>" class="btn btn-primary">View</a></td> 

