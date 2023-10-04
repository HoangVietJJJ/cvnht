'use strict';
module.exports = function (app) {
    let userControllers = require('./controllers/userControllers');
    let theloaiControllers = require('./controllers/theloaiControllers');
    let donhangControllers = require('./controllers/donhangControllers');
    let sachControllers = require('./controllers/sachControllers');


    app.route('/sach')
        .get(sachControllers.GetAllSach);
    app.route('/sach/EditIF/:idsach')
        .get(sachControllers.EditSachIF);
    app.route('/sach/Insert')
        .post(sachControllers.InsertSach);
    app.route('/sach/EditSl/:idsach')
        .put(sachControllers.EditSlSach);
    app.route('/sach/Edit/:idsach')
        .put(sachControllers.EditSach);
    app.route('/sach/Delete/:idsach')
        .delete(sachControllers.DeleteSach);
    app.route('/sach/Search')
        .post(sachControllers.getSachByinfo);
    app.route('/sach/Check')
        .get(sachControllers.CheckTrungSach);
    //////////////////////////////////////
    app.route('/theloai')
        .get(theloaiControllers.getTheloai);
    app.route('/theloai/EditIF/:idtheloai')
        .get(theloaiControllers.EditTheloaiIF);
    app.route('/theloai/Insert')
        .post(theloaiControllers.InsertTheloai);
    app.route('/theloai/Edit/:idtheloai')
        .put(theloaiControllers.EditTheloai);
    app.route('/theloai/Delete/:idtheloai')
        .delete(theloaiControllers.DeleteTheloai);
    app.route('/theloai/Search')
        .post(theloaiControllers.getTheloaiByinfo);
    app.route('/theloai/Check')
        .get(theloaiControllers.CheckTrungTheloai);
    ///////////////////////////////////////////
    app.route('/user')
        .get(userControllers.GetAllUser);
    app.route('/user/EditIF/:taikhoan')
        .get(userControllers.EditUserIF);
    app.route('/user/Insert')
        .post(userControllers.InsertUser);
    app.route('/user/Edit/:taikhoan')
        .put(userControllers.EditUser);
    app.route('/user/Delete/:taikhoan')
        .delete(userControllers.DeleteUser);
    app.route('/user/Search')
        .post(userControllers.getUserByinfo);
    app.route('/user/Check')
        .get(userControllers.CheckTrungUser);
    /////////////////////////////////////////////
    app.route('/donhang')
        .get(donhangControllers.GetAllDonhang);
    app.route('/donhang/EditIF/:iddonhang')
        .get(donhangControllers.EditDonhangIF);
    app.route('/donhang/Insert')
        .post(donhangControllers.InsertDonhang);
    app.route('/donhang/Edit/:iddonhang')
        .put(donhangControllers.EditDonhang);
    app.route('/donhang/Delete/:iddonhang')
        .delete(donhangControllers.DeleteDonhang);
    app.route('/donhang/Search')
        .post(donhangControllers.getDonhangByinfo);
    app.route('/donhang/Check')
        .get(donhangControllers.CheckTrungDonhang);

};
