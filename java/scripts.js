

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
           
        document.getElementById("btnform").onclick = function () {
       let check = true;
        let temp=document.getElementsByName('actname')[0].value;
            if (temp=="") {
                document.getElementById("name").classList.add("is-invalid");
                check = false; check = false;
             }
             let temp1=document.getElementsByName('date')[0].value;
            if (temp1=="") {
                document.getElementById("date").classList.add("is-invalid");
                check = false;
             }
             let temp2=document.getElementsByName('loc')[0].value;
             if (temp2=="") {
                 document.getElementById("loc").classList.add("is-invalid");
                 check = false;
              }
              let temp3=document.getElementsByName('officer')[0].value;
              if (temp3=="") {
                  document.getElementById("officer").classList.add("is-invalid");
                  check = false;
               }
               let temp4=document.getElementsByName('force_Qty')[0].value;
              if (temp4=="") {
                  document.getElementById("force").classList.add("is-invalid")
                  check = false;
               }


              if(check)
              {
               document.getElementById("btnform").innerHTML = "טוען...";
                savePost();
              }
      
        }
    
    }

    const savePost = async () => {
   
      const form = document.querySelector('#add_event_form');
      try {
          let response = await fetch('action.php', {
              method: 'POST',
              body: new FormData(form),
          });
          const result = await response.json();
          console.log(result);
         
      } catch (error) {
          console.log("error : "+error);
      }
  };


