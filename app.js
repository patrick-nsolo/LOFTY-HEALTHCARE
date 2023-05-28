//NAVIGATION SCRIPT START
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
//NAVIGATION SCRIPT END


//AUTOMATIC SLIDER SCRIPT START
var swiper = new Swiper(".mySwiper",{
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation:{
        nextEl: "",
        prevEl: "",

    }
})
//AUTOMATIC SLIDER SCRIPT END






