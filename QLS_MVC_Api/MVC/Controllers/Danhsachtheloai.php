<?php
class Danhsachtheloai extends Controller
{
    public $dstheloai;
    public function __construct()
    {
        $this->dstheloai = $this->model('DanhsachtheloaiModel');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'DanhsachtheloaiView',
            'result' => $this->dstheloai->theloaiSearch('', '')
        ]);
    }
    function timkiemtheloai()
    {
        if (isset($_POST['btnSearch'])) {
            $idtheloai = isset($_POST['idtheloai']) ? $_POST['idtheloai'] : '';
            $tentheloai = isset($_POST['tentheloai']) ? $_POST['tentheloai'] : '';
            $kq = $this->dstheloai->theloaiSearch($idtheloai, $tentheloai);
            $this->view('MasterLayout', [
                'page' => 'DanhsachtheloaiView',
                'result' => $kq,
                'idtheloai' => $idtheloai,
                'tentheloai' => $tentheloai
            ]);
        }

    }
    public function edittheloai($idtheloai)
    {
        $this->view("MasterLayout", [
            'page' => 'TheloaiEditView',
            'edit' => $this->dstheloai->theloaiEdit($idtheloai)
        ]);
    }
    function UpdateTL($idtheloai)
    {
        if (isset($_POST['btn_Luu'])) {
            $tentheloai = $_POST['tentheloai'];
            $kq = $this->dstheloai->theloaiUpdate($idtheloai, $tentheloai);
            $this->view("MasterLayout", [
                'page' => "TheloaiEditView",
                'result' => $kq,
                'edit' => $this->dstheloai->theloaiEdit($idtheloai)
            ]);
        }
        if (isset($_POST['btn_Thoat'])) {
            $this->view('MasterLayout', [
                'page' => 'DanhsachtheloaiView',
                'result' => $this->dstheloai->theloaiSearch('', '')
            ]);
        }
    }

    function xoatheloai($idtheloai)
    {
        $kq = $this->dstheloai->theloaiDelete($idtheloai);
        if ($kq) {
            echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
            $idtheloai = isset($_POST['idtheloai']) ? $_POST['idtheloai'] : '';
            $tentheloai = isset($_POST['tentheloai']) ? $_POST['tentheloai'] : '';
            $kq = $this->dstheloai->theloaiSearch($idtheloai, $tentheloai);
            $this->view('MasterLayout', [
                'page' => 'DanhsachtheloaiView',
                'theloai' => $this->dstheloai->Theloai_ListAll(),
                'result' => $kq,
                'idtheloai' => $idtheloai,
                'tentheloai' => $tentheloai
            ]);
        } else {
            echo "<script type='text/javascript'>alert('Xóa không thành công!');</script>";
            $idtheloai = isset($_POST['idtheloai']) ? $_POST['idtheloai'] : '';
            $tentheloai = isset($_POST['tentheloai']) ? $_POST['tentheloai'] : '';
            $kq = $this->dstheloai->theloaiSearch($idtheloai, $tentheloai);
            $this->view('MasterLayout', [
                'page' => 'DanhsachtheloaiView',
                'result' => $kq,
                'idtheloai' => $idtheloai,
                'tentheloai' => $tentheloai
            ]);
        }
    }
}
