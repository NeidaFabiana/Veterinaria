<?php

class AdminNoticias extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new NoticiasDao();
    }

    public function index() {
        $data['listNoti'] = $this->model->getListNoticias();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("noticias_list", $data);
        $this->view->load("footer");
    }

     
 public function add() {
        $data['msg']="";
        if (filter_input(INPUT_POST, 'add')) {
            $titulo = filter_input(INPUT_POST, 'Titulo',FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'Descripcion',FILTER_SANITIZE_STRING);
            if($titulo && $descripcion) {
                if($this->model->insereNoticias(new Noticias($titulo, $descripcion))){
                    $this->view->location('AdminNoticias');
                }else{
                    $data['msg']= "Erro ao cadastrar!!";
                }
            }else{
                $data['msg']= "Preencha todos os campos!";
            }
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('noticias_add',$data);
        $this->view->load('footer');
    }
	 
	 
  
  
   public function editNoticias($id) {
        $data['noti'] = $this->model->getNoticiasById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $titulo = filter_input(INPUT_POST, 'Titulo', FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_STRING);
            $idNoticias = filter_input(INPUT_POST, 'idNoticias', FILTER_SANITIZE_STRING);

            if ($titulo && $descripcion && $idNoticias) {
                //atualizar no banco de dados a notícia
                $img = new Noticias($titulo, $descripcion,null, $idNoticias);
                if ($this->model->atualizarNoticias($img)) {
                    $this->view->location("AdminNoticias");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la noticia!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminNoticias");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('noticias_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delNoticias($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['noti'] = $this->model->getNoticiasById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('noticias_del', $data);
        $this->view->load('footer');
    }

    public function removerNoticias() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idNoticias = filter_input(INPUT_POST,'idNoticias',FILTER_SANITIZE_STRING);
            if($this->model->removerNoticias($idNoticias)){
                $data['msg'] ='Noticia eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la noticia!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminNoticias/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('noticias_remove', $data);
        $this->view->load('footer');
        
    }
  
}
