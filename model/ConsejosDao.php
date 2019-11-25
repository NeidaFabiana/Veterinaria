<?php

class ConsejosDAO  extends Model{

    private $listConsejos;

  public function __construct() {
        parent::__construct();
        $this->listaConsejos = [];
    }
	

	  public function getListConsejos() {
        $sql = "SELECT * FROM consejos";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'],$linha['ImgCons'],$linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }

        return $this->listConsejos;
    }
	
	
 public function getListUltimasConsejos(){
        $sql = "SELECT * FROM consejos order by idConsejos desc limit 1";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'],$linha['ImgCons'],$linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }

        return $this->listConsejos;
    }
	
	
	  public function getListConsejosImagens() {
        $sql = "SELECT * FROM consejos";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgCons = $this->getImagenFromConsejos($linha['idConsejos']);

            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'], $ImgCons,$linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }
        return $this->listConsejos;
    }
	
	 public function getListUltimasConsejosImagens() {
        $sql = "SELECT * FROM consejos order by idConsejos desc limit 1";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgCons = $this->getImagenFromConsejos($linha['idConsejos']);

            $consejos = new Consejos($linha['Titulo'], $linha['Descripcion'], $ImgCons, $linha['idConsejos']);

            $this->listConsejos[] = $consejos;
        }
        return $this->listConsejos;
    }

    public function getConsejosById($id) {
        $sql = "SELECT * FROM consejos WHERE idConsejos = :idConsejos";
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

    public function getImagenFromConsejos($id) {
        $sql = "SELECT i.* FROM consejos_has_imagencons AS ni "
                . "INNER JOIN  imagencons as i "
                . "ON i.idImagenCons = ni.imagencons_idImagenCons WHERE consejos_idConsejos = :consejos_idConsejos;";
        $result = $this->ExecuteQuery($sql, [':consejos_idConsejos' => $id]);
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
        $sql = "INSERT INTO consejos(Titulo,Descripcion) VALUES(:Titulo,:Descripcion)";
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
			
		if($this->ExecuteQuery("SELECT * FROM consejos_has_imagencons WHERE consejos_idConsejos  = :consejos_idConsejos", [':consejos_idConsejos' => $id])){
			$sql = "DELETE FROM consejos_has_imagencons WHERE consejos_idConsejos = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
			$sql = "DELETE FROM consejos WHERE idConsejos = :idConsejos";
				if($this->ExecuteCommand($sql, [':idConsejos'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM consejos WHERE idConsejos = :idConsejos";
			if($this->ExecuteCommand($sql, [':idConsejos'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarConsejos($consejos) {
        $sql = 'UPDATE consejos SET Titulo = :Titulo,'
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
