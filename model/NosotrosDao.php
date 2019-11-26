<?php


class NosotrosDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListNosotros() {
        $sql = "SELECT * FROM nosotros";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Nosotros($linha['Imagen'],$linha['Descripcion'], $linha['idNosotros']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasNosotros(){
        $sql = "SELECT * FROM nosotros order by idNosotros desc limit 1";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Nosotros($linha['Imagen'], $linha['Descripcion'], $linha['idNosotros']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	
	

    public function getNosotrosById($img) {

            $sql = "SELECT * FROM nosotros WHERE idNosotros = :idNosotros;";
            $result = $this->ExecuteQuery($sql, [':idNosotros' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new Nosotros($imgl['Imagen'], $imgl['Descripcion'], $imgl['idNosotros']);
        } else {
            return null;
        }
    }

	
   
	 public function insereNosotros($img) {
        $sql = "INSERT INTO nosotros (Imagen,Descripcion) VALUES(:Imagen,:Descripcion)";
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
        $sql = 'UPDATE nosotros SET Imagen=:Imagen,'
                . ' Descripcion = :Descripcion WHERE idNosotros=:idNosotros';
        $param = [':Imagen'=>$img->getImagen(),
            ':Descripcion'=>$img->getDescripcion(),
			':idNosotros'=>$img->getIdNosotros()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeNosotros($id) {
        $sql = "DELETE FROM nosotros WHERE idNosotros = :idNosotros";
        if($this->ExecuteCommand($sql, [':idNosotros'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
