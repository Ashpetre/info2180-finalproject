
document.addEventListener("DOMContentLoaded",function(){
    var button = document.getElementById("btn");
    var list = "newcontact.php?titles=";
    var users = "newcontact.php";
    var exlist =["&firstname=","&lastname=","&emailaddr=","&tele=","&company=","&types=","&assigned="];
    var ids = ["fname","lname","email","telephone","comp"];
    var valid;
    const input = [];
    var tests = [/^[a-zA-Z ]+$/,/^[a-zA-Z ]+$/,/^\w+(.\w)*@(\w+.)+(edu|com)$/,/^\d{10,10}$/,
                /^[a-zA-Z ]+$/];
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState == XMLHttpRequest.DONE){
              if (httpRequest.status == 200){
                var list = httpRequest.responseText;
                var result = document.getElementById("assign");
                result.innerHTML = list;
                          }     
             else
                alert("error");} 
        }
    httpRequest.open("GET",users);
    httpRequest.send();
    button.onclick = function(event){
        event.preventDefault();
        document.getElementById("error").innerHTML = "";
        list = "newcontact.php?titles=";
        exlist =["&firstname=","&lastname=","&emailaddr=","&tele=","&company=","&types=","&assigned="];
        const input = [];
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState == XMLHttpRequest.DONE){
              if (httpRequest.status == 200){
                var response = httpRequest.responseText;
                var result = document.getElementById("error");
                if(response == "New Contact created successfully")
                   result.innerHTML = response;
                else
                   result.innerHTML = "Contact was unable to be added";
          }     
             else
                alert("error");} 
        }
        list += document.getElementById("title").value;
        for (let obj of ids){
            if (document.getElementById(obj).checkValidity())
               valid = true;	
            else{
               valid = false;
               if(document.getElementById(obj).value.length == 0)
                 document.getElementById(obj).placeholder = document.getElementById(obj).validationMessage;
	             else
		             document.getElementById(obj).value += " - Incorrect formatf"; 
                 break;}
	}
	if (valid == true){
          input[0] = document.getElementById("fname").value;
	  input[1] = document.getElementById("lname").value;
	  input[2] = document.getElementById("email").value;
	  input[3] = document.getElementById("telephone").value;
	  input[4] = document.getElementById("comp").value;
          exlist[5] += document.getElementById("type").value;
	  exlist[6] += document.getElementById("assign").value;
	  for(var i = 0; i<5; i++){
             input[i].trim();
             if (tests[i].test(input[i])){
              exlist[i] += input[i];
          	list += exlist[i];
             }
             else{
               document.getElementById(ids[i]).value += " - Incorrect format"; 
               break;}
             }
	   if (i == 5){
	    list += exlist[5];
	    list += exlist[6];
            httpRequest.open("GET",list);
            httpRequest.send();
            document.getElementsByTagName("form")[0].reset();
            list = "newcontact.php?titles=";
        }}
    }
   
})
