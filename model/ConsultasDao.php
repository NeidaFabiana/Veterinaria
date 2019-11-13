<?php

class ConsultasDAO  extends Model{

    private $listConsultas;

  public function __construct() {
        parent::__construct();
        $this->listaConsultas = [];
    }
	

	  public function getListConsultas() {
        $sql = "SELECT * FROM Consultas";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $Consultas = new Consultas( $linha['idConsultas'], $linha['Nombre'], $linha['Fecha'], $linha['Horario'],$linha['Telefono'],$linha['Direccion']);

            $this->listConsultas[] = $Consultas;
        }

        return $this->listConsultas;
    }
	

	 public function insereConsultas($cons) {
        $sql = "INSERT INTO Consultas(Nombre,Fecha,Horario,Telefono,Direccion) VALUES(:Nombre,:Fecha,:Horario,:Telefono,:Direccion)";
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
			
		if($this->ExecuteQuery("SELECT * FROM Consultas WHERE Consultas_idConsultas  = :Consultas_idConsultas", [':Consultas_idConsultas' => $id])){
			$sql = "DELETE FROM Consultas_has_Imagencons WHERE Consultas_idConsultas = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM Consultas WHERE idConsultas = :idConsultas";
				if($this->ExecuteCommand($sql, [':idConsultas'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM Consultas WHERE idConsultas = :idConsultas";
			if($this->ExecuteCommand($sql, [':idConsultas'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarConsultas($Consultas) {
        $sql = 'UPDATE Consultas SET Nombre = :Nombre,'
				.'Fecha = :Fecha,'
				.'Horario = :Horario,'
				.'Telefono = :Telefono,'
                . ' Direccion = :Direccion WHERE idConsultas =:idConsultas';
        $param = [':Nombre'=>$Consultas->getNombre(),
            ':Fecha'=>$Consultas->getFecha(),
            ':Horario'=>$Consultas->getHorario(),
            ':Telefono'=>$Consultas->getTelefono(),
            ':Direccion'=>$Consultas->getDireccion(),
            ':idConsultas'=>$Consultas->getIdConsultas()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
}
