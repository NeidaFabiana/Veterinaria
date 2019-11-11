<?php
class Home extends Controller{

    public function __construct() {
        parent::__construct();
		$this->model=new NoticiasDAO(); 
    
    
	
    

	}

    public function index(){
		$data['listNoti']=$this->model->getListUltimasNoticiasImagens();
		$this->model=new SlideDAO(); 
		$data['listImagenSlide']=$this->model->getListUltimasImagem();
		$this->model=new ProfesionalesDAO(); 
		$data['listProf']=$this->model->getListUltimasProfesionalesImagens();
		$this->model=new ConsejosDAO(); 
		$data['listCons']=$this->model->getListUltimasConsejos();
		
        //echo $this->texto;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("index",$data);
        $this->view->load("footer");
    }

   
}
