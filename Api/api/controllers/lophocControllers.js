'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../db');

// Sửa lớp
exports.EditLop = function (req, res) {
    let sql = 'UPDATE lophoc SET tenlop=?, manganh=? WHERE malop=?';
    db.query(sql, [req.body.tenlop, req.body.manganh, req.params.malop], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm lớp
exports.InsertLop = function (req, res) {
    let sql = 'INSERT INTO lophoc VALUES (NULL, ?, ?, ?)';
    db.query(sql, [req.body.malop, req.body.tenlop, req.body.manganh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa lớp IF
exports.EditLopIF = function (req, res) {
    let sql = 'SELECT * FROM lophoc WHERE malop = ?';
    db.query(sql, [req.params.malop], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Lớp học không tồn tại' });
        }
        res.json(response);
    });
};

// Lấy toàn bộ lớp
exports.GetAllLop = function (req, res) {
    let sql = 'SELECT * FROM lophoc';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa lớp
exports.DeleteLop = function (req, res) {
    let sql = 'DELETE FROM lophoc WHERE malop = ?';
    db.query(sql, [req.params.malop], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Lớp học không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm lớp
exports.getLopByinfo = function (req, res) {
    let malop = req.body.malop;
    let tenlop = req.body.tenlop;
    let manganh = req.body.nganhhoc;

    let sql = 'SELECT lophoc.*, nganhhoc.tennganh FROM lophoc, nganhhoc WHERE lophoc.manganh = nganhhoc.manganh';

    if (malop) {
        sql += ' AND lophoc.malop LIKE "%' + malop + '%"';
    }
    if (tenlop) {
        sql += ' AND lophoc.tenlop LIKE "%' + tenlop + '%"';
    }
    if (manganh) {
        sql += ' AND lophoc.manganh LIKE "%' + manganh + '%"';
    }

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng lớp
exports.CheckTrungLop = function (req, res) {
    const malop = req.query.malop;

    const sql = 'SELECT malop FROM lophoc WHERE malop = ?';
    db.query(sql, [malop], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Lớp học đã tồn tại' });
        } else {
            res.json({ message: 'Lớp học không tồn tại' });
        }
    });
};
