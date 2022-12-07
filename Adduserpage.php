<?php
session_start();
if(!isset($_SESSION['id'])){
    session_destroy();
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
                                <?php
                 if($_SESSION["status"] == "Admin")
                   echo "<a href='view-users.php'><li><i class='material-icons'>people_outline</i>Users</li></a>";
                ?> <hr>
                <a href="logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>
    
        <main>
            <h1>New User</h1>
            <div class="form">
    
                <section>
                    <h2>First Name</h2>
                    <input type="text" name="FirstName" placeholder="" id="fname">
                    <div class="fnameMsg error"></div>
                </section>
    
                <section>
                    <h2>Last Name</h2>
                    <input type="text" name="LastName" placeholder="" id="lname">
                    <div class="lnameMsg error"></div>
                </section>
    
                <section>
                    <h2>Email</h2>
                    <input type="text" name="Email" placeholder="" id="email">
                    <div class="emailMsg error"></div>
                </section>
    
                <section>
                    <h2>Password</h2>
                    <input type="text" name="Password" id="password">
                    <div class="passwordMsg error"></div>
                </section>
    
                <section>
                    <h2>Role</h2>
                    <div class="dropdown">
                        <div class="select">
                            <span class="selected">Member</span>
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li class="active">Member</li>
                            <li>Admin</li>
                        </ul>
                    </div>
                </section>
    
                <div class="controls">
                    <div class="msg">Message</div><button>Save</button>
                </div>
    
            </div>
    
        </main>
    </div>
    
</body>
</html>