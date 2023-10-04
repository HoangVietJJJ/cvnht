'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('../db')

module.exports = {
    get: (req, res) => {
        let sql = 'SELECT * FROM sinhvien'
        db.query(sql, (err, response) => {
            if (err) throw err
            res.json(response);
        })
    },
    detail: (req, res) => {
        let sql = 'SELECT * FROM sinhvien WHERE masv = ?'
        db.query(sql, [req.params.masv], (err, response) => {
            if (err) throw err
            res.json(response[0]);
        })
    },
    update: (req, res) => {
        let data = req.body;
        let masv = req.params.masv;
        let sql = 'UPDATE sinhvien SET ? WHERE masv = ?'
        db.query(sql, [data, masv], (err, response) => {
            if (err) throw err
            res.json({ message: 'Update success!' })
        })
    },
    store: (req, res) => {
        let data = req.body;
        let sql = 'INSERT INTO lophoc (malop, tenlop, manganh) VALUES (?, ?, ?)';
        db.query(sql, [data.malop, data.tenlop, data.manganh], (err, response) => {
            if (err) throw err;
            res.json({ message: 'Insert success!' });
        });
    },


    delete: (req, res) => {
        let sql = 'DELETE FROM sinhvien WHERE masv = ?'
        db.query(sql, [req.params.masv], (err, response) => {
            if (err) throw err
            res.json({ message: 'Delete success!' })
        })
    }
}
