<?php
      session_start();
  ?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<title>New Contact Page</title>

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    	<link rel="stylesheet" href="addUser.css">

		<script src="newcontact.js" type="text/javascript"></script>
		<nav>
        <img class="dolpin" src="dolphin.jpg" alt="Dolphin CRM" width=30px height=30px>
        <p>DolphinCRM</p>
    </nav>
	</head>
         <div class = "container">
	<aside>
            <ul>
                <a href="dashboard.php"><li><i class="material-icons">home</i>Home</li></a>
                <a href="new_contact.php"><li><i class="material-icons">account_circle</i>New Contact</li></a>
                                <?php
                 if($_SESSION["status"] == "Admin")
                   echo "<a href='view-users.php'><li><i class='material-icons'>people_outline</i>Users</li></a>";
                ?><hr>
                <a href="logout.php"><li><i class="material-icons">exit_to_app</i>Logout</li></a>
            </ul>
        </aside>

	<body>
	
        <main>
		<header>
			<h1>New Contact</h1>
		</header>
         <div id="form" class = "form"> 
		
           
			
             <form action:"newcontact.php" method:"get">
				<div class="dropdown">
                    <label for="titles">Titles:</label>
                    <select name="titles" id="title">
					<option value="Mr."selected = "selected">Mr.
					<option value="Mrs.">Mrs.
					<option value="Ms.">Ms.
				</select>
 				  </div>
				
				<label for: "fname">First Name<label/>
				<input id="fname" type = "text" aria-required = "true" required name="firstname" placeholder="First Name" />
				<label for: "lname">Last Name<label/>
				<input id="lname" type = "text" aria-required = "true" required name="lastname" placeholder="Last Name" />
				<label for: "emailaddr">Email Address<label/>
                <input id="email" type = "email" aria-required = "true" required name="emailaddr" placeholder="something@website.com" />
				<label for: "tele">Telephone Number<label/>
				<input id="telephone" type = "tel" aria-required = "true" required name="tele" placeholder="10 digits" />
				<label for: "company">Company<label/>
				<input id="comp" aria-required = "true" required name="company" />
				<div class="dropdown2">
                    <label for="types">Type</label>
                    <select name="types"  id="type">
					<option value="Sales Lead"selected = "selected">Sales Lead
					<option value="Support">Support
				  </select>
                    <label for="assigned">Assigned To</label>
                    <select name="assigned"  id="assign">
					</select>
 				  </div>
                    <button type="submit" id="btn">Save</button>
			<p id = "error"></p>
			</form>
			</div>

			
		</main>
	</div>

	</body>
</html>
