<?php
class Servicios extends Controller{


    public function __construct() {
        parent::__construct();
      $this->model=new ServiciosDAO();     
    }

    public function index(){
        $data['listServ']=$this->model->getListServiciosImagens();
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("servicios",$data);
        $this->view->load("footer");
    }

    
}
