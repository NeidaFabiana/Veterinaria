<?php
if($data){
    $list_img = $data['listImagem'];
}else{
    $list_img = null;
}

?>

			<div class="mb_content">
				<h2>Imagen Consejos</h2>
				
				
				
			<span style="float:right"><button id="but_add" class="btn btn-danger" href="<?php echo $this->base_url?>AdminGaleria/add">Add New Row</button></span>

			<div class="mb_content_inner">
		
			<table class="table table-responsive-md table-sm table-bordered makeEditable">
			 <thead>
			  <tr>
				<th>Id:</th>
				<th>Nombre:</th>
				<th>Imagen:</th>
				<th>Acciones:</th>
			  </tr>
			</thead>
			<tbody>
			  
			   <?php $count = 0;?>
                         <?php if($list_img):?>   
                           <?php foreach($list_img as $listaImagem): ?> 
                            <?php $count++; $ccs_class=($count%2==0)?'even':'odd';?>  
						<tr class="<?php echo $ccs_class;?>">
                        <td><?php echo $listaImagem->getIdimagen() ?></td>
						<td>
						 <img src="<?php echo $this->base_url?>system/upload/<?php echo $listaImagem->getNombre()?>" width="100"/>
						</td>
                        <td><?php echo substr($listaImagem->getDescripcion(), 0,50)."...";?></td>      
						
                         <td class="center" style='font-size:10px; font-weight: bold;'>
                                        <a href="<?php echo $this->base_url?>AdminGaleria/editImagem/<?php echo $listaImagem->getIdimagen();?>"><i class="fa fa-edit fa-2x"></i></a>

                                        <a href='<?php echo $this->base_url?>AdminGaleria/delImagem/<?php echo $listaImagem->getIdimagen();?>'>&#128465;</a>
                                    </td>
                        </tr>
					<?php endforeach; ?>
                          <?php endif;?>   
			  
			  
			</tbody>
		  </table>

		
				
				</div>
			</div>