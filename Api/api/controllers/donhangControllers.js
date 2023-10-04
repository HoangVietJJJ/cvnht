'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../db');

// Sửa donhang
exports.EditDonhang = function (req, res) {
    let sql = 'UPDATE donhang SET  idsach=?, giatien=?, diachigiaohang=?, sdt=?, trangthai=?, thoigian=?, soluong=? WHERE iddonhang=?';
    db.query(sql, [ req.body.idsach, req.body.giatien, req.body.diachigiaohang, req.body.sdt, req.body.trangthai, req.body.thoigian, req.body.soluong, req.params.iddonhang], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm donhang
exports.InsertDonhang = function (req, res) {
    let sql = 'INSERT INTO donhang VALUE ( ?, NULL, ?, ?, ?, ?, ?, ?)'  
    db.query(sql, [  req.body.idsach, req.body.giatien, req.body.diachigiaohang, req.body.sdt
        , req.body.trangthai, req.body.thoigian, req.body.soluong], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
      
   
};


// Sửa donhang IF
exports.EditDonhangIF = function (req, res) {
    let sql = 'SELECT * FROM donhang WHERE iddonhang = ?';
    db.query(sql, [req.params.iddonhang], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Donhang không tồn tại' });
        }
        res.json(response);
    });
};

// Lấy toàn bộ donhang
exports.GetAllDonhang = function (req, res) {
    let sql = 'SELECT * FROM donhang';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa donhang
exports.DeleteDonhang = function (req, res) {
    let sql = 'DELETE FROM donhang WHERE iddonhang = ?';
    db.query(sql, [req.params.iddonhang], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Donhang không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm donhang
exports.getDonhangByinfo = function (req, res) {
    let iddonhang = req.body.iddonhang;
    let trangthai = req.body.trangthai;
    let idsach = req.body.idsach;
    let sql = 'SELECT donhang.*,sach.tensach FROM donhang,sach WHERE sach.idsach = donhang.idsach ';
    
    if (iddonhang) {
        sql += ' and iddonhang LIKE "%' + iddonhang + '%"';
    }
    
    if (trangthai ) {
        sql += ' and trangthai LIKE "%' + trangthai + '%"';
    }

    if (idsach ) {
        sql += ' and donhang.idsach = ' + idsach +'';
    }



    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng donhang
exports.CheckTrungDonhang = function (req, res) {
    const iddonhang = req.query.iddonhang;

    const sql = 'SELECT iddonhang FROM donhang WHERE iddonhang = ?';
    db.query(sql, [iddonhang], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Donhang đã tồn tại' });
        } else {
            res.json({ message: 'Donhang không tồn tại' });
        }
    });
};
