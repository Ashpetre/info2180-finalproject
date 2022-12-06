<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schema"; 
    $conn= new mysqli($host,$username,$password,$dbname);
    if(isset($_GET['id'])){
        $id = $_GET["id"];
        $result = getdetails($id);

    }


function getdetails($id ){
    $sql = "selct * from notes where id ='$id'"
    stmt = this ->db ->prepare($sql);
    
}

?>

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