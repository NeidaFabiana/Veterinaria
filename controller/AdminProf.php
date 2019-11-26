<?php

class AdminProf extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ImagenProfDao();
    }

    public function index() {
        $data['listImagenProf'] = $this->model->getListImagenProf();
    
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("imagenprof_list", $data);
        $this->view->load("footer");
    }

     
 public function add() {
    $data['msg'] = '';

  if (filter_input(INPUT_POST, 'add')) {
    $caminho = getcwd();
    $diretorio =  $caminho. "/system/upload/";
    //$arquivo = $diretorio . basename($_FILES["arquivo"]["nombre"]);
    $novonome = rand(1,9999).$_FILES['arquivo']['imagen'];
    $arquivo = $diretorio . $novonome;

    if (move_uploaded_file($_FILES["arquivo"]["tmp_imagen"], $arquivo)) {
        $data['msg'] = "Upload do arquivo  ". basename( $_FILES["arquivo"]["imagen"]). " feito com sucesso .!! <br>";

        $caminho = $novonome;

        $if = true;
    } else {
        $data['msg'] = "Erro ao subir imagem";
        $if = false;
    }
    if( $if = true){
        $imagen = $caminho;
        
        $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
        if ($imagen && $nombre ) {
            $img = new ImagenProf($idImagen=null,$imagen,$nombre);

            if($this->model->insereImagenProf(new ImagenProf($imagen,$nombre))){

              $this->view->location('AdminProf');
                return true;
            } else {
                $data['msg'] = 'Erro ao cadastrar imagem!';
            }
        } else {
            $data['msg'] = 'Preencha todos os campos!';
        }
  }
  else{$data['msg'] = 'Error ao subir img';}
  }

  $this->view->load('header');
  $this->view->load('nav');
  $this->view->load('imagenprof_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editImagenProf($id) {
        $data['imag'] = $this->model->getImagenProfById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco
			$imagen = filter_input(INPUT_POST, 'Imagen', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
            $idImagen = filter_input(INPUT_POST, 'idImagenProf', FILTER_SANITIZE_STRING);

            if ($imagen && $nombre && $idImagenProf) {
                //atualizar no banco de dados a notícia
                $img = new ImagenProf($imagen, $nombre, $idImagen);
                if ($this->model->atualizarImagenProf($img)) {
                    $this->view->location("AdminProf");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminProf");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenprof_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delImagenProf($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getImagenProfById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenprof_del', $data);
        $this->view->load('footer');
    }

    public function removeImagenProf() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idImagen = filter_input(INPUT_POST,'idImagenProf',FILTER_SANITIZE_STRING);
            if($this->model->removeImagenProf($idImagen)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminProf/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenprof_remove', $data);
        $this->view->load('footer');
        
    }
  
}
