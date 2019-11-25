<?php

class ConsultasDAO  extends Model{

    private $listConsultas;

  public function __construct() {
        parent::__construct();
        $this->listaConsultas = [];
    }
		 public function getListConsultas() {
        $sql = "SELECT * FROM consultas";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $consultas = new Consultas($linha['Nombre'], $linha['Fecha'],$linha['Horario'], $linha['Telefono'], $linha['Direccion'], $linha['idConsultas']);

            $this->listConsultas[] = $consultas;
        }

        return $this->listConsultas;
    }
	
	

	   public function getConsultasById($id) {
        $sql = "SELECT * FROM consultas WHERE idConsultas = :idConsultas";
        $result = $this->ExecuteQuery($sql, [':idConsultas' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $consu = $result[0];
            return new Consultas($consu['Nombre'], $consu['Fecha'],$consu['Horario'], $consu['Telefono'], $consu['Direccion'], $consu['idConsultas']);
        } else {
            return null;
        }
    }

	 public function insereConsultas($cons) {
        $sql = "INSERT INTO consultas(Nombre,Fecha,Horario,Telefono,Direccion) VALUES(:Nombre,:Fecha,:Horario,:Telefono,:Direccion)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $cons->getNombre(),
                ':Fecha' => $cons->getFecha(),
                ':Horario' => $cons->getHorario(),
                ':Telefono' => $cons->getTelefono(),
            ':Direccion' => $cons->getDireccion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerConsultas($id) {
			
		if($this->ExecuteQuery("SELECT * FROM consultas WHERE consultas_idConsultas  = :consultas_idConsultas", [':consultas_idConsultas' => $id])){
			$sql = "DELETE FROM consultas WHERE consultas_idConsultas = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM consultas WHERE idConsultas = :idConsultas";
				if($this->ExecuteCommand($sql, [':idConsultas'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM consultas WHERE idConsultas = :idConsultas";
			if($this->ExecuteCommand($sql, [':idConsultas'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarConsultas($consultas) {
        $sql = 'UPDATE consultas SET Nombre = :Nombre,'
				.'Fecha = :Fecha,'
				.'Horario = :Horario,'
				.'Telefono = :Telefono,'
                . ' Direccion = :Direccion WHERE idConsultas =:idConsultas';
        $param = [':Nombre'=>$consultas->getNombre(),
            ':Fecha'=>$consultas->getFecha(),
            ':Horario'=>$consultas->getHorario(),
            ':Telefono'=>$consultas->getTelefono(),
            ':Direccion'=>$consultas->getDireccion(),
            ':idConsultas'=>$consultas->getIdConsultas()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
}
