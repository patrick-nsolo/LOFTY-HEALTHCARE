const Hamburger = document.querySelector("hamburger");
const navMenu = document.querySelector("nav-menu");

Hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("show");
});