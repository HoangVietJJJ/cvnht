<?php
class Danhsachuser extends Controller
{
    public $dsuser;
    public function __construct()
    {
        $this->dsuser = $this->model('DanhsachuserModel');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'DanhsachuserView',
            'result' => $this->dsuser->userSearch('', '')
        ]);
    }
    function timkiemuser()
    {
        if (isset($_POST['btnSearch'])) {
            $taikhoan = isset($_POST['taikhoan']) ? $_POST['taikhoan'] : '';
            $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
            $kq = $this->dsuser->userSearch($taikhoan, $ten);
            $this->view('MasterLayout', [
                'page' => 'DanhsachuserView',
                'result' => $kq,
                'taikhoan' => $taikhoan,
                'ten' => $ten
            ]);
        }

    }
    public function edituser($taikhoan)
    {
        $this->view("MasterLayout", [
            'page' => 'UserEditView',
            'edit' => $this->dsuser->userEdit($taikhoan)
        ]);
    }
    function UpdateU($taikhoan)
    {
        if (isset($_POST['btn_Luu'])) {
            $matkhau= $_POST['matkhau'];
            $ten = $_POST['ten'];
            $gioitinh= $_POST['gioitinh'];
            $tuoi= $_POST['tuoi'];
            $email= $_POST['email'];
            $diachi= $_POST['diachi'];
            $sdt= $_POST['sdt'];
            $kq = $this->dsuser->userUpdate($taikhoan,$matkhau, $ten,$gioitinh,$tuoi,$email,$diachi,$sdt);
            $this->view("MasterLayout", [
                'page' => "UserEditView",
                'result' => $kq,
                'edit' => $this->dsuser->userEdit($taikhoan)
            ]);
        }
        if (isset($_POST['btn_Thoat'])) {
            $this->view('MasterLayout', [
                'page' => 'DanhsachuserView',
                'result' => $this->dsuser->userSearch('', '')
            ]);
        }
    }

    function xoauser($taikhoan)
    {
        $kq = $this->dsuser->userDelete($taikhoan);
        if ($kq) {
            echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
            $taikhoan = isset($_POST['taikhoan']) ? $_POST['taikhoan'] : '';
            $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
            $kq = $this->dsuser->userSearch($taikhoan, $ten);
            $this->view('MasterLayout', [
                'page' => 'DanhsachuserView',
                'result' => $kq,
                'taikhoan' => $taikhoan,
                'ten' => $ten
            ]);
        } else {
            echo "<script type='text/javascript'>alert('Xóa không thành công!');</script>";
            $taikhoan = isset($_POST['taikhoan']) ? $_POST['taikhoan'] : '';
            $ten= isset($_POST['ten']) ? $_POST['ten'] : '';
            $kq = $this->dsuser->userSearch($taikhoan, $ten);
            $this->view('MasterLayout', [
                'page' => 'DanhsachuserView',
                'result' => $kq,
                'taikhoan' => $taikhoan,
                'ten' => $ten
            ]);
        }
    }
}
