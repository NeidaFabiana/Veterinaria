<?php

class AdminConsultas extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ConsultasDao();
    }

    public function index() {
        $data['listConsu'] = $this->model->getListImagem();
    //    echo "<pre>";
    //    print_r($data);
     //  echo "</pre>";
  // die;
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("consultas_list", $data);
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
        $data['msg'] = "Erro ao subir consulta";
        $if = false;
    }
    if( $if = true){
        $nombre = $caminho;
        
        $fecha = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);
        $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
        if ($nombre && $fecha && $horario && $telefono && $direccion ) {
            $img = new Imagem($idConsultas=null,$nombre,$fecha,$horario,$telefono,$direccion);

            if($this->model->insereConsultas(new Consultas($nombre,$fecha,$horario,$telefono,$direccion))){

              $this->view->location('AdminConsultas');
                return true;
            } else {
                $data['msg'] = 'Error al registrar consulta!';
            }
        } else {
            $data['msg'] = 'Complete todos los campos!';
        }
  }
  else{$data['msg'] = 'Error ao subir consulta';}
  }

  $this->view->load('header');
  $this->view->load('nav');
  $this->view->load('consultas_add', $data);
  $this->view->load('footer');



  }
	 
	 
  
  
   public function editConsultas($id) {
        $data['imag'] = $this->model->getConsultasById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $fecha = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);
            $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
            $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
            $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
            $idConsultas = filter_input(INPUT_POST, 'idConsultas', FILTER_SANITIZE_STRING);

            if ($nombre && $fecha && $horario && $telefono && $direccion && $idConsultas) {
                //atualizar no banco de dados a notícia
                $img = new Consultas($nombre,$fecha,$horario,$telefono,$direccion,$idConsultas);
                if ($this->model->atualizarConsultas($img)) {
                    $this->view->location("AdminConsultas");
                    return true;
                } else {
                    $data['msg'] = "Error al actualizar consulta!!";
                }
            } else {
                $data['msg'] = "Informe Todos los campos!!";
            }
        } else if (filter_input(INPUT_POST, 'exit')) {
            $this->view->location("AdminConsultas");
//            $this->index();
            return TRUE;
        }

        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consultas_upd', $data);
        $this->view->load('footer');
    }
	
	 public function delConsultas($id) {
        $data['msg'] = '';
//        echo "Deletar Notícia: $id";
        $data['imag'] = $this->model->getConsultasById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consultas_del', $data);
        $this->view->load('footer');
    }

    public function removeConsultas() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idConsultas = filter_input(INPUT_POST,'idConsultas',FILTER_SANITIZE_STRING);
            if($this->model->removeConsultas($idConsultas)){
                $data['msg'] ='Consulta eliminada con exito!';
            }else{
                $data['msg'] ='Error al eliminar la consulta!';            
            }           
        } elseif (filter_input(INPUT_POST, 'exit')) {
            $this->view->location('AdminConsultas/');
        } else {
            $data['msg'] = 'Error en el formulário!';
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consultas_remove', $data);
        $this->view->load('footer');
        
    }
  
}
