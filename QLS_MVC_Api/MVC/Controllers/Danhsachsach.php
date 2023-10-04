<?php
class Danhsachsach extends Controller
{
    public $dssach;
    public function __construct()
    {
        $this->dssach = $this->model('DanhsachsachModel');
    }
    function Get_data()
    {

        $this->view('MasterLayout', [
            'page' => 'DanhsachsachView',
            'theloai' => $this->dssach->Theloai_ListAll(),
            'result' => $this->dssach->sachSearch('', '', '')
        ]);
    }
    function timkiemsach()
    {
        if (isset($_POST['btnSearch'])) {
            $idsach = isset($_POST['idsach']) ? $_POST['idsach'] : '';
            $tensach = isset($_POST['tensach']) ? $_POST['tensach'] : '';
            $idtheloai = isset($_POST['theloai']) ? $_POST['theloai']  : '';
            $kq = $this->dssach->sachSearch($idsach, $tensach, $idtheloai);
            $this->view('MasterLayout', [
                'page' => 'DanhsachsachView',
                'theloai' => $this->dssach->Theloai_ListAll(),
                'result' => $kq,
                'idsach' => $idsach,
                'tensach' => $tensach,
                'idtheloai' => $idtheloai
            ]);
        }

    }
    public function editsach($idsach)
    {
        $this->view("MasterLayout", [
            'page' => 'SachEditView',
            'theloai' => $this->dssach->Theloai_ListAll(),
            'edit' => $this->dssach->sachEdit($idsach)
        ]);
    }
    function UpdateS($idsach)
    {
        if (isset($_POST['btn_Luu'])) {
            $tensach = $_POST['tensach'];
            $idtheloai = $_POST['theloai'];
            $soluong= $_POST['soluong'];
            $gia = $_POST['gia'];
            $kq = $this->dssach->sachUpdate($idsach, $tensach, $idtheloai,$soluong,$gia);
            $this->view("MasterLayout", [
                'page' => "SachEditView",
                'result' => $kq,
                'edit' => $this->dssach->sachEdit($idsach),
                'theloai' => $this->dssach->Theloai_ListAll()
            ]);
        }
        if (isset($_POST['btn_Thoat'])) {
            $this->view('MasterLayout', [
                'page' => 'DanhsachsachView',
                'theloai' => $this->dssach->Theloai_ListAll(),
                'result' => $this->dssach->sachSearch('', '', '')
            ]);
        }
    }

    function xoasach($idsach)
    {
        $kq = $this->dssach->sachDelete($idsach);
        if ($kq) {
            echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
            $idsach = isset($_POST['idsach']) ? $_POST['idsach'] : '';
            $tensach = isset($_POST['tensach']) ? $_POST['tensach'] : '';
            $idtheloai = isset($_POST['theloai']) ? $_POST['theloai']  : '';
            $kq = $this->dssach->sachSearch($idsach, $tensach, $idtheloai);
            $this->view('MasterLayout', [
                'page' => 'DanhsachsachView',
                'theloai' => $this->dssach->Theloai_ListAll(),
                'result' => $kq,
                'idsach' => $idsach,
                'tensach' => $tensach,
                'idtheloai' => $idtheloai
            ]);
        } else {
            echo "<script type='text/javascript'>alert('Xóa không thành công!');</script>";
            $idsach = isset($_POST['idsach']) ? $_POST['idsach'] : '';
            $tensach = isset($_POST['tensach']) ? $_POST['tensach'] : '';
            $idtheloai = isset($_POST['theloai']) ? $_POST['theloai']  : '';
            $kq = $this->dssach->sachSearch($idsach, $tensach, $idtheloai);
            $this->view('MasterLayout', [
                'page' => 'DanhsachsachView',
                'theloai' => $this->dssach->Theloai_ListAll(),
                'result' => $kq,
                'idsach' => $idsach,
                'tensach' => $tensach,
                'idtheloai' => $idtheloai
            ]);
        }
    }
}
