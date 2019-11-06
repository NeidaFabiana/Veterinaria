<?php

class Profesionales extends Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
		  $this->model=new ProfesionalesDAO();
    }

    public function index() {
 $data['listProf'] = $this->model->getListProfesionalesImagens();

        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("profesionales",$data);
        $this->view->load("footer");
    }

		 public function viewProfesionales($idProfesionales) {
        //Método buscar no banco pelo ID 
        $data['profesionales'] = $this->model->getProfesionalesById($idProfesionales);
		
        //Mostrar a notícia na página 
       if ($data['profesionales']) {

            $this->view->load("header");
            $this->view->load("nav");
            $this->view->load("view_profesionales",$data);
            $this->view->load("footer");
            
        } else {
            echo "Notícia não foi encontrada";
        }
    }

}
