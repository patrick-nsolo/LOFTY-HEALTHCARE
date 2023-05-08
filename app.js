const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n =>
    n.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    }))


var button = document.querySelector('.button');
var join = document.querySelector('.join-btn');
var register = document.querySelector('');
var loginOverlay = document.querySelector('.login-overlay');

button.addEventListener('click', function(event){
    event.preventDefault();
    loginOverlay.style.display= 'block';
});
join.addEventListener('click', function(event){
    event.preventDefault();
    loginOverlay.style.display= 'block';
});



