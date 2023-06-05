const express = require('express');
const mysql = require('mysql2');

const app = express();
const port = 3000;

//configure mysql connection
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password:'Ed/12c/2625',
    database: 'registrants',
    authPlugins: {}
});

//connect to mysql
connection.connect((err) => {
    if (err){
        console.error('Error connecting to MySQL: ', err);
        return;
    }
    console.log('Connected to MySQL');
});

//middleware to parse incoming request bodies as json
app.use(express.json());

//serve static files
app.use(express.static('public'));

//start the server
app.listen(port, () => {
    console.log('Server running on port ${port}');
});

