<?php

class ProfesionalesDAO  extends Model{

    private $listProfesionales;

  public function __construct() {
        parent::__construct();
        $this->listaProfesionales = [];
    }
	

	  public function getListProfesionales() {
        $sql = "SELECT * FROM Profesionales";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $profesionales = new Profesionales( $linha['idProfesionales'], $linha['formacion'], $linha['descripcion'],$linha['imgprof']);

            $this->listProfesionales[] = $profesionales;
        }

        return $this->listProfesionales;
    }
	
	
 public function getListUltimasProfesionales(){
        $sql = "SELECT * FROM Profesionales order by idProfesionales desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $profesionales = new Profesionales($linha['idNoticias'], $linha['formacion'], $linha['descripcion'],$linha['imgprof']);

            $this->listProfesionales[] = $profesionales;
        }

        return $this->listProfesionales;
    }
	
	
	  public function getListProfesionalesImagens() {
        $sql = "SELECT * FROM Profesionales";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $Img = $this->getImagenFromProfesionales($linha['idProfesionales']);

            $profesionales = new Profesionales($linha['idProfesionales'], $linha['formacion'], $linha['descripcion'], $Img);

            $this->listProfesionales[] = $profesionales;
        }
        return $this->listProfesionales;
    }
	
	 public function getListUltimasProfesionalesImagens() {
        $sql = "SELECT * FROM Profesionales order by idProfesionales desc limit 3";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $Img = $this->getImagenFromProfesionales($linha['idProfesionales']);

            $profesionales = new Profesionales($linha['idProfesionales'], $linha['formacion'], $linha['descripcion'], $Img);

            $this->listProfesionales[] = $profesionales;
        }
        return $this->listProfesionales;
    }

    public function getProfesionalesById($id) {
        $sql = "SELECT * FROM Profesionales WHERE idProfesionales = :idProfesionales";
        $result = $this->ExecuteQuery($sql, [':idProfesionales' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $Img = $this->getImagenFromNoticia($id);
            $prof = $result[0];
            return new Profesionales($prof['idNoticias'], $prof['Titulo'], $prof['Descripcion'], $Img);
        } else {
            return null;
        }
    }

    public function getImagenFromProfesionales($id) {
        $sql =  "SELECT i.* FROM Profesionales_has_ImagenProf AS ni "
                . "INNER JOIN  ImagenProf as i "
                . "ON i.idImagenProf = ni.ImagenProf_idImagenProf WHERE Profesionales_idProfesionales = :Profesionales_idProfesionales;";
        $result = $this->ExecuteQuery($sql, [':Profesionales_idProfesionales' => $id]);
        $Img=[];
        if ($result) {
             foreach ($result as $linha) {
                 $Img[] = new ImagenProf(
				 
						$linha['idImagenProf']);
                        $linha['Nombre'];
                         
             }
            }
        return $Img;
    }
	 public function insereProfesionales($prof) {
        $sql = "INSERT INTO Profesionales(nombre,formacion) VALUES(:Nombre,:Formacion)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $news->getNombre(),
            ':Formacion' => $news->getFormacion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerProfesionales($id) {
			
		if($this->ExecuteQuery("SELECT * FROM Profesionales_has_ImagenProf WHERE Profesionales_idProfesionales  = :Profesionales_idProfesionales", [':Profesionales_idProfesionales' => $id])){
			$sql = "DELETE FROM Profesionales_has_ImagenProf WHERE Profesionales_idProfesionales = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM Profesionales WHERE idProfesionales = :idProfesionales";
				if($this->ExecuteCommand($sql, [':idProfesionales'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM Profesionales WHERE idProfesionales = :idProfesionales";
			if($this->ExecuteCommand($sql, [':idProfesionales'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarProfesionales($profesionales) {
        $sql = 'UPDATE Profesionales SET Formacion = :Formacion,'
                . ' Descripcion=:Descripcion WHERE idProfesionales =:idProfesionales';
        $param = [':Formacion'=>$profesionales->getFormacion(),
            ':Descripcion'=>$profesionales->getDescripcion(),
            ':idProfesionales'=>$profesionales->getIdProfesionales()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
}
