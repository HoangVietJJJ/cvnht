<?php
class User extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = $this->model('UserApi');
    }

    function Get_data()
    {
        $this->view("MasterLayout", [
            'page' => "UserView"
        ]);
    }

    function themuser()
    {
        if (isset($_POST['btn_Luu'])) {
                $taikhoan=$_POST['taikhoan'];
                $matkhau=$_POST['matkhau'];
                $ten = $_POST['ten'];
                $tuoi=$_POST['tuoi'];
                $gioitinh=$_POST['gioitinh'];
                $email=$_POST['email'];
                $diachi=$_POST['diachi'];
                $sdt=$_POST['sdt'];
                
                if( $taikhoan==''||$matkhau==''|| $ten ==''||$tuoi==''||$gioitinh==''||$email==''||$diachi==''|| $sdt==''){
                    $this->view("MasterLayout", [
                        'page' => "UserView",
                        'thongbao' => "Bạn chưa nhập dữ liệu",
                    ]);
                }
                else{
                $kq = $this->user->AddUser($taikhoan,$matkhau, $ten,$tuoi,$gioitinh,$email,$diachi, $sdt);
                $this->view("MasterLayout", [
                    'page' => "UserView",
                    'result' => $kq
                ]);
                }
            }
        }
    }

