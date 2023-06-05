const express = require('express');
const router = express.Router();
const reg = require('../javascript/reg-submit');
router.get('/', reg.form);
router.post('/', reg.formprocess);