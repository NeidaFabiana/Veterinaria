<?php
class Profesionales extends Controller{

    public function __construct() {
        parent::__construct();
		$this->model=new ProfesionalesDAO();
    
	}

    public function index(){
		$data['listProf'] = $this->model->getListProfesionalesImagens();
		var_dump($data['listProf']);die;
        $this->view->load("header");
        $this->view->load("nav");
        //$this->view->load("profesionales",$data);
        //$this->view->load("footer");
    }
	
	 public function viewProfesionales($idprofesionales) {
        //Método buscar no banco pelo ID 
        $data['profesionales'] = $this->model->getProfesionalesById($idprofesionales);
		
        //Mostrar a notícia na página 
       if ($data['profesionales']) {

            $this->view->load("header");
            $this->view->load("nav_1");
            $this->view->load("view_profesionales",$data);
            $this->view->load("footer");
            
        } else {
            echo "Profesional não foi encontrada";
        }
    }
	
}