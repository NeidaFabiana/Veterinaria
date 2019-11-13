<?php

class ServiciosDAO  extends Model{

    private $listServicios;

  public function __construct() {
        parent::__construct();
        $this->listaServicios = [];
    }
	

	  public function getListServicios() {
        $sql = "SELECT * FROM Servicios";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $servicios = new Servicios($linha['Servicio'], $linha['Descripcion'],$linha['ImgSer'],$linha['idServicios']);

            $this->listServicios[] = $servicios;
        }

        return $this->listServicios;
    }
		
	
	  public function getListServiciosImagens() {
        $sql = "SELECT * FROM Servicios";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgSer = $this->getImagenFromServicios($linha['idServicios']);

            $servicios = new Servicios($linha['Servicio'], $linha['Descripcion'], $ImgSer,$linha['idServicios']);

            $this->listServicios[] = $servicios;
        }
        return $this->listServicios;
    }
	

    public function getServiciosById($id) {
        $sql = "SELECT * FROM Servicios WHERE idServicios = :idServicios";
        $result = $this->ExecuteQuery($sql, [':idServicios' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $ImgSer = $this->getImagenFromServicios($id);
            $serv = $result[0];
            return new Servicios($serv['Servicio'], $serv['Descripcion'], $ImgSer,$serv['idServicios']);
        } else {
            return null;
        }
    }

    public function getImagenFromServicios($id) {
        $sql =  "SELECT i.* FROM Servicios AS ni "
                . "INNER JOIN  ImagenServ as i "
                . "ON i.idImagenServ = ni.ImagenServ_idImagenServ WHERE Servicios_idServicios = :Servicios_idServicios;";
        $result = $this->ExecuteQuery($sql, [':Servicios_idServicios' => $id]);
        $Img=[];
        if ($result) {
             foreach ($result as $linha) {
                 $Img[] = new ImagenServ(
				         $linha['Nombre'],
				         $linha['Imagen'],
						$linha['idImagenServ']);
                         
             }
            }
        return $Img;
    }
	 public function insereServicios($serv) {
        $sql = "INSERT INTO Servicios(Servicio,Descripcion) VALUES(:Servicio,:Descripcion)";
        $result = $this->ExecuteCommand($sql,
                [':Servicio' => $serv->getServicio(),
            ':Descripcion' => $serv->getDescripcion()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	    public function removerServicios($id) {
			
		if($this->ExecuteQuery("SELECT * FROM Servicios WHERE Servicios_idServicios  = :Servicios_idServicios", [':Servicios_idServicios' => $id])){
			$sql = "DELETE FROM Servicios_has_ImagenServ WHERE Servicios_idServicios = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM Servicios WHERE idServicios = :idServicios";
				if($this->ExecuteCommand($sql, [':idServicios'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM Servicios WHERE idServicios = :idServicios";
			if($this->ExecuteCommand($sql, [':idServicios'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarServicios($servicios) {
        $sql = 'UPDATE Servicios SET Servicio = :Servicio,'
                . ' Descripcion=:Descripcion WHERE idServicios =:idServicios';
        $param = [':Servicio'=>$servicios->getServicio(),
            ':Descripcion'=>$servicios->getDescripcion(),
            ':idServicios'=>$servicios->getIdServicios()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
	
}
