'use strict';

const deleteButton = document.querySelector(".delete-button");

const confirmDelete = () => {
   let answer = confirm("Do you really want to delete this user?");

   return answer;
}