<?php

class NoticiasDAO  extends Model{

    private $listNoticias;

  public function __construct() {
        parent::__construct();
        $this->listaNoticias = [];
    }
	

	  public function getListNoticias() {
        $sql = "SELECT * FROM noticias";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $noticia = new Noticias($linha['Titulo'], $linha['Descripcion'],$linha['ImgNot'],$linha['idNoticias']);

            $this->listNoticias[] = $noticia;
        }

        return $this->listNoticias;
    }
	
	
 public function getListUltimasNoticias(){
        $sql = "SELECT * FROM noticias order by idNoticias desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $noticia = new Noticias($linha['Titulo'], $linha['Descripcion'],$linha['ImgNot'],$linha['idNoticias']);

            $this->listNoticias[] = $noticia;
        }

        return $this->listNoticias;
    }
	
	
	  public function getListNoticiasImagens() {
        $sql = "SELECT * FROM noticias";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgNot = $this->getImagenFromNoticias($linha['idNoticias']);

            $noticia = new Noticias($linha['Titulo'], $linha['Descripcion'], $ImgNot,$linha['idNoticias']);

            $this->listNoticias[] = $noticia;
        }
        return $this->listNoticias;
    }
	
	 public function getListUltimasNoticiasImagens() {
        $sql = "SELECT * FROM noticias order by idNoticias desc limit 3";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgNot = $this->getImagenFromNoticias($linha['idNoticias']);

            $noticia = new Noticias($linha['Titulo'], $linha['Descripcion'], $ImgNot,$linha['idNoticias']);

            $this->listNoticias[] = $noticia;
        }
        return $this->listNoticias;
    }

    public function getNoticiasById($id) {
        $sql = "SELECT * FROM noticias WHERE idNoticias = :idNoticias";
        $result = $this->ExecuteQuery($sql, [':idNoticias' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $ImgNot = $this->getImagenFromNoticias($id);
            $news = $result[0];
            return new Noticias($news['Titulo'], $news['Descripcion'], $ImgNot,$news['idNoticias']);
        } else {
            return null;
        }
    }

    public function getImagenFromNoticias($id) {
        $sql =  "SELECT i.* FROM noticias_has_imagennoti AS ni "
                . "INNER JOIN  imagennoti as i "
                . "ON i.idImagenNoti = ni.imagennoti_idImagenNoti WHERE noticias_idNoticias = :noticias_idNoticias;";
        $result = $this->ExecuteQuery($sql, [':noticias_idNoticias' => $id]);
        $ImgNot=[];
        if ($result) {
             foreach ($result as $linha) {
                 $ImgNot[] = new ImagenNoti(
				        
						$linha['Nombre'],
						$linha['Imagen'],
						$linha['idImagen']);
                         
             }
            }
        return $ImgNot;
    }
	 public function insereNoticias($news) {
        $sql = "INSERT INTO noticias(Titulo,Descripcion) VALUES(:Titulo,:Descripcion)";
        $result = $this->ExecuteCommand($sql,
                [':Titulo' => $news->getTitulo(),
            ':Descripcion' => $news->getDescripcion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerNoticias($id) {
			
		if($this->ExecuteQuery("SELECT * FROM noticias_has_imagennoti WHERE noticias_idNoticias  = :noticias_idNoticias", [':noticias_idNoticias' => $id])){
			$sql = "DELETE FROM noticias_has_imagennoti WHERE noticias_idNoticias = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
			$sql = "DELETE FROM noticias WHERE idNoticias = :idNoticias";
				if($this->ExecuteCommand($sql, [':idNoticias'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM noticias WHERE idNoticias = :idNoticias";
			if($this->ExecuteCommand($sql, [':idNoticias'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarNoticias($noticia) {
        $sql = 'UPDATE noticias SET Titulo = :Titulo,'
                . ' Descripcion=:Descripcion WHERE idNoticias =:idNoticias';
        $param = [':Titulo'=>$noticia->getTitulo(),
            ':Descripcion'=>$noticia->getDescripcion(),
            ':idNoticias'=>$noticia->getIdNoticias()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
}
