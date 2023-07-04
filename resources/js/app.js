require('./bootstrap');


let addTaskBtn = document.getElementById("addTaskBtn");
let addInput = document.getElementById("addInput");

addTaskBtn.addEventListener('click', () => {
    addInput.focus();
})
