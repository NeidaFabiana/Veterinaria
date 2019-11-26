<?php

class ProfesionalesDAO extends Model{

    private $listProfesionales;

  public function __construct() {
        parent::__construct();
        $this->listaProfesionales = [];
    }
	

	  public function getListProfesionales() {
        $sql = "SELECT * FROM profesionales";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $profesionales = new Profesionales($linha['Nombre'], $linha['Formacion'],$linha['FotoProf'], $linha['idProfesionales']);

            $this->listProfesionales[] = $profesionales;
        }

        return $this->listProfesionales;
    }
	
	
 public function getListUltimasProfesionales(){
        $sql = "SELECT * FROM profesionales order by idProfesionales desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $profesionales = new Profesionales($linha['Nombre'],$linha['Formacion'],$linha['FotoProf'],$linha['idProfesionales']);

            $this->listProfesionales[] = $profesionales;
        }

        return $this->listProfesionales;
    }
	
	
	  public function getListProfesionalesImagens() {
        $sql = "SELECT * FROM profesionales";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $FotoProf = $this->getImagenFromProfesionales($linha['idProfesionales']);

            $profesionales = new Profesionales($linha['Nombre'], $linha['Formacion'], $FotoProf, $linha['idProfesionales']);

            $this->listProfesionales[] = $profesionales;
        }
        return $this->listProfesionales;
    }
	
	 public function getListUltimasProfesionalesImagens() {
        $sql = "SELECT * FROM profesionales order by idProfesionales desc limit 3";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $FotoProf = $this->getImagenFromProfesionales($linha['idProfesionales']);

            $profesionales = new Profesionales($linha['Nombre'], $linha['Formacion'], $FotoProf,$linha['idProfesionales']);

            $this->listProfesionales[] = $profesionales;
        }
        return $this->listProfesionales;
    }

    public function getProfesionalesById($id) {
        $sql = "SELECT * FROM profesionales WHERE idProfesionales = :idProfesionales";
        $result = $this->ExecuteQuery($sql, [':idProfesionales' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $FotoProf = $this->getImagenFromProfesionales($id);
            $prof = $result[0];
            return new Profesionales($prof['Nombre'], $prof['Formacion'], $FotoProf,$prof['idProfesionales']);
        } else {
            return null;
        }
    }

    public function getImagenFromProfesionales($id) {
        $sql =  "SELECT i.* FROM profesionales_has_imagenprof AS ni "
                . "INNER JOIN  imagenprof as i "
                . "ON i.idImagenProf = ni.imagenprof_idImagenProf WHERE profesionales_idProfesionales = :profesionales_idProfesionales;";
        $result = $this->ExecuteQuery($sql, [':profesionales_idProfesionales' => $id]);
        $FotoProf=[];
        if ($result) {
             foreach ($result as $linha) {
                 $FotoProf[] = new ImagenProf(
				        $linha['Nombre'],
				        $linha['Imagen'],
						$linha['idImagenProf']);
                         
             }
            }
        return $FotoProf;
    }
	 public function insereProfesionales($prof) {
        $sql = "INSERT INTO profesionales(Nombre,Formacion) VALUES(:Nombre,:Formacion)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $prof->getNombre(),
            ':Formacion' => $prof->getFormacion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerProfesionales($id) {
			
		if($this->ExecuteQuery("SELECT * FROM profesionales_has_imagenprof WHERE profesionales_idProfesionales  = :profesionales_idProfesionales", [':profesionales_idProfesionales' => $id])){
			$sql = "DELETE FROM profesionales_has_imagenprof WHERE profesionales_idProfesionales = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM profesionales WHERE idProfesionales = :idProfesionales";
				if($this->ExecuteCommand($sql, [':idProfesionales'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM profesionales WHERE idProfesionales = :idProfesionales";
			if($this->ExecuteCommand($sql, [':idProfesionales'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
  
	
	 public function atualizarProfesionales($profesionales) {
        $sql = 'UPDATE consejos SET Nombre = :Nombre,'
                . ' Formacion=:Formacion WHERE idProfesionales =:idProfesionales';
        $param = [':Nombre'=>$profesionales->getNombre(),
            ':Formacion'=>$profesionales->getFormacion(),
            ':idProfesionales'=>$profesionales->getIdProfesionales()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
	
	
	
	
	
	
}
