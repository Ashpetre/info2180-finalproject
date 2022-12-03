document.addEventListener("DOMContentLoaded",function(){
    var button = document.getElementById("btn");
    var list = "newcontact.php?titles=";
    var exlist =["&firstname=","&lastname=","&emailaddr=","&tele=","&company=","&types=","&assigned="];
    const input = [];
    var tests = [/^[a-zA-Z ]+$/,/^[a-zA-Z ]+$/,/^\w+(.\w)*@(\w+.)+(edu|com)/,/^\d{10}/,
                /^[a-zA-Z ]+$/];
    button.onclick = function(event){
        event.preventDefault();
        exlist =["&firstname=","&lastname=","&emailaddr=","&tele=","&company=","&types=","&assigned="];
        const input = [];
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState == XMLHttpRequest.DONE){
               if (httpRequest.status == 200){
               /*   var response = httpRequest.responseText;
                  var result = document.getElementById("result");
                  result.innerHTML = response;*/
            }     
               else
                  alert("error");}
        }
        list += document.getElementById("title").value;
        console.log(input);
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
           else
             break;
           }
	      if (i == 5){
	        list += exlist[5];
	        list += exlist[6];
          httpRequest.open("GET",list);
          console.log(list);
          httpRequest.send();
          list = "newcontact.php?titles=";
        }list = "newcontact.php?titles=";
    }
   
})