<?php
class Danhsachdonhang extends Controller
{
    public $dsdonhang;
    public function __construct()
    {
        $this->dsdonhang = $this->model('DanhsachdonhangModel');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'DanhsachdonhangView',
            'masach' => $this->dsdonhang->Sach_ListAll(),
            'result' => $this->dsdonhang->donhangSearch('', '','')
        ]);
    }
    function timkiemdonhang()
    {
        if (isset($_POST['btnSearch'])) {
            $iddonhang = isset($_POST['iddonhang']) ? $_POST['iddonhang'] : '';
            $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
            $idsach = isset($_POST['masach'])?$_POST['masach']:'';
            $kq = $this->dsdonhang->donhangSearch($iddonhang, $trangthai,$idsach);
            $this->view('MasterLayout', [
                'page' => 'DanhsachdonhangView',
                'masach' => $this->dsdonhang->Sach_ListAll(),
                'result' => $kq,
                'iddonhang' => $iddonhang,
                'trangthai' => $trangthai,
                'idsach'=> $idsach
            ]);
        }

    }
    public function editdonhang($iddonhang)
    {
        $this->view("MasterLayout", [
            'page' => 'DonhangEditView',
            'masach' => $this->dsdonhang->Sach_ListAll(),
            'edit' => $this->dsdonhang->donhangEdit($iddonhang)
        ]);
    }
    function UpdateDH($iddonhang)
    {
        if (isset($_POST['btn_Luu'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $idsach = $_POST['masach'];
            $diachigiaohang = $_POST['diachigiaohang'];
            $soluong=intval($_POST['soluong']);
            $soluongs=intval($_POST['soluong'])-intval($_POST['soluongbd']);
            $giatien = $_POST['giatien'];
            $sdt=$_POST['sdt'];
            $trangthai=$_POST['trangthai'];
            $thoigian=date("Y-m-d H:i:s");

            if( $giatien==''|| $diachigiaohang==''|| $sdt==''||intval($_POST['soluong'])==0){
                $this->view("MasterLayout", [
                    'page' => "DonhangEditView",
                    'masach' => $this->dsdonhang->Sach_ListAll(),
                    'edit' => $this->dsdonhang->donhangEdit($iddonhang),
                    'thongbao' => "Bạn chưa nhập dữ liệu"
                ]);
            }else{
            $kq2= $this->dsdonhang->giamSlsach($idsach,$soluongs);
            $kq = $this->dsdonhang->donhangUpdate($idsach, $iddonhang,$giatien, $diachigiaohang, $sdt,$trangthai,$thoigian,$soluong);
            $this->view("MasterLayout", [
                'page' => "DonhangEditView",
                'result' => $kq&&$kq2,
                'edit' => $this->dsdonhang->donhangEdit($iddonhang),
                'masach' => $this->dsdonhang->Sach_ListAll()
            ]);
             }
        }
        if (isset($_POST['btn_Thoat'])) {
            $this->view('MasterLayout', [
                'page' => 'DanhsachdonhangView',
                'masach' => $this->dsdonhang->Sach_ListAll(),
                'result' => $this->dsdonhang->donhangSearch('', '', '')
            ]);
        }
    }

    function xoadonhang($iddonhang)
    {
        $kq = $this->dsdonhang->donhangDelete($iddonhang);
        if ($kq) {
            echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
            $iddonhang = isset($_POST['iddonhang']) ? $_POST['iddonhang'] : '';
            $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
            $idsach = isset($_POST['masach']) ? $_POST['masach']  : '';
            $kq = $this->dsdonhang->donhangSearch($iddonhang, $trangthai, $idsach);
            $this->view('MasterLayout', [
                'page' => 'DanhsachdonhangView',
                'masach' => $this->dsdonhang->Sach_ListAll(),
                'result' => $kq,
                'iddonhang' => $iddonhang,
                'trangthai' => $trangthai,
                'idsach' => $idsach
            ]);
        } else {
            echo "<script type='text/javascript'>alert('Xóa không thành công!');</script>";
            $iddonhang = isset($_POST['iddonhang']) ? $_POST['iddonhang'] : '';
            $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
            $idsach = isset($_POST['masach']) ? $_POST['masach']  : '';
            $kq = $this->dsdonhang->donhangSearch($iddonhang, $trangthai, $idsach);
            $this->view('MasterLayout', [
                'page' => 'DanhsachdonhangView',
                'theloai' => $this->dsdonhang->Theloai_ListAll(),
                'result' => $kq,
                'iddonhang' => $iddonhang,
                'trangthai' => $trangthai,
                'idsach' => $idsach
            ]);
        }
    }
}
