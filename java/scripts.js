$(document).ready(function () {

 for(i=0;i<5;i++)
           {  
             const cop = document.getElementById("copCard");        
              const newCop = cop.cloneNode(true);
  
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

