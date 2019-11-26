<?php


class ImagenNotiDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenNoti() {
        $sql = "SELECT * FROM imagennoti";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenNoti($linha['Imagen'],$linha['Nombre'], $linha['idImagenNoti']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenNoti(){
        $sql = "SELECT * FROM imagennoti order by idImagenNoti desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenNoti($linha['Imagen'], $linha['Nombre'],$linha['idImagenNoti']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenNotiById($img) {

            $sql = "SELECT * FROM imagennoti WHERE idImagenNoti = :idImagenNoti;";
            $result = $this->ExecuteQuery($sql, [':idImagenNoti' => $img]); 
 if ($result) {
            $imgl = $result[0];
            return new ImagenNoti($imgl['Imagen'], $imgl['Nombre'], $imgl['idImagenNoti']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenNoti($img) {
        $sql = "INSERT INTO imagennoti (Imagen,Nombre) VALUES(:Imagen,:Nombre)";
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
        $sql = 'UPDATE imagennoti SET Imagen=:Imagen,'
                . ' Nombre = :Nombre  WHERE idImagenNoti =:idImagenNoti';
        $param = [':Imagen'=>$img->getImagen(),
            ':Nombre'=>$img->getNombre(),
			':idImagenNoti'=>$img->getIdImagenNoti()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenNoti($id) {
        $sql = "DELETE FROM imagennoti WHERE idImagenNoti = :idImagenNoti";
        if($this->ExecuteCommand($sql, [':idImagenNoti'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
