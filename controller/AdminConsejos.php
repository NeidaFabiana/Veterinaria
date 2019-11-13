<?php

class AdminConsejos extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ConsejosDao();
    }

    public function index() {
        $data['listCons'] = $this->model->getListConsejos();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("consejos_list", $data);
        $this->view->load("footer");
    }

     
 public function add() {
        $data['msg']="";
        if (filter_input(INPUT_POST, 'add')) {
            $titulo = filter_input(INPUT_POST, 'Titulo',FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'Descripcion',FILTER_SANITIZE_STRING);
            if($titulo && $descripcion) {
                if($this->model->insereConsejos(new Consejos($titulo, $descripcion))){
                    $this->view->location('AdminConsejos');
                }else{
                    $data['msg']= "Erro ao cadastrar!!";
                }
            }else{
                $data['msg']= "Preencha todos os campos!";
            }
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consejos_add',$data);
        $this->view->load('footer');
    }
	 
	 
  
  
   public function editConsejos($id) {
        $data['cons'] = $this->model->getConsejosById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $titulo = filter_input(INPUT_POST, 'Titulo', FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_STRING);
            $idConsejos = filter_input(INPUT_POST, 'idConsejos', FILTER_SANITIZE_STRING);

            if ($titulo && $descripcion && $idConsejos) {
                //atualizar no banco de dados a notícia
                $img = new Consejos($titulo, $descripcion, $idConsejos);
                if ($this->model->atualizarConsejos($img)) {
                    $this->view->location("AdminConsejos");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminConsejos");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consejos_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delConsejos($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['cons'] = $this->model->getConsejosById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consejos_del', $data);
        $this->view->load('footer');
    }

    public function removeConsejos() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idConsejos = filter_input(INPUT_POST,'idConsejos',FILTER_SANITIZE_STRING);
            if($this->model->removeConsejos($idConsejos)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminConsejos/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consejos_remove', $data);
        $this->view->load('footer');
        
    }
  
}
