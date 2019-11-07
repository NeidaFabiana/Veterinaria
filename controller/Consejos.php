<?php
class Consejos extends Controller{

    //private $texto;

    public function __construct() {
        parent::__construct();
      $this->model=new ConsejosDAO();     
    }

    public function index(){
        $data['listCons']=$this->model->getListImagenCons();
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("consejos",$data);
        $this->view->load("footer");
    }

    
}
