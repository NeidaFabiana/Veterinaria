<?php
class Consejos extends Controller{

    //private $texto;

    public function __construct() {
        parent::__construct();
      $this->model=new ConsejosDAO();     
    }

    public function index(){
        $data['listCons']=$this->model->getListConsejosImagens();
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("consejos",$data);
        $this->view->load("footer");
    }
	
	 public function viewConsejos($idconsejos) {
        //Método buscar no banco pelo ID 
        $data['consejos'] = $this->model->getConsejosById($idconsejos);
		
        //Mostrar a notícia na página 
       if ($data['consejos']) {

            $this->view->load("header");
            $this->view->load("nav_1");
            $this->view->load("view_consejos",$data);
            $this->view->load("footer");
            
        } else {
            echo "Consejo não foi encontrada";
        }
    }
	
    
}
