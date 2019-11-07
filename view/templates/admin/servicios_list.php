<?php
if($data){
    $list_serv = $data['listServ'];
}else{
    $list_serv = null;
}

?>

	

	<div class="mb_content">
		<h2>Servicios</h2>
				
					<span style="float:right"><button id="but_add" class="btn btn-danger" href="<?php echo $this->base_url?>AdminServicios/add">Add New Row</button></span>

		<div class="mb_content_inner">		
			<table class="table table-responsive-md table-sm table-bordered makeEditable">
			 <thead>
			  <tr>
				<th>Id:</th>
				<th>Nombre:</th>
				<th>Descripcion:</th>
				<th>Acciones:</th>
			  </tr>
			</thead>
			<tbody>
			  <?php $count = 0;?>
                         <?php if($list_serv):?>   
                           <?php foreach($list_serv as $listServ): ?> 
                            <?php $count++; $ccs_class=($count%2==0)?'even':'odd';?>  
						<tr class="<?php echo $ccs_class;?>">
                        <td><?php echo $listServ->getIdServicios() ?></td>
                        <td><?php echo $listServ->getNombre() ?></td>
						<td><?php echo substr($listServ->getDescripcion(), 0,50)."...";?></td>                        
                         <td class="center" style='font-size:10px; font-weight: bold;'>
                                        <a href="<?php echo $this->base_url?>AdminServicios/add/editServicios/<?php echo $listServ->getIdServicios();?>"><i class="fa fa-edit fa-2x"></i></a>
                          
                                        <a href='<?php echo $this->base_url?>AdminServicios/delServicios/<?php echo $listServ->getIdServicios();?>'>&#128465;</a>
                                    </td>
                        </tr>
                <?php endforeach; ?>
                          <?php endif;?>   
			  
			</tbody>
		    </table>

		</div>
	</div>