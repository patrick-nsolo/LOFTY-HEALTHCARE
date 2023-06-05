const express = require('express');
exports.form = (req,res) => {
    res.sendFile('forms/reg-submit.html', {root: '.'});
}

exports.formprocess = (req,res) => {
    console.log(req.body);
    res.write('<h1>Your registration was succesful!</h1>' +req.body.name);
    //enter other code
    res.end();
}
