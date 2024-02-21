// modal home


let openModalBtn = document.getElementById("openModalBtn");
let openModalBtn2 = document.getElementById("openModalBtn2");
let modal= document.getElementById("myModal");
let modal2= document.getElementById("myModal2");
let closeModalBtn = document.getElementById("closeModalBtn");
let closeModalBtn2 = document.getElementById("closeModalBtn2");




closeModalBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

closeModalBtn2.addEventListener("click", function() {
    modal2.style.display = "none";
});

window.addEventListener("click", function(event) {
    if (event.target === modal) {
        modal2.style.display = "none";
    }
});

window.addEventListener("click", function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

openModalBtn2.addEventListener("click", function() {
    modal2.style.display = "block";
});

openModalBtn.addEventListener("click", function() {
    modal.style.display = "block";
});



