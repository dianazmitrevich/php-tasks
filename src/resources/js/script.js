'use strict';

const deleteButton = document.querySelector(".delete-button");

const confirmDelete = () => {
   let answer = confirm("Do you really want to delete this user?");

   return answer;
}

(function () {
   var forms = document.querySelectorAll('.needs-validation')

   Array.prototype.slice.call(forms)
      .forEach(function (form) {
         form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
               event.preventDefault()
               event.stopPropagation()
            }

            form.classList.add('was-validated')
            customValidate();
         }, false)
      })
})()

function customValidate() {
   const idList = ["email", "name", "gender", "status"];
   const feedbackList = document.querySelectorAll(".invalid-feedback");

   for (let i = 0; i < idList.length; i++) {
      let element = document.querySelector("#" + idList[i]);

      if (element.validity.valid == false && element.value != "")
         feedbackList[i].textContent = "Please, provide the data.";
   }
}