<?php


class ImagenConsDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenCons() {
        $sql = "SELECT * FROM imagencons";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenCons($linha['Imagen'], $linha['Nombre'], $linha['idImagenCons']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenCons(){
        $sql = "SELECT * FROM imagencons order by idImagenCons desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenCons($linha['Imagen'], $linha['Nombre'], $linha['idImagenCons']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenConsById($img) {

            $sql = "SELECT * FROM imagencons  WHERE idImagenCons = :idImagenCons;";
            $result = $this->ExecuteQuery($sql, [':idImagenCons' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenCons($imgl['Imagen'], $imgl['Nombre'], $imgl['idImagenCons']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenCons($img) {
        $sql = "INSERT INTO imagencons (Imagen,Nombre) VALUES(:Imagen,:Nombre)";
        $result = $this->ExecuteCommand($sql,
            [':Imagen' => $img->getImagen(),
            ':Nombre' => $img->getNombre()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenCons($img) {
        $sql = 'UPDATE imagenprof SET Imagen=:Imagen,'
                . ' Nombre = :Nombre  WHERE idImagenCons =:idImagenCons';
        $param = [':Imagen'=>$img->getImagen(),
            ':Nombre'=>$img->getNombre(),
			':idImagenCons'=>$img->getIdImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenCons($id) {
        $sql = "DELETE FROM imagencons WHERE idImagenCons = :idImagenCons";
        if($this->ExecuteCommand($sql, [':idImagenCons'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
