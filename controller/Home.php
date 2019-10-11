<?php
class Home extends Controller{

    public function __construct() {
        parent::__construct();
    $this->model=new NoticiaDAO(); 

	}

    public function index(){
		 $data['listNews']=$this->model->getListUltimasNoticiasImagens();
		 $this->model=new ImagemDAO(); 
		 $data['listImagem']=$this->model->getListUltimasImagem();
		 $this->model=new VideoDAO(); 
	     $data['listVideo']=$this->model->getListUltimasVideo();
		
        //echo $this->texto;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("index",$data);
        $this->view->load("footer");
    }

   
}
