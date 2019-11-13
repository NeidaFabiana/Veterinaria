<?php
if($data){
    $list_consu = $data['listConsu'];
}else{
    $list_consu = null;
}

?>

	

	<div class="">
		<h2>Consultas</h2>
				
					<span style="float:left"><a id="but_add" class="btn btn-danger" href="<?php echo $this->base_url?>AdminConsultas/add">Añadir</a></span>

		<div class="mb_content_inner">		
			<table class="table table-hover table-bordered">
			 <thead>
			  <tr>
				<th>Id:</th>
				<th>Nombre:</th>
				<th>Fecha:</th>
				<th>Horario:</th>
				<th>Telefono:</th>
				<th>Direccion:</th>
				<th>Acciones:</th>
			  </tr>
			</thead>
			<tbody>
			  <?php $count = 0;?>
                         <?php if($list_consu):?>   
                           <?php foreach($list_consu as $listConsu): ?> 
                            <?php $count++; $ccs_class=($count%2==0)?'even':'odd';?>  
						<tr class="<?php echo $ccs_class;?>">
                        <td><?php echo $listConsu->getIdConsultas() ?></td>
                        <td><?php echo $listConsu->getNombre() ?></td>
                        <td><?php echo $listConsu->getFecha() ?></td>
                        <td><?php echo $listConsu->getHorario() ?></td>
                        <td><?php echo $listConsu->getTelefono() ?></td>
						<td><?php echo substr($listConsu->getDireccion(), 0,50)."...";?></td>                        
                         <td class="center" style='font-size:10px; font-weight: bold;'>
                                        <a href="<?php echo $this->base_url?>AdminConsultas/add/editConsultas/<?php echo $listConsu->getIdConsultas();?>"><i class="fa fa-edit fa-2x"></i></a>
                          
                                        <a href='<?php echo $this->base_url?>AdminConsultas/delConsultas/<?php echo $listConsu->getIdConsultas();?>'>&#128465;</a>
                                    </td>
                        </tr>
                <?php endforeach; ?>
                          <?php endif;?>   
			  
			</tbody>
		    </table>

		</div>
	</div>