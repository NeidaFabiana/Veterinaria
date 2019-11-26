<?php

class ServiciosDAO  extends Model{

    private $listServicios;

  public function __construct() {
        parent::__construct();
        $this->listaServicios = [];
    }
	

	  public function getListServicios() {
        $sql = "SELECT * FROM servicios";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $servicios = new Servicios($linha['Servicio'], $linha['Descripcion'],$linha['ImgSer'],$linha['idServicios']);

            $this->listServicios[] = $servicios;
        }

        return $this->listServicios;
    }
		
	
	  public function getListServiciosImagens() {
        $sql = "SELECT * FROM servicios";
        $result = $this->ExecuteQuery($sql, []);
        foreach ($result as $linha) {

            $ImgSer = $this->getImagenFromServicios($linha['idServicios']);

            $servicios = new Servicios($linha['Servicio'], $linha['Descripcion'], $ImgSer,$linha['idServicios']);

            $this->listServicios[] = $servicios;
        }
        return $this->listServicios;
    }
	

    public function getServiciosById($id) {
        $sql = "SELECT * FROM servicios WHERE idServicios = :idServicios";
        $result = $this->ExecuteQuery($sql, [':idServicios' => $id]);
       
        if ($result) {
            $ImgSer = $this->getImagenFromServicios($id);
            $serv = $result[0];
            return new Servicios($serv['Servicio'], $serv['Descripcion'], $ImgSer,$serv['idServicios']);
        } else {
            return null;
        }
    }

    public function getImagenFromServicios($id) {
        $sql = "SELECT i.* FROM servicios_has_imagenserv AS ni "
                . "INNER JOIN  imagenserv as i "
                . "ON i.idImagenServ = ni.imagenserv_idImagenServ WHERE servicios_idServicios = :servicios_idServicios;";
        $result = $this->ExecuteQuery($sql, [':servicios_idServicios' => $id]);
        $ImgSer=[];
        if ($result) {
             foreach ($result as $linha) {
                 $ImgSer[] = new ImagenServ(
				         $linha['Nombre'],
				         $linha['Imagen'],
						$linha['idImagenServ']);
                         
             }
            }
        return $ImgSer;
    }
	
	 public function insereServicios($serv) {
        $sql = "INSERT INTO servicios(Servicio,Descripcion) VALUES(:Servicio,:Descripcion)";
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
			
		if($this->ExecuteQuery("SELECT * FROM servicios_has_imagenserv WHERE servicios_idServicios  = :servicios_idServicios", [':servicios_idServicios' => $id])){
			$sql = "DELETE FROM servicios_has_imagenserv WHERE servicios_idServicios = :idn";
			if($this->ExecuteCommand($sql, [':idn'=>$id])){
				$sql = "DELETE FROM servicios WHERE idServicios = :idServicios";
				if($this->ExecuteCommand($sql, [':idServicios'=>$id])){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}else{
			$sql = "DELETE FROM servicios WHERE idServicios = :idServicios";
			if($this->ExecuteCommand($sql, [':idServicios'=>$id])){
				return true;
			}else{
				return false;
			}
		}
		
    }
    

	 public function atualizarServicios($servicios) {
        $sql = 'UPDATE servicios SET Servicio = :Servicio,'
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
