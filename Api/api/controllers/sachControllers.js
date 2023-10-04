'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../db');

// Sửa sách
exports.EditSach = function (req, res) {
    let sql = 'UPDATE sach SET tensach=?, idtheloai=?, soluong=?, gia=? WHERE idsach=?';
    db.query(sql, [req.body.tensach, req.body.idtheloai, req.body.soluong, req.body.gia, req.params.idsach], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
exports.EditSlSach = function (req, res) {
    let sql = 'UPDATE sach SET soluong=soluong-? WHERE idsach=?';
    db.query(sql, [ req.body.soluong, req.params.idsach], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// Thêm sách
exports.InsertSach = function (req, res) {
    let sql = 'INSERT INTO sach VALUES (NULL, ?, ?, ?, ?)';
    db.query(sql, [ req.body.tensach, req.body.gia, req.body.idtheloai, req.body.soluong], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa sách IF
exports.EditSachIF = function (req, res) {
    let sql = 'SELECT * FROM sach WHERE idsach = ?';
    db.query(sql, [req.params.idsach], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Sách không tồn tại' });
        }
        res.json(response);
    });
}; 

// Lấy toàn bộ sách
exports.GetAllSach = function (req, res) {
    let sql = 'SELECT * FROM sach';
    db.query(sql,[req.params.id], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa sách
exports.DeleteSach = function (req, res) {
    let sql = 'DELETE FROM sach WHERE idsach = ?';
    db.query(sql, [req.params.idsach], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Sách không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm sách
exports.getSachByinfo = function (req, res) {
    let idsach = req.body.idsach;
    let tensach = req.body.tensach;
    let idtheloai = req.body.idtheloai;

    let sql = 'SELECT sach.*, theloai.tentheloai FROM sach, theloai WHERE sach.idtheloai = theloai.idtheloai';

    if (idsach) {
        sql += ' AND sach.idsach LIKE "%' + idsach + '%"';
    }
    if (tensach) {
        sql += ' AND sach.tensach LIKE "%' + tensach + '%"';
    }
    if (idtheloai) {
        sql += ' AND sach.idtheloai LIKE "%' + idtheloai + '%"';
    }

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng sách
exports.CheckTrungSach = function (req, res) {
    const idsach = req.query.idsach;

    const sql = 'SELECT idsach FROM sach WHERE idsach = ?';
    db.query(sql, [idsach], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Sách đã tồn tại' });
        } else {
            res.json({ message: 'Sách không tồn tại' });
        }
    });
};
