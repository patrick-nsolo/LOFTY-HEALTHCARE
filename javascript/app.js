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
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination:{
        el: ".swiper-pagination",
        clickable: true,
        type: "fraction",
    },
    autoplay:{
        delay:3000,
        disableOnInteraction:false,
    },
    navigation:{
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    effect: "creative", 
    creativeEffect:{
        prev:{
            shadow:true,
            translate:[0,0-400],
        },
        next:{
            translate:["100",0,0],

        },
    }
});
//AUTOMATIC SLIDER SCRIPT END
document.getElementById("country-code").addEventListener("change", function(){
    var selectedOption = this.options[this.selectedIndex];
    var flagIcon =document.getElementById("selectedFlag");
    flagIcon.className = "";
    flagIcon.classList.add("flag-icon");
    flagIcon.classList.add("flag-icon-" + selectedOption.getAttribute("data-flag"));
});

//PASSWORD TOGGLE
function togglePasswordVisibility(){
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}  
//FORM ENTRY POINT SCRIPT

