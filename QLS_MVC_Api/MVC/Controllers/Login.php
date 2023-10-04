<?php
class Login extends Controller{
    public $login;
    public function __construct(){
        $this->login=$this->model('DanhsachuserModel');
    }
    
    function Get_data(){
        $this->view(
            'LoginView',
            $_SESSION["taikhoan1"]=''
        );
    }

    function Loginn(){
        if(isset($_POST["login"])){
            $taikhoan=$_POST["taikhoan"];
            $matkhau=$_POST["matkhau"];
            
            if ($taikhoan=='' || $matkhau=='') {
                $this->view( "LoginView",
                    $_SESSION["taikhoan1"]=''
                );
             }
             else{
                $kq=$this->login->CheckMauser($taikhoan,$matkhau);
                if($kq==false){
                    $_SESSION["taikhoan1"]=$taikhoan;
                $this->view('MasterLayout',[
                    'page' => "HomeView",
                ]);
                }else{
                    $this->view("LoginView",
                    );
                }
                
             }
        }
    }   
}