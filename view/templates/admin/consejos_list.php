<?php
if($data){
    $list_cons = $data['listCons'];
}else{
    $list_cons = null;
}

?>

	

	<div class="">
		<h2>Consejos</h2>
				
					<span style="float:left"><a id="but_add" class="btn btn-danger" href="<?php echo $this->base_url?>AdminConsejos/add">Añadir</a></span>

		<div class="">		
			<table class="table table-hover table-bordered" id="sampleTable">
			 <thead>
			  <tr>
				<th>Id:</th>
				<th>Titulo:</th>
				<th>Descripcion:</th>
				<th>Acciones:</th>
			  </tr>
			</thead>
			<tbody>
			  <?php $count = 0;?>
                         <?php if($list_cons):?>   
                           <?php foreach($list_cons as $listCons): ?> 
                            <?php $count++; $ccs_class=($count%2==0)?'even':'odd';?>  
						<tr class="<?php echo $ccs_class;?>">
                        <td><?php echo $listCons->getIdConsejos() ?></td>
                        <td><?php echo $listCons->getTitulo() ?></td>
						<td><?php echo substr($listCons->getDescripcion(), 0,50)."...";?></td>                        
                         <td class="center" style='font-size:10px; font-weight: bold;'>
                                        <a href="<?php echo $this->base_url?>AdminConsejos/editConsejos/<?php echo $listCons->getIdConsejos();?>"><i class="fa fa-edit fa-2x"></i></a>
                          
                                        <a href='<?php echo $this->base_url?>AdminConsejos/delConsejos/<?php echo $listCons->getIdConsejos();?>'>&#128465;</a>
                                    </td>
                        </tr>
                <?php endforeach; ?>
                          <?php endif;?>   
			  
			</tbody>
		    </table>

		</div>
	</div>