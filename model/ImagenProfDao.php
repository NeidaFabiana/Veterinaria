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
            $imagem = new ImagenProf( $linha['Imagen'],$linha['Nombre'],$linha['idImagenProf']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenProf(){
        $sql = "SELECT * FROM imagenprof order by idImagenProf desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenProf($linha['Imagen'],$linha['Nombre'],$linha['idImagenProf']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagenProfById($img) {

            $sql = "SELECT * FROM imagenprof  WHERE idImagenProf = :idImagenProf;";
            $result = $this->ExecuteQuery($sql, [':idImagenProf' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenProf($imgl['Imagen'],$imgl['Nombre'],$imgl['idImagenProf']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenProf($img) {
        $sql = "INSERT INTO imagenprof (Imagen,Nombre) VALUES(:Imagen,:Nombre)";
        $result = $this->ExecuteCommand($sql,
                [':Imagen' => $img->getImagen(),
            ':Nombre' => $img->getNombre()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenProf($img) {
        $sql = 'UPDATE imagenprof SET Imagen=:Imagen ,'
                . ' Nombre = :Nombre WHERE idImagenProf =:idImagenProf';
        $param = [':Imagen'=>$img->getImagen(),
            ':Nombre'=>$img->getNombre(),
			':idImagenProf'=>$img->getIdImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenProf($id) {
        $sql = "DELETE FROM imagenprof WHERE idImagenProf = :idImagenProf";
        if($this->ExecuteCommand($sql, [':idImagenProf'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
