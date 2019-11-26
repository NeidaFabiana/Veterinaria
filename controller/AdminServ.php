<?php

class AdminServ extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ImagenServDao();
    }

    public function index() {
        $data['listImagenServ'] = $this->model->getListImagenServ();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("imagenserv_list", $data);
        $this->view->load("footer");
    }

     
 public function add() {
    $data['msg'] = '';

  if (filter_input(INPUT_POST, 'add')) {
    $caminho = getcwd();
    $diretorio =  $caminho. "/system/upload/";
    //$arquivo = $diretorio . basename($_FILES["arquivo"]["nombre"]);
    $novonome = rand(1,9999).$_FILES['arquivo']['Imagen'];
    $arquivo = $diretorio . $novonome;

    if (move_uploaded_file($_FILES["arquivo"]["tmp_Imagen"], $arquivo)) {
        $data['msg'] = "Upload do arquivo  ". basename( $_FILES["arquivo"]["Imagen"]). " feito com sucesso .!! <br>";

        $caminho = $novonome;

        $if = true;
    } else {
        $data['msg'] = "Erro ao subir imagem";
        $if = false;
    }
    if( $if = true){
        $imagen = $caminho;
        
        $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
        if ( $imagen && $nombre ) {
            $img = new ImagenServ($idImagen=null,$imagen,$nombre);

            if($this->model->insereImagenServ(new ImagenServ($imagen,$nombre))){

              $this->view->location('AdminServ');
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
  $this->view->load('imagenserv_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editImagenServ($id) {
        $data['imag'] = $this->model->getImagenServById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco
			
			$imagen = filter_input(INPUT_POST, 'Imagen', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
            $idImagen = filter_input(INPUT_POST, 'idImagenServ', FILTER_SANITIZE_STRING);

            if ($imagen && $nombre && $idImagen) {
                //atualizar no banco de dados a notícia
                $img = new ImagenServ($imagen, $nombre, $idImagen);
                if ($this->model->atualizarImagenServ($img)) {
                    $this->view->location("AdminServ");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminServ");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenserv_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delImagenServ($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getImagenServById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenserv_del', $data);
        $this->view->load('footer');
    }

    public function removeImagenServ() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idImagen = filter_input(INPUT_POST,'idImagenServ',FILTER_SANITIZE_STRING);
            if($this->model->removeImagenServ($idImagen)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminServ/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenserv_remove', $data);
        $this->view->load('footer');
        
    }
  
}
