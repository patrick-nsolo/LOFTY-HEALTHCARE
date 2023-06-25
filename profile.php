<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
if (isset($_SESSION["userid"]) == false) {
  header("Location: login.php?error=pleaselogin");
}



?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link type="text/css" rel="stylesheet" href="styles/style.css">
    <link type="text/css" rel="stylesheet" href="styles/nav.css">
    <link type="text/css" rel="stylesheet" href="styles/trans.css">
    <link rel="stylesheet" href="boxicons-2.1.4/css/boxicons.min.css">
    <title>Lofty Healthcare Website</title>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.html" title="This link takes you to lofty logo home page" class="slide-in-left"><img class="logo" src="images/lofty-logo.png" alt="lofty-healthcare-logo"></a>
                <ul class="menu">
                    <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="clients.html" class="nav-link">Our Clients</a></li>
                    <li class="nav-item"><a href="service.html" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="team.html" class="nav-link">Our Team</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact Us</a></li> -->
                    <li class="nav-item"><a href="includes/logout.inc.php" class="btn nav-link button">Logout</a></li>
                    <li class="nav-item"><a href="" class="btn nav-link button reg-btn">Help</a></li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>
    </header>
    <hr class="line">
    <div class="profile-page-container">
        <section class="side-nav">
            <a href="#"><img src="images/LOFTY-HEALTH-CARE-BRAND-LOGO-WHITE.png" alt="lofty-healthcare-logo" width="150px"></a>
            <nav>
                <ul class="left-nav">
                    <li><i class="bx bxs-dashboard bx-sm"></i>DashBoard</li>
                    <li><i class="bx bx-user-circle bx-sm"></i>User Profile</li>
                    <li><i class="bx bx-briefcase bx-sm"></i>Jobs</li>
                    <li><i class="bx bx-cog bx-sm"></i>Settings</li>
                </ul>
            </nav>
        </section>
        <section class="profile-page">
            <div class="top-bar">
                <li><i class="bx bxs-bell bx-sm"></i></li>
                <li> <?php echo $_SESSION["username"]?> </li>
                <li><img class="user-pic"></li>
            </div>
            <div class="greeting">
                <h1>Welcome, <?php echo $_SESSION["username"]?></h1>
                <div class="user-pic">
                    <div class="profile-picture">
                        <img id="user-photo" src="images/image-placeholder.jpg" alt="User Photo">
                    </div>
                    <div class="User-info">
                        <ul>
                            <li><strong>User Name:</strong> <span id="user-name"><?php echo $_SESSION["username"]?></span></li>
                            <li><strong>First Name:</strong> <span id="first-name"><?php echo $_SESSION["firstname"]?></span></li>
                            <li><strong>Surname:</strong> <span id="surname"><?php echo $_SESSION["surname"]?></span></li>
                            <li><strong>Gender:</strong> <span id="gender"><?php echo $_SESSION["gender"]?></span></li>
                            <li><strong>Email:</strong> <span id="email"><?php echo $_SESSION["email"]?></span></li>
                        </ul>
                        <ul>
                            <li><strong>Phone:</strong> <span id="phone"><?php echo $_SESSION["phone"]?></span></li>
                            <li><strong>Address:</strong> <span id="address"><?php echo $_SESSION["address"]?></span></li>
                            <li><strong>Profession:</strong> <span id="profession"><?php echo $_SESSION["profession"]?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="cv">
                    <ul>
                        <li><strong>CV:</strong> <a href="#" id="cv-link">View CV</a></li>
                    </ul>
                </div>
                <div class="profile-btns">
                    <a class="edit-btn" href="#">Edit Profile</a>
                    <a class="save-btn" href="#">Save</a>
                </div>
            </div>
        </section>
    </div>








    <!--<footer>
        <div class="footer">
            <div class="page-links">
                <h5>Important Links</h5>
                <ul class="footer-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="clients.html">Our Clients</a></li>
                    <li><a href="service.html">Services</a></li>
                    <li><a href="team.html">Our Team</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
            <div class="address-links">
                <h5>Lofty Healthcare</h5>
                <ul class="footer-nav">
                    <li><i class="bx bx-home bx-sm"></i>London, England</li>
                    <li><i class="bx bx-phone bx-sm"></i>+447366469803</li>
                    <li><i class="bx bx-envelope bx-sm"></i>info@loftyhealthcare.com</li>
                    <li><i class="bx bx-time bx-sm"></i>8:00am - 5:00pm</li>
                </ul>
            </div>
            <div class="social-media">
                <h5>Social Media</h5>
                <ul class="media">
                    <li>
                        <a href="#" target="blank">
                            <i class="bx bxl-instagram bx-md"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="blank">
                            <i class="bx bxl-facebook bx-md"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="blank">
                            <i class="bx bxl-twitter bx-md"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/07404650628" target="blank">
                            <i class="bx bxl-whatsapp bx-md"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <a href="index.html"><img class="footer-logo" src="/images/lofty-logo.png" alt="lofty-healthcare-logo"></a>
        </div>
    </footer> -->
    <attribute class="attribute">
        <p>&copy; 2023. Lofty HealthCare. All rights reserved.| Powered by <a class="aurora" href="https://www.auroradigitalsolutions.ng">Aurora Digital Solutions</a></p>
    </attribute>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="javascript/app.js"></script>
    <script src="/javascript/server.js"></script>
    <script src="/javascript/route.js"></script>
</body>
</html>
