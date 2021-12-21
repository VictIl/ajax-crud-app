
var click2=0;


/*
var sch={};

function fillArr(){
var nameEr=document.getElementById()
if(do)
{}
}

*/




function sendRequest(options) {
const http = new XMLHttpRequest();

http.open(options.method,options.url);
http.onreadystatechange=function(){


    if(this.readyState==4){

        if(this.status===200){
           var tab=this.responseText;
           console.log(tab);
           /*
            var tablebody=document.getElementById("add_div");
            tablebody.innerHTML=tab;
           if(!click2) {tablebody.style.display="block";*/
            var tablebody=document.getElementById("add_div");
             var pg=document.getElementById("pg");
            var taebody=document.getElementById("userTab");
               var tn=document.getElementById("tableName");
           if(!click2) {taebody.style.display="none";
              pg.style.display="none";
            tablebody.innerHTML=tab;
             tablebody.style.marginTop="10%";
            tablebody.style.display="block";  tn.style.display="none";
           click2=1;
           }else{tablebody.style.display="none";click2=0; taebody.style.display="block";   tablebody.style.marginTop="0%";  pg.style.display="block";tn.style.display="block"; }     
        }
    }

}
http.send();
}
function add(b) {
        if(b){
        {//fillArr();
        sendRequest({ method: 'GET',url :'pl_add?' });
        }
     }
}