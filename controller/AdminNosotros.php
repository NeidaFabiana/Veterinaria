<?php

class AdminNosotros extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new NosotrosDao();
    }

    public function index() {
        $data['listNosotros'] = $this->model->getListNosotros();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("nosotros_list", $data);
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
        
        $descripcion = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_STRING);
        if ( $imagen && $descripcion ) {
            $img = new Nosotros($idNosotros=null,$imagen,$descripcion);

            if($this->model->insereNosotros(new Nosotros($imagen,$descripcion))){

              $this->view->location('AdminNosotros');
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
  $this->view->load('nosotros_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editNosotros($id) {
        $data['nos'] = $this->model->getNosotrosById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco
			$imagen = filter_input(INPUT_POST, 'Imagen', FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_STRING);
            $idNosotros = filter_input(INPUT_POST, 'idNosotros', FILTER_SANITIZE_STRING);

            if ($imagen && $descripcion && $idNosotros) {
                //atualizar no banco de dados a notícia
                $img = new Nosotros($imagen,$descripcion, $idNosotros);
                if ($this->model->atualizarNosotros($img)) {
                    $this->view->location("AdminNosotros");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la imagen!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminNosotros");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('nosotros_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delNosotros($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['nos'] = $this->model->getNosotrosById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('nosotros_del', $data);
        $this->view->load('footer');
    }

    public function removeNosotros() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idNosotros = filter_input(INPUT_POST,'idNosotros',FILTER_SANITIZE_STRING);
            if($this->model->removeNosotros($idNosotros)){
                $data['msg'] ='Imagen eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la imagen!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminNosotros/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('nosotros_remove', $data);
        $this->view->load('footer');
        
    }
  
}
