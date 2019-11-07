<?php

class AdminNoti extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ImagenNotiDao();
    }

    public function index() {
        $data['listImagenNoti'] = $this->model->getListImagenNoti();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("imagennoti_list", $data);
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
        $data['msg'] = "Erro ao subir imagem";
        $if = false;
    }
    if( $if = true){
        $imagen = $caminho;
        
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        if ($imagen && $nombre ) {
            $img = new ImagenNoti($idImagen=null,$imagen,$nombre);

            if($this->model->insereImagenNoti(new ImagenNoti($imagen,$nombre))){

              $this->view->location('AdminNoti');
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
  $this->view->load('imagennoti_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editImagenNoti($id) {
        $data['imag'] = $this->model->getImagenNotiById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $imagen = filter_input(INPUT_POST, 'imagen', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $idImagen = filter_input(INPUT_POST, 'idImagen', FILTER_SANITIZE_STRING);

            if ($imagen && $nombre && $idImagen) {
                //atualizar no banco de dados a notícia
                $img = new ImagenNoti($imagen, $nombre, $idImagen);
                if ($this->model->atualizarImagenNoti($img)) {
                    $this->view->location("AdminNoti");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminNoti");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagennoti_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delImagenNoti($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getImagenNotiById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagennoti_del', $data);
        $this->view->load('footer');
    }

    public function removeImagenNoti() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idImagen = filter_input(INPUT_POST,'idImagen',FILTER_SANITIZE_STRING);
            if($this->model->removeImagenNoti($idImagen)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminNoti/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagennoti_remove', $data);
        $this->view->load('footer');
        
    }
  
}
