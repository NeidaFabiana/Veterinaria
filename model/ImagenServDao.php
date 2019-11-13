<?php


class ImagenServDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenServImagens() {
        $sql = "SELECT * FROM ImagenServ";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $Imagen = new ImagenServ($linha['Nombre'], $Imagen,$linha['idImagenServ']);

            $this->listImagem[] = $Imagen;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenServImagens(){
        $sql = "SELECT * FROM ImagenServ order by idImagenServ desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $Imagen = new ImagenServ($linha['Nombre'], $Imagen,$linha['idImagenServ']);

            $this->listImagem[] = $Imagen;
        }

        return $this->listImagem;
    }
	

    public function getImagenServById($img) {

            $sql = "SELECT * FROM ImagenServ WHERE idImagenServ = :idImagenServ;";
            $result = $this->ExecuteQuery($sql, [':idImagenServ' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenServ($imgl['Nombre'], $imgl['Imagen'],$imgl['idImagenServ']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenServ($img) {
        $sql = "INSERT INTO ImagenServ (Nombre,Imagen) VALUES(:Nombre,:Imagen)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $img->getNombre(),
            ':Imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenServ($img) {
        $sql = 'UPDATE ImagenProf SET Nombre = :Nombre,'
                . ' Imagen=:Imagen  WHERE idImagen =:idImagenServ';
        $param = [':idImagenServ'=>$img->getIdImagen(),
		':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenServ($id) {
        $sql = "DELETE FROM ImagenServ WHERE idImagenServ = :idImagenServ";
        if($this->ExecuteCommand($sql, [':idImagenServ'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
