<?php
class Profesionales extends Controller{

    public function __construct() {
        parent::__construct();
		$this->model=new ProfesionalesDAO();
    
	}

    public function index(){
		$data['listProf'] = $this->model->getListProfesionales();
		var_dump($data['listProf']);die;
        $this->view->load("header");
        $this->view->load("nav");
        //$this->view->load("profesionales",$data);
        //$this->view->load("footer");
    }
}