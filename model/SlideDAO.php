<?php


class SlideDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenSlide() {
        $sql = "SELECT * FROM slide";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new Slide($linha['Nombre'], $linha['Imagen'],$linha['idSlide']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagem(){
			$sql = "SELECT * FROM slide order by idSlide desc limit 6";
			$result = $this->ExecuteQuery($sql, []);

			foreach ($result as $linha) {
				$imagem = new Slide($linha['Nombre'], $linha['Imagen'],$linha['idSlide']);

				$this->listImagem[] = $imagem;
			}

			return $this->listImagem;
		}
	

    public function getImagemById($img) {

            $sql = "SELECT * FROM slide  WHERE idSlide = :idSlide;";
            $result = $this->ExecuteQuery($sql, [':idSlide' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new Slide($imgl['Nombre'], $imgl['Imagen'],$imgl['idSlide']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagem($img) {
        $sql = "INSERT INTO slide (Nombre,Imagen) VALUES(:Nombre,:Imagen)";
        $result = $this->ExecuteCommand($sql,
                [':Nombre' => $img->getNombre(),
            ':Imagen' => $img->getImagen()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagem($img) {
        $sql = 'UPDATE slide SET Nombre = :Nombre,'
                . ' Imagen=:Imagen  WHERE idSlide =:idSlide';
        $param = [':idSlide'=>$img->getIdSlide(),
			':Nombre'=>$img->getNombre(),
            ':Imagen'=>$img->getImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagem($id) {
        $sql = "DELETE FROM slide WHERE idSlide = :idSlide";
        if($this->ExecuteCommand($sql, [':idSlide'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
