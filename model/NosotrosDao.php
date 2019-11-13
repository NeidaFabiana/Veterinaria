<?php


class NosotrosDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListNosotros() {
        $sql = "SELECT * FROM Nosotros";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Nosotros($linha['Imagen'],$linha['Descripcion'], $linha['idNosotros']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	
	

    public function getNosotrosById($img) {

            $sql = "SELECT * FROM Nosotros WHERE idNosotros = :idNosotros;";
            $result = $this->ExecuteQuery($sql, [':idNosotros' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new Nosotros($imgl['Imagen'], $imgl['Descripcion'], $imgl['idNosotros']);
        } else {
            return null;
        }
    }

	
   
	 public function insereNosotros($img) {
        $sql = "INSERT INTO Nosotros (Imagen,Descripcion) VALUES(:Imagen,:Descripcion)";
        $result = $this->ExecuteCommand($sql,
                [':Imagen' => $img->getImagen(),
				':Descripcion' => $img->getDescripcion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarNosotros($img) {
        $sql = 'UPDATE Nosotros SET Imagen=:Imagen,'
                . ' Descripcion = :Descripcion WHERE idNosotros=:idNosotros';
        $param = [':idNosotros'=>$img->getIdNosotros(),
			':Imagen'=>$img->getImagen(),
            ':Descripcion'=>$img->getDescripcion()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeNosotros($id) {
        $sql = "DELETE FROM Nosotros WHERE idNosotros = :idNosotros";
        if($this->ExecuteCommand($sql, [':idNosotros'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
