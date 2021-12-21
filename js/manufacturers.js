 
var clecked=0;
 function sendRequest2(options) {
  const http = new XMLHttpRequest();

  http.open(options.method,options.url);
  http.onreadystatechange=function(){


      if(this.readyState==4){

            if(this.status===200){
               options.success(this);
            }
      }

  }
  http.send();
}
 function loadDoc() {
sendRequest2({
    method: 'GET',
    url :'demos',
    success: function(http){
        var tab=JSON.parse(http.responseText);
        console.log(tab);
        var disp=document.getElementById("demo");
        var tablebody=document.getElementById("demos");
        if(!clecked){
        disp.style.display="block";
           
            for(var i=0;i<tab.length;i++){
                tablebody.innerHTML+="<tr><td>"+tab[i].panda_id+"</td><td>"+tab[i].panda_name+"</td><td>"+tab[i].panda_year+"</td><td>"+tab[i].panda_property+"</td></tr>";
            }

            clecked=1;
        }else{tablebody.innerHTML="";clecked=0; disp.style.display="none"; }
    }


});
}
///////////////////////////////////////////////////////////////////////////
var sch={};
function get_page(p){

   sch.page=p;

   search(sch);
}

var added=0;

function problem(){
    sch.page=1;

}


function why (params){
    var req='';
    if(params){
       for(var i in params){
              //if(params.hasOwnProperty(i)){
                    req+=encodeURIComponent(i)+"="+encodeURIComponent(params[i])+"&";
            //  }
       }
    }
   // alert(params.page);
    sendRequest2({
    method: 'GET',
    url :'demos?'+req,
    success: function(http){
      
        var tab=JSON.parse(http.responseText);
        console.log(tab);
        var disp=document.getElementById("demo");
        var tablebody=document.getElementById("demos");
           
        if(!added) {        
       
        for(var i=0;i<tab.rows.length;i++){
       
           // tablebody.innerHTML+="<div id=cont class=animation1><div><div id=contd ><img class=ph_id src='ph/"+tab.rows[i].ph_img+"'/></img><p id=name>"+tab.rows[i].ph_name+"</p><p id=des>"+tab.rows[i].ph_des+"</p><p id=cred>"+tab.rows[i].ph_credits+"</p></div ></div ></div >";
                   tablebody.innerHTML+="<div id=cont class=animation1><div><div id=contd ><h4 id=name>"+tab.rows[i].ph_name+"</h4><img class=ph_id src='ph/"+tab.rows[i].ph_img+"'/></img><div id=ovrl><p id=des>"+tab.rows[i].ph_des+"</p><p id=cred>"+tab.rows[i].ph_credits+"</p></div></div></div></div >";

         }  
        var pagination=document.getElementById("pagination");
        var num_of_pages=4;
        var page=tab.pagination.page;
        var first=page-Math.floor(num_of_pages/2);
        if (first < 1) first = 1;
        var last=page+num_of_pages;

        if (last > tab.pagination.pagecnt) {
            last = tab.pagination.pagecnt;
            first=last-num_of_pages+1;
            if (first < 1) first = 1;
        }
        var st="";
        for(var i=first;i<=last;i++){
            st+=" <a onclick=get_page("+i+") href='#"+i+"'></a>";
        }  
        added=1;
        }else{ tablebody.innerHTML="";why(sch);added=0;}                    //<------------ 
        pagination.innerHTML=st;
    }
    });
}
function search(){

         var prev='';
         var el=document.getElementById("search");
        
         if(el!=prev){
              var tableboddy=document.getElementById("demos");
              tableboddy.innerHTML="";
              sch.search=el.value;
              
              why(sch);
         }
}

function check(){                             //<--
 var el=document.getElementById("search");
    if (el.value==''){
    sch.page=1;
    sch.search='';
    why(sch);
    }
}


document.addEventListener('DOMContentLoaded',search);
