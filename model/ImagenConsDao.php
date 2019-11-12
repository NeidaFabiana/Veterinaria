<?php


class ImagenConsDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenCons() {
        $sql = "SELECT * FROM ImagenCons";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenCons($linha['idImagen'], $linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenCons(){
        $sql = "SELECT * FROM ImagenCons order by idImagen desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenCons($linha['idImagen'], $linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenConsById($img) {

            $sql = "SELECT * FROM ImagenCons  WHERE idImagen = :idImagen;";
            $result = $this->ExecuteQuery($sql, [':idImagen' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenCons($imgl['idImagen'], $imgl['nombre'], $imgl['imagen']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenCons($img) {
        $sql = "INSERT INTO ImagenCons (nombre,imagen) VALUES(:Nombre,:Imagen)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $img->getNombre(),
            ':Imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenCons($img) {
        $sql = 'UPDATE ImagenProf SET nombre = :Nombre,'
                . ' imagen=:Imagen  WHERE idImagen =:idImagenCons';
        $param = [':idImagenProf'=>$img->getIdImagen(),
		':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenCons($id) {
        $sql = "DELETE FROM ImagenCons WHERE idImagen = :idImagen";
        if($this->ExecuteCommand($sql, [':idImagen'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
