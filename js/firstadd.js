
function search(){
var one=document.getElementById('one');
var two=document.getElementById('two');
var three=document.getElementById('three');
one.addEventListener("mouseover",onpe);
one.addEventListener("mouseout",offpe);
two.addEventListener("mouseover",onpe);
two.addEventListener("mouseout",offpe);
three.addEventListener("mouseover",onpe);
three.addEventListener("mouseout",offpe);
}

function onpe(){
var one=document.getElementById('one');
var two=document.getElementById('two');
var three=document.getElementById('three');
one.style.borderTop="solid aqua 0.5vw";
two.style.borderTop="solid purple 0.5vw";
three.style.borderTop="solid red 0.5vw";
var form=document.getElementById("form");
form.style.display="none";
 var body= document.getElementsByTagName('body')[0];
    var header=document.getElementsByTagName('nav')[0];
     body.style.background = "black";
     header.style.background = "red";
	 let pic1=document.getElementById('gm');
	pic1.style.boxShadow="0px 0px 50px 12px aqua";
    pic1.src="img/bw.jpg";
	 let pic2=document.getElementById('gmm');
      pic2.src="img/bw.jpg";
      	pic2.style.boxShadow="0px 0px 50px 12px purple";
	 let pic3=document.getElementById('gmmm');
     	pic3.style.boxShadow="0px 0px 50px 12px red";
    pic3.src="img/bw.jpg";
}

function offpe(){
var one=document.getElementById('one');
var form=document.getElementById("form");
form.style.display="block";
var two=document.getElementById('two');
var three=document.getElementById('three');
one.style.borderTop="none";
two.style.borderTop="none";
three.style.borderTop="none";
 var body= document.getElementsByTagName('body')[0];
    var header=document.getElementsByTagName('nav')[0];
     header.style.background = "rgba(255,255,255,0.5)";
     body.style.backgroundImage = " url('img/re.jpg'),url('img/s.jpg'), linear-gradient(108.12deg, #6429E2 21.6%, #CD4EE0 26.3%, #F272D1 33.52%, #FF80CC 41.33%, rgba(255, 215, 136, 0.78) 78.16%, rgba(250, 205, 137, 0.852076) 93.88%, #F1E0A1 103.54%)";
	 body.style.backgroundPosition=" center, left bottom";
    body.style.backgroundRepeat=" no-repeat, no-repeat";
    body.style.backgroundSize=" auto, auto";
   body.style.backgroundSize=" 20%, 25%";
    body.style.backgroundSize=" 0px, 25% 100%, contain";
     
     
     let pic1=document.getElementById('gm');
    pic1.src="img/re.jpg";
    	pic1.style.boxShadow="0px 0px 50px 22px #FFFFFF";
	 let pic2=document.getElementById('gmm');
     	pic2.style.boxShadow="0px 0px 50px 22px #FFFFFF";
    pic2.src="img/re.jpg";
	 let pic3=document.getElementById('gmmm');
     	pic3.style.boxShadow="0px 0px 50px 22px #FFFFFF";
    pic3.src="img/re.jpg";
}

document.addEventListener('DOMContentLoaded',search);

