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
        $titulo = $caminho;
        
        $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
        if ($titulo && $descripcion ) {
            $img = new Noticias($idNoticias=null,$titulo,$descripcion);

            if($this->model->insereNoticias(new Noticias($titulo,$descripcion))){

              $this->view->location('AdminNoticias');
                return true;
            } else {
                $data['msg'] = 'Error al registrar noticia!';
            }
        } else {
            $data['msg'] = 'Complete todos los campos!';
        }
  }
  else{$data['msg'] = 'Error ao subir noticia';}
  }

  $this->view->load('header');
  $this->view->load('nav');
  $this->view->load('noticias_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editNoticias($id) {
        $data['noti'] = $this->model->getNoticiasById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
            $idNoticias = filter_input(INPUT_POST, 'idNoticias', FILTER_SANITIZE_STRING);

            if ($titulo && $descripcion && $idNoticias) {
                //atualizar no banco de dados a notícia
                $img = new Noticias($titulo, $descripcion, $idNoticias);
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

    public function removeNoticias() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idimagen = filter_input(INPUT_POST,'idNoticias',FILTER_SANITIZE_STRING);
            if($this->model->removeNoticias($idNoticias)){
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
