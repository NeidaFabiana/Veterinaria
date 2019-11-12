<?php


class ImagenNotiDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenNoti() {
        $sql = "SELECT * FROM ImagenNoti";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenNoti($linha['idImagen'], $linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenNoti(){
        $sql = "SELECT * FROM ImagenNoti order by idImagen desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenNoti($linha['idImagen'], $linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenNotiById($img) {

            $sql = "SELECT * FROM ImagenNoti WHERE idImagen = :idImagen;";
            $result = $this->ExecuteQuery($sql, [':idImagen' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenServ($imgl['idImagen'], $imgl['nombre'], $imgl['imagen']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenServ($img) {
        $sql = "INSERT INTO ImagenNoti (nombre,imagen) VALUES(:Nombre,:Imagen)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $img->getNombre(),
            ':Imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenNoti($img) {
        $sql = 'UPDATE ImagenNoti SET nombre = :Nombre,'
                . ' imagen=:Imagen  WHERE idImagen =:idImagen';
        $param = [':idImagen'=>$img->getIdImagenNoti(),
		':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenNoti($id) {
        $sql = "DELETE FROM ImagenNoti WHERE idImagen = :idImagen";
        if($this->ExecuteCommand($sql, [':idImagen'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
