const dropDown = document.querySelector(".dropdown-menu");
const overLay = document.querySelector(".overlay");
const btn = document.querySelector(".btn");

btn.addEventListener("click", () =>{
    dropDown.classList.add("dropdown-open");
    overLay.classList.add("overlay-open");
});