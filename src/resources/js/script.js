'use strict';

const deleteButton = document.querySelector(".delete-button");
console.log(deleteButton);

const confirmDelete = () => {
   let answer = confirm("Do you really want to delete this user?");

   return answer;
}