<?php


class ImagenServDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenServ() {
        $sql = "SELECT * FROM ImagenServ";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenServ($linha['idImagen'], $linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenServ(){
        $sql = "SELECT * FROM ImagenServ order by idImagenServ desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenServ($linha['idImagen'], $linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenServById($img) {

            $sql = "SELECT * FROM ImagenServ WHERE idImagen = :idImagenServ;";
            $result = $this->ExecuteQuery($sql, [':idImagenServ' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenServ($imgl['idImagen'], $imgl['nombre'], $imgl['imagen']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenServ($img) {
        $sql = "INSERT INTO ImagenServ (Nombre,Imagen) VALUES(:Nombre,:Imagen)";
        $result = $this->ExecuteCommand($sql,
                [':nombre' => $img->getNombre(),
            ':imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenProf($img) {
        $sql = 'UPDATE ImagenProf SET nombre = :Nombre,'
                . ' imagen=:Imagen  WHERE idImagen =:idImagenServ';
        $param = [':idImagenServ'=>$img->getIdImagenServ(),
		':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenServ($id) {
        $sql = "DELETE FROM ImagenServ WHERE idImagen = :idImagenServ";
        if($this->ExecuteCommand($sql, [':idImagenServ'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
