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

       $('#submitBtn').click(function() {
  checked = document.getElementsByName("interests[]");
  var list = $("input[name='interests[]']:checked").map(function () {
    return this.value;
      }).get();
      alert("תגבור נשלח ל " + list);
        $('#reinforcementsModal').modal('toggle');
     
});
 
$('#Btn_fireman_req').click(function() {

      alert("כיבוי אש הוזמן למיקום ");
     
});

$('#message_allSubmitBtn').click(function() {

 var title = $("#title_messageAll").val();
 var message = $("title_messageAll").val();
if(title == "" || message =="")
{
  console.log("bahaa");
  
}
else
{

}
 
});
$('#Btn_medical_req').click(function() {

  alert("מדא הוזמנה למיקום");
 
});


$("#checkbox_checkAll").click(function() {
$("#checkbox_hashalom").attr('disabled', !$("#checkbox_hashalom").attr('disabled'));
$("#checkbox_aria").attr('disabled', !$("#checkbox_aria").attr('disabled'));
$("#reinforcement_yorashalayem").attr('disabled', !$("#reinforcement_yorashalayem").attr('disabled'));
  });


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

