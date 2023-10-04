'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('../db')

exports.getTheloai = function (req, res) {
    let sql = 'SELECT * FROM theloai ';
    db.query(sql, [req.params.id], (err, response) => {
        if (err) throw err;
        res.json(response);
    });
}

// Lấy toàn bộ Thể Loại
exports.GetAllTheloai = function (req, res) {
    let sql = 'SELECT * FROM theloai';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa Thể Loại
exports.EditTheloai = function (req, res) {
    let sql = 'UPDATE theloai SET tentheloai=? WHERE idtheloai=?';
    db.query(sql, [req.body.tentheloai, req.params.idtheloai], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm Thể Loại
exports.InsertTheloai = function (req, res) {
    let sql = 'INSERT INTO theloai VALUES (NULL, ?)';
    db.query(sql, [ req.body.tentheloai], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa Thể Loại IF
exports.EditTheloaiIF = function (req, res) {
    let sql = 'SELECT * FROM theloai WHERE idtheloai = ?';
    db.query(sql, [req.params.idtheloai], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Thể Loại không tồn tại' });
        }
        res.json(response);
    });
};



// Xóa Thể Loại
exports.DeleteTheloai = function (req, res) {
    let sql = 'DELETE FROM theloai WHERE idtheloai = ?';
    db.query(sql, [req.params.idtheloai], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Thể Loại không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm Thể Loại
exports.getTheloaiByinfo = function (req, res) {
    let idtheloai = req.body.idtheloai;
    let tentheloai = req.body.tentheloai;

    let sql = 'SELECT * FROM theloai ';
    if(idtheloai||tentheloai){
        sql += 'WHERE ';
    if (idtheloai) {
        sql += ' idtheloai LIKE "%' + idtheloai + '%"';
    }
    if(idtheloai&&tentheloai) {sql += ' AND';}
    if (tentheloai) {
        sql += ' tentheloai LIKE "%' + tentheloai + '%"';
    }
    
    }

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng Thể Loại
exports.CheckTrungTheloai = function (req, res) {
    const idtheloai = req.query.idtheloai;

    const sql = 'SELECT idtheloai FROM theloai WHERE idtheloai = ?';
    db.query(sql, [idtheloai], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Thể Loại đã tồn tại' });
        } else {
            res.json({ message: 'Thể Loại không tồn tại' });
        }
    });
};
