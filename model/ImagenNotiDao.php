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
            $imagem = new ImagenNoti($linha['Imagen'],$linha['Nombre'], $linha['idImagenNoti']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenNoti(){
        $sql = "SELECT * FROM ImagenNoti order by idImagenNoti desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenNoti($linha['Imagen'], $linha['Nombre'],$linha['idImagenNoti']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenNotiById($img) {

            $sql = "SELECT * FROM ImagenNoti WHERE idImagenNoti = :idImagenNoti;";
            $result = $this->ExecuteQuery($sql, [':idImagenNoti' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenServ($imgl['Imagen'], $imgl['Nombre'], $imgl['idImagenNoti']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenNoti($img) {
        $sql = "INSERT INTO ImagenNoti (Imagen,Nombre) VALUES(:Imagen,:Nombre)";
        $result = $this->ExecuteCommand($sql,
                [':Imagen' => $img->getImagen(),
				':Nombre' => $img->getNombre()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenNoti($img) {
        $sql = 'UPDATE ImagenNoti SET Imagen=:Imagen,'
                . ' Nombre = :Nombre  WHERE idImagenNoti =:idImagenNoti';
        $param = [':idImagen'=>$img->getIdImagenNoti(),
			':Imagen'=>$img->getImagen(),
            ':Nombre'=>$img->getNombre()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenNoti($id) {
        $sql = "DELETE FROM ImagenNoti WHERE idImagenNoti = :idImagenNoti";
        if($this->ExecuteCommand($sql, [':idImagenNoti'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
