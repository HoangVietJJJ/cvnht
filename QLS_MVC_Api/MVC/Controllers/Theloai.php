<?php
class Theloai extends Controller
{
    public $theloai;

    public function __construct()
    {
        $this->theloai = $this->model('TheloaiApi');
    }

    function Get_data()
    {
        $this->view("MasterLayout", [
            'page' => "TheloaiView"
        ]);
    }

    function themtheloai()
    {
        if (isset($_POST['btn_Luu'])) {
                $tentheloai = $_POST['tentheloai'];
                
                if($tentheloai==''){
                    $this->view("MasterLayout", [
                        'page' => "TheloaiView",
                        'thongbao' => "Bạn chưa nhập dữ liệu"
                    ]);
                }
                else{
                $kq = $this->theloai->AddTheloai( $tentheloai);
                $this->view("MasterLayout", [
                    'page' => "TheloaiView",
                    'result' => $kq
                ]);
                }
            }
        }
    }

