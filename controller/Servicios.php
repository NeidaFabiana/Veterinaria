<?php
class Servicios extends Controller{


    public function __construct() {
        parent::__construct();
      $this->model=new ServiciosDAO();     
    }

    public function servicios(){
        $data['listServ']=$this->model->getListServicios();
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("servicios",$data);
        $this->view->load("footer");
    }

    
}
