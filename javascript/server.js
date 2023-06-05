const express = require('express');
const multer = require('multer');
const mysql = require('mysql2');

const app = express();
const upload = multer({ dest: 'uploads/'});

//Create MySQL connection pool
const pool = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: 'Ed/12c/2625',
    database: 'registration',
});

//Define a route to handle the form submission
app.post('/register', upload.fields([{ name: 'cv', maxCount: 1 }, { name: 'picture', maxCount: 1 }]),(req,res) => {
    const{
        username,
        password,
        'confirm-password': confirmPassword,
        'first-name': firstName,
        surname,
        gender,
        email,
        countryCode,
        phoneNumber,
        address,
        profession,
    } = req.body;

    // Validate the form data (e.g., check if passwords match, validate email format, etc.)
    // Insert the data into the database
    const query = `
      INSERT INTO registration form details
      (USER NAME, PASSWORD, CONFIRM PASSWORD, FIRST NAME, SURNAME, GENDER, EMAIL, COUNTRY CODE, PHONE NUMBER, ADDRESS, CV, PICTURE, PROFESSION)
      VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;

    const cvPath = req.files['CV'][0].path;
    const picturePath = req.files['PICTURE'][0].path;

    pool.query(
        query,[ USERNAME, PASSWORD, CONFIRMPASSWORD, FIRSTNAME, SURNAME, GENDER, EMAIL, COUNTRYCODE, PHONENUMBER, ADDRESS, CV, PICTURE, PROFESSION],
        (err, results) => {
            if (err) {
                console.error('Error inserting data:', err);
                return res.status(500).send('Internal Server Error');
            }
            res.send('Registration Successful!');

        }
    );
});

//start the server
app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
