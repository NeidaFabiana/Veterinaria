<?php
class Consultas extends Controller{

    //private $texto;

    public function __construct() {
        parent::__construct();
      $this->model=new ConsultasDAO();     
    }

    public function index(){
        $data['listCons']=$this->model->getListImagem();
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("consultass",$data);
        $this->view->load("footer");
    }

    
}
