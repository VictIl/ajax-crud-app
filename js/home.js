
 var clecked2=0;

 function loadDB() {
    

  const xhttp = new XMLHttpRequest();
   xhttp.onload = function() {
    if(!clecked2){
    start(1); 
    document.getElementById("txtHint").innerHTML = this.responseText; clecked2=1;}
    else{
    start(0);
    document.getElementById("txtHint").innerHTML = "";clecked2=0;}

  }
  xhttp.open("GET", "js/xml/test.php");
  xhttp.send();
}



function start(button_on){
    var body= document.getElementsByTagName('body')[0];
    var header=document.getElementsByTagName('nav')[0];
    if(button_on){
   
    body.style.backgroundColor = "black";
    header.style.display = "flex";
    }
    else{ 
     header.style.display = "none";
    body.style.backgroundColor = "deeppink";

    }
}

function kn(){
    start(0);
}
document.addEventListener('DOMContentLoaded',kn);
