<?php

class AdminProfesionales extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ProfesionalesDao();
    }

    public function index() {
        $data['listProf'] = $this->model->getListProfesionales();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("profesionales_list", $data);
        $this->view->load("footer");
    }

public function add() {
        $data['msg']="";
        if (filter_input(INPUT_POST, 'add')) {
            $nombre = filter_input(INPUT_POST, 'nombre',FILTER_SANITIZE_STRING);
            $formacion = filter_input(INPUT_POST, 'formacion',FILTER_SANITIZE_STRING);
            if($nombre && $formacion) {
                if($this->model->insereProfesionales(new Profesionales($nombre, $formacion))){
                    $this->view->location('AdminProfesionales');
                }else{
                    $data['msg']= "Erro ao cadastrar!!";
                }
            }else{
                $data['msg']= "Preencha todos os campos!";
            }
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('profesionales_add',$data);
        $this->view->load('footer');
    }
	 
	 
  
  
   public function editProfesionales($id) {
        $data['prof'] = $this->model->getProfesionalesById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $formacion = filter_input(INPUT_POST, 'formacion', FILTER_SANITIZE_STRING);
            $idProfesionales = filter_input(INPUT_POST, 'idProfesionales', FILTER_SANITIZE_STRING);

            if ($nombre && $formacion && $idProfesionales) {
                //atualizar no banco de dados a notícia
                $img = new Profesionales($nombre, $formacion, $idProfesionales);
                if ($this->model->atualizarProfesionales($img)) {
                    $this->view->location("AdminProfesionales");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar profesional!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminProfesionales");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('profesionales_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delProfesionales($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['prof'] = $this->model->getProfesionalesById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('profesionales_del', $data);
        $this->view->load('footer');
    }

    public function removerProfesionales() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idProfesionales = filter_input(INPUT_POST,'idProfesionales',FILTER_SANITIZE_STRING);
            if($this->model->removerProfesionales($idProfesionales)){
                $data['msg'] ='Profesional eliminado con exito!';
            }else{
                $data['msg'] ='Error al eliminar la profesional!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminProfesionales/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('profesionales_remove', $data);
        $this->view->load('footer');
        
    }
  
}
