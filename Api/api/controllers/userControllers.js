'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../db');

// Sửa user
exports.EditUser = function (req, res) {
    let sql = 'UPDATE user SET matkhau=?, ten=?, tuoi=?, gioitinh=?, email=?, diachi=?, sdt=? WHERE taikhoan=?';
    db.query(sql, [req.body.matkhau, req.body.ten, req.body.tuoi, req.body.gioitinh, req.body.email, req.body.diachi, req.body.sdt, req.params.taikhoan], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm user
exports.InsertUser = function (req, res) {
    let sql = 'INSERT INTO user VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    db.query(sql, [ req.body.taikhoan,req.body.matkhau, req.body.ten, req.body.tuoi, req.body.gioitinh, req.body.email, req.body.diachi, req.body.sdt], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa user IF
exports.EditUserIF = function (req, res) {
    let sql = 'SELECT * FROM user WHERE taikhoan = ?';
    db.query(sql, [req.params.taikhoan], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'User không tồn tại' });
        }
        res.json(response);
    });
};


// Lấy toàn bộ user
exports.GetAllUser = function (req, res) {
    let sql = 'SELECT * FROM user';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa user
exports.DeleteUser = function (req, res) {
    let sql = 'DELETE FROM user WHERE taikhoan = ?';
    db.query(sql, [req.params.taikhoan], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'User không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm user
exports.getUserByinfo = function (req, res) {
    let taikhoan = req.body.taikhoan;
    let ten = req.body.ten;

    let sql = 'SELECT * FROM user  ';
    if(taikhoan||ten){
        sql += 'WHERE';
    
    if (taikhoan) {
        sql += ' taikhoan LIKE "%' + taikhoan + '%"';
    }
    if(ten&&taikhoan){sql += ' AND';}

    if (ten) {
        sql += ' ten LIKE "%' + ten + '%"';
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

// Kiểm tra trùng user
exports.CheckTrungUser = function (req, res) {
    const taikhoan = req.query.taikhoan;
    const matkhau = req.query.matkhau;
    const sql = 'SELECT taikhoan FROM user WHERE taikhoan = ? and matkhau = ?';
    db.query(sql, [taikhoan,matkhau], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if(response.length>0){
            res.json(response);
        }else{
            return res.status(404).json({ message: 'User không tồn tại' });
        }
            
    });
};
