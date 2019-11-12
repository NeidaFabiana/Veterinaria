<?php

class NoticiasDAO  extends Model{

    private $listNoticias;

  public function __construct() {
        parent::__construct();
        $this->listaNoticias = [];
    }
	

	  public function getListNoticias() {
        $sql = "SELECT * FROM Noticias";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $noticia = new Noticias( $linha['idNoticias'], $linha['titulo'], $linha['descripcion'],$linha['imgnoti']);

            $this->listNoticias[] = $noticia;
        }

        return $this->listNoticias;
    }
	
	
 public function getListUltimasNoticias(){
        $sql = "SELECT * FROM Noticias order by idNoticias desc limit 3";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $noticia = new Noticias($linha['idNoticias'], $linha['titulo'], $linha['descripcion'],$linha['imgnoti']);

            $this->listNoticias[] = $noticia;
        }

        return $this->listNoticias;
    }
	
	
	  public function getListNoticiasImagens() {
        $sql = "SELECT * FROM Noticias";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $Img = $this->getImagenFromNoticias($linha['idNoticias']);

            $noticia = new Noticias($linha['idNoticias'], $linha['titulo'], $linha['descripcion'], $Img);

            $this->listNoticias[] = $noticia;
        }
        return $this->listNoticias;
    }
	
	 public function getListUltimasNoticiasImagens() {
        $sql = "SELECT * FROM Noticias order by idNoticias desc limit 3";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $Img = $this->getImagenFromNoticias($linha['idNoticias']);

            $noticia = new Noticias($linha['idNoticias'], $linha['titulo'], $linha['descripcion'], $Img);

            $this->listNoticias[] = $noticia;
        }
        return $this->listNoticias;
    }

    public function getNoticiasById($id) {
        $sql = "SELECT * FROM Noticias WHERE idNoticias = :idNoticias";
        $result = $this->ExecuteQuery($sql, [':idNoticias' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $Img = $this->getImagenFromNoticias($id);
            $news = $result[0];
            return new Noticias($news['idNoticias'], $news['titulo'], $news['descripcion'], $Img);
        } else {
            return null;
        }
    }

    public function getImagenFromNoticias($id) {
        $sql =  "SELECT i.* FROM Noticias_has_ImagenNoti AS ni "
                . "INNER JOIN  ImagenNoti as i "
                . "ON i.idImagen = ni.ImagenNoti_idImagen WHERE Noticias_idNoticias = :Noticias_idNoticias;";
        $result = $this->ExecuteQuery($sql, [':Noticias_idNoticias' => $id]);
        $Img=[];
        if ($result) {
             foreach ($result as $linha) {
                 $Img[] = new ImagenNoti(
				        
						$linha['Nombre'],
						$linha['idImagen']);
                         
             }
            }
        return $Img;
    }
	 public function insereNoticia($news) {
        $sql = "INSERT INTO Noticias(titulo,descripcion) VALUES(:Titulo,:Descripcion)";
        $result = $this->ExecuteCommand($sql,
                [':Titulo' => $news->getTitulo(),
            ':Descripcion' => $news->getDescripcion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerNoticia($id) {
			
		if($this->ExecuteQuery("SELECT * FROM Noticias_has_ImagenNoti WHERE Noticias_idNoticias  = :Noticias_idNoticias", [':Noticias_idNoticias' => $id])){
			$sql = "DELETE FROM Noticias_has_ImagenNoti WHERE Noticias_idNoticias = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM Noticias WHERE idNoticias = :idNoticias";
				if($this->ExecuteCommand($sql, [':idNoticias'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM Noticias WHERE idNoticias = :idNoticias";
			if($this->ExecuteCommand($sql, [':idNoticias'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarNoticia($noticia) {
        $sql = 'UPDATE Noticias SET titulo = :Titulo,'
                . ' descripcion=:Descripcion WHERE idNoticias =:idNoticias';
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
