<?php


class SlideDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenSlide() {
        $sql = "SELECT * FROM Slide";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Slide($linha['idSlide'],$linha['nombre'], $linha['imagen']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagem(){
			$sql = "SELECT * FROM Slide order by idSlide desc limit 6";
			$result = $this->ExecuteQuery($sql, []);

			foreach ($result as $linha) {
				$imagem = new Slide($linha['idSlide'],$linha['nombre'], $linha['imagen']);

				$this->listImagem[] = $imagem;
			}

			return $this->listImagem;
		}
	

    public function getImagemById($img) {

            $sql = "SELECT * FROM Slide  WHERE idSlide = :idSlide;";
            $result = $this->ExecuteQuery($sql, [':idSlide' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new Slide($imgl['idImagenes'],$imgl['nombre'], $imgl['imagen']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagem($img) {
        $sql = "INSERT INTO Slide (nombre,imagen) VALUES(:nombre,:imagen)";
        $result = $this->ExecuteCommand($sql,
                [':nombre' => $img->getNombre(),
            ':imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagem($img) {
        $sql = 'UPDATE imagenes SET nombre = :nombre,'
                . ' imagen=:imagen  WHERE idSlide =:idSlide';
        $param = [':idslide'=>$img->getIdSlide(),
			':nombre'=>$img->getNombre(),
            ':imagen'=>$img->getImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagem($id) {
        $sql = "DELETE FROM Slide WHERE idSlide = :idimag";
        if($this->ExecuteCommand($sql, [':idimag'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
