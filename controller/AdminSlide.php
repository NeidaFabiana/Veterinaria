<?php

class AdminSlide extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new SlideDao();
    }

    public function index() {
        $data['listImagenSlide'] = $this->model->getListImagenSlide();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("imagenslide_list", $data);
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
        if ($nombre && $imagen ) {
            $img = new ImagenSlide($idSlide=null,$imagen,$nombre);

            if($this->model->insereImagenSlide(new ImagenSlide($imagen,$nombre))){

              $this->view->location('AdminSlide');
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
  $this->view->load('imagenslide_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editImagenSlide($id) {
        $data['imag'] = $this->model->getImagenSlideById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

			$imagen = filter_input(INPUT_POST, 'Imagen', FILTER_SANITIZE_STRING);
			$nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
            $idSlide = filter_input(INPUT_POST, 'idSlide', FILTER_SANITIZE_STRING);

            if ($imagen && $nombre && $idSlide) {
                //atualizar no banco de dados a notícia
                $img = new ImagenSlide($imagen, $nombre, $idSlide);
                if ($this->model->atualizarImagenSlide($img)) {
                    $this->view->location("AdminSlide");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminSlide");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenslide_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delImagenSlide($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getImagenSlideById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenslide_del', $data);
        $this->view->load('footer');
    }

    public function removeImagenSlide() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idSlide = filter_input(INPUT_POST,'idSlide',FILTER_SANITIZE_STRING);
            if($this->model->removeImagenSlide($idImagen)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminSlide/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagenslide_remove', $data);
        $this->view->load('footer');
        
    }
  
}
