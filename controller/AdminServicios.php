<?php

class AdminServicios extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ServiciosDao();
    }

    public function index() {
        $data['listServ'] = $this->model->getListImagem();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("servicios_list", $data);
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
        $servicio = $caminho;
        
        $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
        if ($servicio && $descripcion ) {
            $img = new Servicios($idServicios=null,$servicio,$descripcion);

            if($this->model->insereServicios(new Servicios($servicio,$descripcion))){

              $this->view->location('AdminServicios');
                return true;
            } else {
                $data['msg'] = 'Error al registrar servicio!';
            }
        } else {
            $data['msg'] = 'Preencha todos os campos!';
        }
  }
  else{$data['msg'] = 'Error ao subir img';}
  }

  $this->view->load('header');
  $this->view->load('nav');
  $this->view->load('servicios_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editServicios($id) {
        $data['imag'] = $this->model->getServiciosById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $servicio = filter_input(INPUT_POST, 'servicio', FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
            $idServicios = filter_input(INPUT_POST, 'idServicios', FILTER_SANITIZE_STRING);

            if ($servicio && $descripcion && $idServicios) {
                //atualizar no banco de dados a notícia
                $img = new Servicios($servicio, $descripcion, $idimagen);
                if ($this->model->atualizarServicios($img)) {
                    $this->view->location("AdminServicios");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar la servicio!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminServicios");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('servicios_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delServicios($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getServiciosById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('sevicios_del', $data);
        $this->view->load('footer');
    }

    public function removeServicios() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idimagen = filter_input(INPUT_POST,'idServicios',FILTER_SANITIZE_STRING);
            if($this->model->removeServicios($idServicios)){
                $data['msg'] ='Servicio eliminado con exito!';
            }else{
                $data['msg'] ='Error al eliminar servicio!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminServicios/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('servicios_remove', $data);
        $this->view->load('footer');
        
    }
  
}
