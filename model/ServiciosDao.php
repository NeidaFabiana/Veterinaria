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
            $servicios = new Servicios( $linha['idServicios'], $linha['servicio'], $linha['descripcion'],$linha['imgserv']);

            $this->listServicios[] = $servicios;
        }

        return $this->listServicios;
    }
		
	
	  public function getListServiciosImagens() {
        $sql = "SELECT * FROM Servicios";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $Img = $this->getImagenFromservicios($linha['idServicios']);

            $servicios = new Servicios($linha['idServicios'], $linha['servicio'], $linha['Descripcion'], $Img);

            $this->listServicios[] = $servicios;
        }
        return $this->listServicios;
    }
	

    public function getserviciosById($id) {
        $sql = "SELECT * FROM Servicios WHERE idServicios = :idServicios";
        $result = $this->ExecuteQuery($sql, [':idServicios' => $id]);
       // echo "<pre>";
       // print_r($result);
       //  echo "</pre>";
		// die;
        if ($result) {
            $Img = $this->getImagenFromservicios($id);
            $serv = $result[0];
            return new Servicios($serv['idServicios'], $serv['servicio'], $serv['descripcion'], $Img);
        } else {
            return null;
        }
    }

    public function getImagenFromServicios($id) {
        $sql =  "SELECT i.* FROM Servicios_has_ImagenServ AS ni "
                . "INNER JOIN  ImagenServ as i "
                . "ON i.idImagenServ = ni.ImagenServ_idImagenServ WHERE Servicios_idServicios = :Servicios_idServicios;";
        $result = $this->ExecuteQuery($sql, [':Servicios_idServicios' => $id]);
        $Img=[];
        if ($result) {
             foreach ($result as $linha) {
                 $Img[] = new ImagenServ(
				 
						$linha['idImagenServ']);
                        $linha['Nombre'],
                         
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
			
		if($this->ExecuteQuery("SELECT * FROM Servicios_has_ImagenServ WHERE Servicios_idServicios  = :Servicios_idServicios", [':Servicios_idServicios' => $id])){
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
        $sql = 'UPDATE Servicios SET servicio = :servicio,'
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
