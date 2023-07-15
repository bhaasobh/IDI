

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
            obj.style.backgroundColor="#dddddd";
            flag=0;
            return;
        }

      };
    };

    $(document).ready(function () {
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



      function sub(){
           
        const submit = document.querySelector('#btnform');
        const form = document.querySelector('#add_event_form');
        form.addEventListener('submit', (e) => {
        e.preventDefault();
    
      savePost();
      });

      const savePost = () => {
        try {
          fetch('action.php', {
            method: 'POST',
            body: new FormData(form)
         });
         document.getElementById("btnform").innerHTML = "טוען...";
        window.location.replace("list.php");
       } catch (error) {
        console.log(error);
    }
};
    
  }