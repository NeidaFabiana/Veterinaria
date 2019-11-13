<?php

class AdminCons extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ImagenConsDao();
    }

    public function index() {
        $data['listImagenCons'] = $this->model->getListImagenCons();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("imagencons_list", $data);
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
        if ($imagen && $nombre ) {
            $img = new ImagenCons($idImagen=null,$imagen,$nombre);

            if($this->model->insereImagenCons(new ImagenCons($imagen,$nombre))){

              $this->view->location('AdminCons');
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
  $this->view->load('imagencons_add', $data);
  $this->view->load('footer');



  }
	 
  
   public function editImagenCons($id) {
        $data['imag'] = $this->model->getImagenConsById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $imagen = filter_input(INPUT_POST, 'Imagen', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
            $idImagen = filter_input(INPUT_POST, 'idImagenCons', FILTER_SANITIZE_STRING);

            if ($imagen && $nombre && $idImagen) {
                //atualizar no banco de dados a notícia
                $img = new ImagenCons($imagen, $nombre, $idImagen);
                if ($this->model->atualizarImagenCons($img)) {
                    $this->view->location("AdminCons");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminCons");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagencons_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delImagenCons($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getImagenConsById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagencons_del', $data);
        $this->view->load('footer');
    }

    public function removeImagenCons() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idImagen = filter_input(INPUT_POST,'idImagenCons',FILTER_SANITIZE_STRING);
            if($this->model->removeImagenCons($idImagen)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminCons/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('imagencons_remove', $data);
        $this->view->load('footer');
        
    }
  
}
