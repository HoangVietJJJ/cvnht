'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('../db')

exports.getNganhhoc = function (req, res) {
    let sql = 'SELECT * FROM nganhhoc ';
    db.query(sql, [req.params.id], (err, response) => {
        if (err) throw err;
        res.json(response);
    });
}
// module.exports = {
//     get: (req, res) => {
//         let sql = 'SELECT * FROM nganhhoc'
//         db.query(sql, (err, response) => {
//             if (err) throw err
//             res.json(response);
//         })
//     },
//     detail: (req, res) => {
//         let sql = 'SELECT * FROM nganhhoc WHERE id = ?'
//         db.query(sql, [req.params.id], (err, response) => {
//             if (err) throw err
//             res.json(response[0]);
//         })
//     },
//     update: (req, res) => {
//         let data = req.body;
//         let id = req.params.id;
//         let sql = 'UPDATE nganhhoc SET ? WHERE id = ?'
//         db.query(sql, [data, id], (err, response) => {
//             if (err) throw err
//             res.json({ message: 'Update success!' })
//         })
//     },
//     store: (req, res) => {
//         let data = req.body;
//         let sql = 'INSERT INTO nganhhoc SET ?'
//         db.query(sql, [data], (err, response) => {
//             if (err) throw err
//             res.json({ message: 'Insert success!' })
//         })
//     },
//     delete: (req, res) => {
//         let sql = 'DELETE FROM nganhhoc WHERE id = ?'
//         db.query(sql, [req.params.id], (err, response) => {
//             if (err) throw err
//             res.json({ message: 'Delete success!' })
//         })
//     }
// }
