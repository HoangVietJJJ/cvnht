<?php
class Donhang extends Controller
{
    public $donhang;

    public function __construct()
    {
        $this->donhang = $this->model('DonhangApi');
    }

    function Get_data()
    {
        $this->view("MasterLayout", [
            'page' => "DonhangView",
            'masach' => $this->donhang->Sach_ListAll()
        ]);
    }

    function themdonhang()
    {
        if (isset($_POST['btn_Luu'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $idsach =$_POST['masach'];
            $giatien=$_POST['giatien'];
            $diachigiaohang=$_POST['diachigiaohang'];
            $sdt=$_POST['sdt'];
            $trangthai=$_POST['trangthai'];
            $thoigian=date("Y-m-d H:i:s");
            $soluong=$_POST['soluong'];
                
                if( $idsach==''|| $giatien==''|| $diachigiaohang==''|| $sdt==''||$trangthai==''||$soluong==''){
                    $this->view("MasterLayout", [
                        'page' => "DonhangView",
                        'masach' => $this->donhang->Sach_ListAll(),
                        'thongbao' => "Bạn chưa nhập dữ liệu"
                    ]);
                }
                else{
                $kq = $this->donhang->AddDonhang($idsach,$giatien, $diachigiaohang, $sdt,$trangthai,$thoigian,$soluong);
                $kq2= $this->donhang->giamSlsach($idsach,$soluong);
                $this->view("MasterLayout", [
                    'page' => "DonhangView",
                    'masach' => $this->donhang->Sach_ListAll(),
                    'result' => $kq&&$kq2
                ]);
                }
            }
        }
    }

