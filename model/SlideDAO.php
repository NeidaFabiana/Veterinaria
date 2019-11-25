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
            $imagem = new Slide($linha['Imagen'],$linha['Nombre'],$linha['idSlide']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	public function getListUltimasImagenSlide(){
			$sql = "SELECT * FROM slide order by idSlide desc limit 6";
			$result = $this->ExecuteQuery($sql, []);

			foreach ($result as $linha) {
				$imagem = new Slide($linha['Imagen'],$linha['Nombre'],$linha['idSlide']);

				$this->listImagem[] = $imagem;
			}

			return $this->listImagem;
		}
	

    public function getImagenSlideById($img) {

            $sql = "SELECT * FROM slide  WHERE idSlide = :idSlide;";
            $result = $this->ExecuteQuery($sql, [':idSlide' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new Slide( $imgl['Imagen'],$imgl['Nombre'],$imgl['idSlide']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagem($img) {
        $sql = "INSERT INTO slide (Imagen,Nombre) VALUES(:Imagen,:Nombre)";
        $result = $this->ExecuteCommand($sql,
                [':Imagen' => $img->getImagen(),
            ':Nombre' => $img->getNombre()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenSlide($img) {
        $sql = 'UPDATE slide SET Imagen=:Imagen,'
                . ' Nombre = :Nombre  WHERE idSlide =:idSlide';
        $param = [':idSlide'=>$img->getIdSlide(),
			':Imagen'=>$img->getImagen(),
            ':Nombre'=>$img->getNombre()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenSlide($id) {
        $sql = "DELETE FROM slide WHERE idSlide = :idSlide";
        if($this->ExecuteCommand($sql, [':idSlide'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
