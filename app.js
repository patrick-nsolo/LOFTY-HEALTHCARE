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
//FORM 
const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser'); 
const multer = require('multer');
const path = require('path');

//create mysql DB connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Ed/12c/2625',
    database: 'registrants'
});
//connect to DB
db.connect((err) => {
    if(err){
        throw err;
    }
    console.log('Connected to the database');
});
//create Express app
const app = express();
//set up middleware
app.use(bodyParser.urlencoded({extended:false}));
app.use(bodyParser.json());
//set up multer for file uploads
const storage = multer.diskStorage({
    destination: './uploads',
    filename: (req, file, cb) => {
        cb(null, file.fieldname + '-' + Date.now() + path.extname(file.originalname));
    },
});
const upload = multer({storage});
//Serve static files from the 'public' directory
app.use(express.static('public'));

//Define routes

//Handle form submission
app.post('/registration-submit', upload.fields([{name: 'cv', maxCount: 1 }, { name: 'picture', maxCount: 1 }]), (req,res) =>{
    const{
        user_name,
        password,
        confirm_password,
        first_name,
        surname,
        gender,
        email,
        country_code,
        phone_number,
        address,
        profession,
    } = req.body

    //Perform form validation
    if (!user_name || !password || !confirm_password || !first_name || !surname || !gender || !email || !country_code || !phone_number || !address || !profession){
        return res.status(400).json({error: 'Please fill in all fields'});
    }
    if (password !== confirm_password){
        return res.status(400).json({error: 'Passwords do not match'});
    }
    //save form data to DB
    const query = 'INSERT INTO users (user_name, password, first_name, surname, gender, email, country_code, phone_number, address, profession, cv_path, picture_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    const cvPath = req.files.cv ? req.files.cv[0].path : '';
    const picturePath = req.files.pictures ? req.files.picture[0].path : '';
    
    db.query(query, [user_name, password, first_name, surname, gender, email, country_code, phone_number, address, profession, cvPath, picturePath], (err, result) => {
        if (err){
            return res.status(500).json({error: 'Failed to register user'});    
        }
        //registeration successful
        res.status(200).json({message: 'User registered successfully'});

    });
});
//start server
app.listen(3000,() => {
    console.log('server started on port 3000');
});







