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

// Verify the MySQL connection
pool.getConnection((err, connection) => {
    if (err) {
      console.error('Error connecting to MySQL:', err);
      return;
    }
  
    console.log('Connected to MySQL!');
  
    // Perform a test query
    connection.query('SELECT 1 + 1 AS result', (err, results) => {
      connection.release(); // Release the connection back to the pool
  
      if (err) {
        console.error('Error executing query:', err);
        return;
      }
  
      console.log('MySQL query result:', results[0].result);
    });
  });
  

//Define a route to handle the form submission
app.post('/register', upload.fields([{ name: 'cv', maxCount: 1 }, { name: 'picture', maxCount: 1 }]),(req,res) => {
    const{
        'user-name': username,
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
      INSERT INTO registration_form_details
      (username, password, confirm_password, first_name, surname, gender, email, country_code, phone_number, address, cv, picture, profession)
      VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;

    const cvPath = req.files['CV'][0].path;
    const picturePath = req.files['PICTURE'][0].path;

    pool.query(
        query,[ username, password, confirmPassword, firstName, surname, gender, email, countryCode, phoneNumber, address, cvPath, picturePath, profession],
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
