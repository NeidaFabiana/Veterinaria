<?php

class AdminConsultas extends Admin {

    public function __construct() {
        parent::__construct();
        $this->model = new ConsultasDao();
    }

    public function index() {
        $data['listConsu'] = $this->model->getListConsultas();
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
        $data['msg']="";
        if (filter_input(INPUT_POST, 'add')) {
			$nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
			$fecha = filter_input(INPUT_POST, 'Fecha', FILTER_SANITIZE_STRING);
			$horario = filter_input(INPUT_POST, 'Horario', FILTER_SANITIZE_STRING);
			$telefono = filter_input(INPUT_POST, 'Telefono', FILTER_SANITIZE_STRING);
			$direccion = filter_input(INPUT_POST, 'Direccion', FILTER_SANITIZE_STRING);
            if($nombre && $fecha && $horario && $telefono && $direccion ) {
                if($this->model->insereConsultas(new Consultas($nombre,$fecha,$horario,$telefono,$direccion))){

                    $this->view->location('AdminConsultas');
                }else{
                    $data['msg']= "Erro ao cadastrar!!";
                }
            }else{
                $data['msg']= "Preencha todos os campos!";
            }
        }
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consultas_add',$data);
        $this->view->load('footer');
    }
     
 
	 
	 
  
  
   public function editConsultas($id) {
        $data['consu'] = $this->model->getConsultasById($id);
        $data['msg'] = "";

        if (filter_input(INPUT_POST, 'edit')) {
            //ler formulário e atualizar o banco

            $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
            $fecha = filter_input(INPUT_POST, 'Fecha', FILTER_SANITIZE_STRING);
            $horario = filter_input(INPUT_POST, 'Horario', FILTER_SANITIZE_STRING);
            $telefono = filter_input(INPUT_POST, 'Telefono', FILTER_SANITIZE_STRING);
            $direccion = filter_input(INPUT_POST, 'Direccion', FILTER_SANITIZE_STRING);
            $idConsultas = filter_input(INPUT_POST, 'idConsultas', FILTER_SANITIZE_STRING);

            if ($nombre && $fecha && $horario && $telefono && $direccion && $idConsultas) {
                //atualizar no banco de dados a notícia
                $consultas = new Consultas($nombre,$fecha,$horario,$telefono,$direccion,null,$idConsultas);
                if ($this->model->atualizarConsultas($consultas)) {
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
        $data['consu'] = $this->model->getConsultasById($id);
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('consultas_del', $data);
        $this->view->load('footer');
    }

    public function removerConsultas() {
        $data['msg'] = '';
        if (filter_input(INPUT_POST, 'del')) {
            $idConsultas = filter_input(INPUT_POST,'idConsultas',FILTER_SANITIZE_STRING);
            if($this->model->removerConsultas($idConsultas)){
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
