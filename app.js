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
var join = document.querySelector('.hero-btn');
var register = document.querySelector('.reg-btn');
var loginOverlay = document.querySelector('.login-overlay');
var regOverlay = document.querySelector('.reg-overlay');

button.addEventListener('click', function(event){
    event.preventDefault();
    loginOverlay.style.display= 'block';
});
join.addEventListener('click', function(event){
    event.preventDefault();
    loginOverlay.style.display= 'block';
});
register.addEventListener('click', function(event){
    event.preventDefault();
    regOverlay.style.display= 'block';
});



