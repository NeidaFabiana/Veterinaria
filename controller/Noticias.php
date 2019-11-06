<?php

class Noticias extends Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
		  $this->model=new NoticiasDAO();
    }

    public function index() {
 $data['listNoti'] = $this->model->getListNoticiasImagens();

        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("noticias",$data);
        $this->view->load("footer");
    }

		 public function viewNoticias($idNoticias) {
        //Método buscar no banco pelo ID 
        $data['noticias'] = $this->model->getNoticiasById($idNoticias);
		
        //Mostrar a notícia na página 
       if ($data['noticias']) {

            $this->view->load("header");
            $this->view->load("nav");
            $this->view->load("view_noticias",$data);
            $this->view->load("footer");
            
        } else {
            echo "Notícia não foi encontrada";
        }
    }

}
