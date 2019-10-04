<?php


class ImagemDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagem() {
        $sql = "SELECT * FROM Imagenes";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Imagenes($linha['idImagenes'], $linha['nombre'], $linha['fecha']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagem(){
        $sql = "SELECT * FROM Imagenes order by idImagenes desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Imagenes($linha['idImagenes'], $linha['nombre'], $linha['fecha']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }
	

    public function getImagemById($img) {

            $sql = "SELECT * FROM Imagenes  WHERE idImagenes = :idImagenes;";
            $result = $this->ExecuteQuery($sql, [':idImagenes' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new Imagenes($imgl['idImagenes'], $imgl['nombre'], $imgl['fecha']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagem($img) {
        $sql = "INSERT INTO Imagenes (nombre,fecha) VALUES(:Nombre,:Fecha)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $img->getNombre(),
            ':Fecha' => $img->getFecha()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagem($img) {
        $sql = 'UPDATE Imagenes SET nombre = :Nombre,'
                . ' fecha=:Fecha  WHERE idImagenes =:idImagenes';
        $param = [':Nombre'=>$img->getNombre(),
            ':Fecha'=>$img->getFecha(),
            ':idImagenes'=>$img->getIdImagenes()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagem($id) {
        $sql = "DELETE FROM Imagenes WHERE idImagenes = :idimag";
        if($this->ExecuteCommand($sql, [':idimag'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
