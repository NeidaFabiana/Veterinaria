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
    $data['msg'] = '';

  if (filter_input(INPUT_POST, 'add')) {
    $caminho = getcwd();
    $diretorio =  $caminho. "/system/upload/";
    //$arquivo = $diretorio . basename($_FILES["arquivo"]["nombre"]);
    $novonome = rand(1,9999).$_FILES['arquivo']['nombre'];
    $arquivo = $diretorio . $novonome;

    if (move_uploaded_file($_FILES["arquivo"]["tmp_nombre"], $arquivo)) {
        $data['msg'] = "Upload do arquivo  ". basename( $_FILES["arquivo"]["nombre"]). " feito com sucesso .!! <br>";

        $caminho = $novonome;

        $if = true;
    } else {
        $data['msg'] = "Error al subir imagen";
        $if = false;
    }
    if( $if = true){
        $titulo = $caminho;
        
        $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
        if ($titulo && $descripcion ) {
            $img = new Consejos($idConsejos=null,$titulo,$descripcion);

            if($this->model->insereConsejos(new Consejos($titulo,$descripcion))){

              $this->view->location('AdminConsejos');
                return true;
            } else {
                $data['msg'] = 'Error al registrar imagen!';
            }
        } else {
            $data['msg'] = 'Complete todos los campos!';
        }
  }
  else{$data['msg'] = 'Error al subir img';}
  }

  $this->view->load('header');
  $this->view->load('nav');
  $this->view->load('consejos_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editConsejos($id) {
        $data['cons'] = $this->model->getConsejosById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
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
            $idimagen = filter_input(INPUT_POST,'idConsejos',FILTER_SANITIZE_STRING);
            if($this->model->removeConsejos($idimagen)){
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
