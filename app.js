const navMenu = document.querySelector(".dropdown-menu");
const OverLay = document.querySelector(".overlay");
const Burger = document.querySelector(".burger");

Burger.addEventListener("click", () =>{
    navMenu.classList.add("dropdown-open");
    navMenu.classList.add("overlay-open");
})