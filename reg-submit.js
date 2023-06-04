const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3000;

//configure mysql connection
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password:'1234',
    database: 'registrants'
});

//connect to mysql
connection.connect((err) => {
    if (err){
        console.error('Error connecting to MySQL: ', err);
        return;
    }
    console.log('Connected to MySQL');
})