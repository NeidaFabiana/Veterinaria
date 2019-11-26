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
        if ($result) {
            $consu = $result[0];
            return new Consultas($consu['Nombre'], $consu['Fecha'],$consu['Horario'], $consu['Telefono'], $consu['Direccion'], $consu['idConsultas']);
        } else {
            return null;
        }
    }

	
	 public function insereConsultas($consu) {
        $sql = "INSERT INTO consultas(Nombre,Fecha,Horario,Telefono,Direccion) VALUES(:Nombre,:Fecha,:Horario,:Telefono,:Direccion)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $consu->getNombre(),
                ':Fecha' => $consu->getFecha(),
                ':Horario' => $consu->getHorario(),
                ':Telefono' => $consu->getTelefono(),
            ':Direccion' => $consu->getDireccion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
		public function removeConsultas($id) {
				$sql = "DELETE FROM consultas WHERE idConsultas = :idCons";
				if($this->ExecuteCommand($sql, [':idCons'=>$id])){
					return true;
				}else{
					return false;
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
