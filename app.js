const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".menu");
const btn = document.querySelector(".btn");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    btn.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n =>
    n.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        btn.classList.toggle("active");
    }))


var button = document.querySelector('.button');
var join = document.querySelector('.hero-btn');
var register = document.querySelector('.reg-btn');
var regLink = document.querySelector(".reg-link");
var logLink = document.querySelector(".log-link");
var cancel = document.querySelector('.cancel');
var logCancel = document.querySelector('.log-cancel');
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
regLink.addEventListener('click',function(event){
    event.preventDefault();
    loginOverlay.style.display= 'block';
    regOverlay.style.display= 'none';
});
logLink.addEventListener('click',function(event){
    event.preventDefault();
    loginOverlay.style.display= 'none';
    regOverlay.style.display= 'block';
});
cancel.addEventListener('click',function(event){
    event.preventDefault();
    loginOverlay.style.display= 'none';
    regOverlay.style.display= 'none';
});
logCancel.addEventListener('click',function(event){
    event.preventDefault();
    loginOverlay.style.display= 'none';
    regOverlay.style.display= 'none';
});


//Slider 
function changeImage(){
    var sliderImages = document.querySelectorAll('.slider-image');
    var currentImages = document.querySelectorAll('.slider-image.active');

    // Find the index of current image
    var currentIndex = Array.from(sliderImages).indexOf(currentImages);
    // Calculate the index of the nex image
    var nextIndex = (currentIndex + 1) % sliderImages.length;
    // Remove 'active' class from current image and add it to the next image
    currentImages.classList.remove('active');
    sliderImages[nextIndex].classList.add('active');
}
setInterval(changeImage, 3000);
