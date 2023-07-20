var flag=0
function changebackgrund(){
    document.getElementById("change-background").onclick = function () {
        if (flag==0) {
          obj=document.querySelectorAll(".card");
            for (let index = 0; index < obj.length; index++) {
              obj[index].style.border="solid red";
              flag=1;
            }
            return;
        }
        if(flag==1){
          obj=document.querySelectorAll(".card");
          for (let index = 0; index < obj.length; index++) {
            obj[index].style.border="solid #dddddd";
            flag=0;
          }
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
      $('#Btn_medical_req').click(function() {
        alert("מדא הוזמנה למיקום");
      });
      $("#checkbox_checkAll").click(function() {
      $("#checkbox_hashalom").attr('disabled', !$("#checkbox_hashalom").attr('disabled'));
      $("#checkbox_aria").attr('disabled', !$("#checkbox_aria").attr('disabled'));
      $("#checkbox_boldor").attr('disabled', !$("#checkbox_boldor").attr('disabled'));
      $("#reinforcement_yorashalayem").attr('disabled', !$("#reinforcement_yorashalayem").attr('disabled'));
        });
      });
      function sub(){  
        const submit = document.querySelector('#btnform');
        const form = document.querySelector('#add_form');
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
  function makeSelected (selectid) {
    const selectObj = document.querySelector(selectid);
    ind = selectObj.dataset.selected;
    for (let index = 0; index < selectObj.options.length; index++) {
      if(selectObj.options[index].innerHTML==ind){
        selectObj.options[index].selected = true;
      }
    }
}
  window.onload = function init() {
    makeSelected();
}
function showData(data){
  const ulFrag = document.createDocumentFragment();
  for (const key in data.cities) {
      const li = document.createElement('li');
      sHtml = `<a class="dropdown-item" href='list.php?location="${data.cities[key]}"'>${data.cities[key]}</a>`;
      li.innerHTML = sHtml;
      ulFrag.appendChild(li);
  }
  document.getElementById("city").appendChild(ulFrag);
}
fetch("data/city.json")
  .then(response => response.json())
  .then(data => showData(data));


