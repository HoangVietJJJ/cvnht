<?php
class Home extends Controller{
    public $home;
    public function __construct(){
        $this->home=$this->model('HomeModel');
    }
    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'HomeView'
        ]);
    }
}   
?>