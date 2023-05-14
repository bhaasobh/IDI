$(document).ready(function () {


  var copsNames=["יותם כהן","ניסן לוי","עידו לוגסי","דנה אופיר","נועה כהן"]
 for(i=0;i<5;i++)
           {  
             const cop = document.getElementById("copCard");        
              let newCop = cop.cloneNode(true);
             let name =  newCop.getElementsByClassName("copName");
             name[0].innerHTML=copsNames[i];
       
         
          document.getElementById("copsEvent").append(newCop);

  
           }
  
    
 

});


var flag=0
function changebackgrund(){
    document.getElementById("change-background").onclick = function () {
        if (flag==0) {
            
            obj=document.getElementById("main");
            obj.style.backgroundColor=" rgb(247, 226, 226)";
            flag=1;
            return;
        }
        if(flag==1){
            obj=document.getElementById("main");
            obj.style.backgroundColor="#ffff";
            flag=0;
            return;
        }

      };
    };

