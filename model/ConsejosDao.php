<?php

class ConsejosDAO  extends Model{

    private $listConsejos;

  public function __construct() {
        parent::__construct();
        $this->listaConsejos = [];
    }
	

	  public function getListConsejos() {
        $sql = "SELECT * FROM Consejos";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'],$linha['ImgCons'],$linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }

        return $this->listConsejos;
    }
	
	
 public function getListUltimasConsejos(){
        $sql = "SELECT * FROM Consejos order by idConsejos desc limit 1";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'],$linha['ImgCons'],$linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }

        return $this->listConsejos;
    }
	
	
	  public function getListConsejosImagens() {
        $sql = "SELECT * FROM Consejos";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgCons = $this->getImagenFromConsejos($linha['idConsejos']);

            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'], $ImgCons,$linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }
        return $this->listConsejos;
    }
	
	 public function getListUltimasConsejosImagens() {
        $sql = "SELECT * FROM Consejos order by idConsejos desc limit 1";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgCons = $this->getImagenFromConsejos($linha['idConsejos']);

            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'], $ImgCons, $linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }
        return $this->listConsejos;
    }

    public function getConsejosById($id) {
        $sql = "SELECT * FROM Consejos WHERE idConsejos = :idConsejos";
        $result = $this->ExecuteQuery($sql, [':idConsejos' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $ImgCons = $this->getImagenFromConsejos($id);
            $cons = $result[0];
            return new Consejos($cons['Titulo'], $cons['Descripcion'], $ImgCons,$cons['idConsejos']);
        } else {
            return null;
        }
    }

    public function getImagenFromconsejos($id) {
        $sql =  "SELECT i.* FROM Consejos AS ni "
                . "INNER JOIN  ImagenCons as i "
                . "ON i.idImagenCons = ni.ImagenCons_idImagenCons WHERE Consejos_idConsejos = :Consejos_idConsejos;";
        $result = $this->ExecuteQuery($sql, [':Consejos_idConsejos' => $id]);
        $ImgCons=[];
        if ($result) {
             foreach ($result as $linha) {
                 $ImgCons[] = new ImagenCons(
				 
				        $linha['Nombre'],
				        $linha['Imagen'],
						$linha['idImagenCons']);
                         
             }
            }
        return $ImgCons;
    }
	 public function insereConsejos($cons) {
        $sql = "INSERT INTO Consejos(Titulo,Descripcion) VALUES(:Titulo,:Descripcion)";
        $result = $this->ExecuteCommand($sql,
                [':Titulo' => $cons->getTitulo(),
            ':Descripcion' => $cons->getDescripcion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerConsejos($id) {
			
		if($this->ExecuteQuery("SELECT * FROM Consejos WHERE Consejos_idConsejos  = :Consejos_idConsejos", [':Consejos_idConsejos' => $id])){
			$sql = "DELETE FROM Consejos_has_ImagenCons WHERE Consejos_idConsejos = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM Consejos WHERE idConsejos = :idConsejos";
				if($this->ExecuteCommand($sql, [':idConsejos'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM Consejos WHERE idConsejos = :idConsejos";
			if($this->ExecuteCommand($sql, [':idConsejos'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarConsejos($consejos) {
        $sql = 'UPDATE Consejos SET Titulo = :Titulo,'
                . ' Descripcion=:Descripcion WHERE idConsejos =:idConsejos';
        $param = [':Titulo'=>$consejos->getTitulo(),
            ':Descripcion'=>$consejos->getDescripcion(),
            ':idConsejos'=>$consejos->getIdConsejos()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
}
