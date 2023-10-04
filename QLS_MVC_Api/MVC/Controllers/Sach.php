<?php
class Sach extends Controller
{
    public $sach;

    public function __construct()
    {
        $this->sach = $this->model('SachApi');
    }

    function Get_data()
    {
        $this->view("MasterLayout", [
            'page' => "SachView",
            'theloai' => $this->sach->Theloai_ListAll()
        ]);
    }

    function themsach()
    {
        if (isset($_POST['btn_Luu'])) {
                $tensach = $_POST['tensach'];
                $theloai = $_POST['theloai'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                
                if($tensach==''&& $gia==''&&  $soluong==''){
                    $this->view("MasterLayout", [
                        'page' => "SachView",
                        'thongbao' => "Bạn chưa nhập dữ liệu",
                        'theloai' => $this->sach->Theloai_ListAll()
                    ]);
                }
                else{
                $kq = $this->sach->AddSach( $tensach, $theloai,$gia,$soluong);
                $this->view("MasterLayout", [
                    'page' => "SachView",
                    'result' => $kq,
                    'theloai' => $this->sach->Theloai_ListAll()
                ]);
                }
            }
        }
    }

