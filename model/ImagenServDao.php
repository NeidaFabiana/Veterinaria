<?php


class ImagenServDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenServ() {
        $sql = "SELECT * FROM imagenserv";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $Imagen = new ImagenServ($linha['Nombre'], $linha['Imagen'],$linha['idImagenProf']);

            $this->listImagem[] = $Imagen;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenServ(){
        $sql = "SELECT * FROM imagenserv order by idImagenServ desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $Imagen = new ImagenServ($linha['Nombre'], $linha['Imagen'],$linha['idImagenProf']);

            $this->listImagem[] = $Imagen;
        }

        return $this->listImagem;
    }
	

    public function getImagenServById($img) {

            $sql = "SELECT * FROM imagenserv WHERE idImagenServ = :idImagenServ;";
            $result = $this->ExecuteQuery($sql, [':idImagenServ' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenServ($imgl['Nombre'], $imgl['Imagen'],$imgl['idImagenServ']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenServ($img) {
        $sql = "INSERT INTO imagenserv (Nombre,Imagen) VALUES(:Nombre,:Imagen)";
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
        $sql = 'UPDATE imagenserv SET Nombre = :Nombre,'
                . ' Imagen=:Imagen  WHERE idImagen =:idImagenServ';
        $param = [':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen(),
			':idImagenServ'=>$img->getIdImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenServ($id) {
        $sql = "DELETE FROM imagenserv WHERE idImagenServ = :idImagenServ";
        if($this->ExecuteCommand($sql, [':idImagenServ'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
