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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"/>
    <title>Lofty Healthcare Website</title>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/index.html" title="This link takes you to lofty logo home page" class="slide-in-left"><img class="logo" src="images/lofty-logo.png" alt="lofty-healthcare-logo"></a>
                <!-- <ul class="menu">
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Our Clients</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Our Team</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact Us</a></li>
                    <li class="nav-item"><a href="login.html" class="btn nav-link button">Login</a></li>
                    <li class="nav-item"><a href="register.html" class="btn nav-link button reg-btn">Register</a></li>
                </ul> -->
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>
    </header>
    <hr class="line">
    <section class="container">
        <!-- <div class="contact">
            <img src="images/lhcstaff.png" class="contact-hero" alt="a-picture-depicting-lofty-staff-members"/>
        </div> -->
        <!-- <div class="contact-message">
            <h1 class="slide-in-right">Join our excellent work force.</h1>
            <p class="slide-in-left">Fill in your details below. </p>
        </div> -->
    </section>
    <div class="form" id="register">
        <h2>Edit your profile details</h2>

        <?php
        // Check if an error message is present in the URL query parameters
        if (isset($_GET['error']) && $_GET['error'] === 'usernotfound') {
            echo '<p style="color:red">User does not exist!</p>';
         }

        if (isset($_GET['error']) && $_GET['error'] === 'usernameexists') {
             echo '<p style="color:red">Username already exists!</p>';
          }

        ?>


        <form id="registration-form" action="includes/update.inc.php" method="post" enctype="multipart/form-data">
            <div class="names-section">
                <div class="form-tip">
                    <label for="user-name">User Name:</label>
                    <input type="text" id="user-name" name="user-name" value=<?php echo $_SESSION["username"];?> required>
                </div>
            </div>
            <div class="names-section">
                <div class="form-tip">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first-name" value=<?php echo $_SESSION["firstname"];?> required>
                </div>
                <div class="form-tip">
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" value=<?php echo $_SESSION["surname"];?> required>
                </div>
                <div class="form-tip">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" value=<?php echo $_SESSION["gender"];?> required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
            <div class="contacts-section">
                <div class="form-tip">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value=<?php echo $_SESSION["email"];?> required>
                </div>
                <div class="form-tip">
                    <label for="phone">Phone:</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i id="selectedFlag"></i>
                        </span>
                    </div>
                    <select id="countryCode" name="countryCode" value=<?php echo $_SESSION["countrycode"];?> required>
                        <option value="+1" data-flag="us">+1 (USA)</option>
                        <option value="+44" data-flag="uk">+44 (UK)</option>
                        <option value="+91" data-flag="in">+91 (India)</option>
                        <option value="+234" data-flag="ng">+234 (Nigeria)</option>
                        <!-- Add more options as needed -->
                    </select>
                    <input type="tel" id="phoneNumber" name="phoneNumber" value=<?php echo $_SESSION["phone"];?> required>
                </div>
            </div>
            <div class="address">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value=<?php echo $_SESSION["address"];?> required>
            </div>
            <!-- <div class="uploads">
                <label for="email">Upload CV:</label>
                <input type="file" id="cv" name="cv" required>

                <label for="picture">Upload Picture:</label>
                <input type="file" id="picture" name="picture" required>
            </div> -->
            <div>
                <label for="profession">Medical Profession:</label>
                <select id="profession" name="profession" value=<?php echo $_SESSION["profession"];?> required>
                    <option value="">Select a profession</option>
                    <option value="doctor">Doctor</option>
                    <option value="nurse">Nurse</option>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="care-giver">Care Giver</option>
                    <option value="lab-officer">Laboratory Officer</option>
                    <option value="janitor">Janitor</option>
                    <option value="midwife">Midwife</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button type="submit" class="reg-btn" name="submit">Update</button>
        </form>
    </div>
    <footer>
        <div class="footer">
            <!-- <div class="page-links">
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
            </div> -->
            <!-- <div class="address-links">
                <h5>Lofty Healthcare</h5>
                <ul class="footer-nav">
                    <li><i class="bx bx-home bx-sm"></i>London, England</li>
                    <li><i class="bx bx-phone bx-sm"></i>+447366469803</li>
                    <li><i class="bx bx-envelope bx-sm"></i>info@loftyhealthcare.com</li>
                    <li><i class="bx bx-time bx-sm"></i>8:00am - 5:00pm</li>
                </ul>
            </div> -->
            <!-- <div class="social-media">
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
            </div> -->
            <a href="index.html"><img class="footer-logo" src="images/lofty-logo.png" alt="lofty-healthcare-logo"></a>
        </div>
    </footer>
    <attribute class="attribute">
        <p>&copy; 2023. Lofty HealthCare. All rights reserved.| Powered by <a class="aurora" href="https://www.auroradigitalsolutions.ng">Aurora Digital Solutions</a></p>
    </attribute>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="javascript/app.js"></script>
    <script src="javascript/server.js"></script>
    <script src="javascript/route.js"></script>
</body>
</html>
