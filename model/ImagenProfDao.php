<?php


class ImagenProfDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenProf() {
        $sql = "SELECT * FROM imagenprof";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenProf($linha['Nombre'], $linha['Imagen'],$linha['idImagenProf']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenProf(){
        $sql = "SELECT * FROM imagenprof order by idImagenProf desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenProf($linha['Nombre'], $linha['Imagen'],$linha['idImagenProf']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenProfById($img) {

            $sql = "SELECT * FROM imagenprof  WHERE idImagenProf = :idImagenProf;";
            $result = $this->ExecuteQuery($sql, [':idImagenProf' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenProf($imgl['Nombre'], $imgl['Imagen'],$imgl['idImagenProf']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenProf($img) {
        $sql = "INSERT INTO imagenprof (Nombre,Imagen) VALUES(:Nombre,:Imagen)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $img->getNombre(),
            ':Imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenProf($img) {
        $sql = 'UPDATE imagenprof SET Nombre = :Nombre,'
                . ' Imagen=:Imagen  WHERE idImagen =:idImagenProf';
        $param = [':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen(),
			':idImagenProf'=>$img->getIdImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenProf($id) {
        $sql = "DELETE FROM ImagenProf WHERE idImagenProf = :idImagenProf";
        if($this->ExecuteCommand($sql, [':idImagenProf'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
