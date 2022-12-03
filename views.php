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
            Date Of Birth: <?php echo $_POST['assigned_to'];  ?>
        </p>

<!-- Function to get names/could use emails instead  -->
public function getContactInfo($fname){
    $sql = "select * from contacts where firstname = :fname";
    $stmt = $this->schema-prepare($sql);
    $stmt->bindParam(':fname', $fname)
    $stmt->execute();
    $result = $stmt->fetch()
    return $result;
}

<!-- View button that would be displayed on the dashboard -->
    <td><href="view.php?fname=(code to get either fname or email here)" class="btn">View</a></td>  

