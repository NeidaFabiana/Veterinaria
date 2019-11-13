<?php
if($data){
    $list_img = $data['listImagenNoti'];
}else{
    $list_img = null;
}

?>

			<div class="">
				<h2>Imagenes Noticias</h2>
				
				
				
			<span style="float:left"><a id="but_add" class="btn btn-danger" href="<?php echo $this->base_url?>AdminNoti/add">Añadir</a></span>

			<div class="mb_content_inner">
		
			<table class="table table-hover table-bordered">
			 <thead>
			  <tr>
				<th>Id:</th>
				<th>Imagen:</th>
				<th>Nombre:</th>
				<th>Acciones:</th>
			  </tr>
			</thead>
			<tbody>
			  
			   <?php $count = 0;?>
                         <?php if($list_img):?>   
                           <?php foreach($list_img as $listaImagem): ?> 
                            <?php $count++; $ccs_class=($count%2==0)?'even':'odd';?>  
						<tr class="<?php echo $ccs_class;?>">
                        <td><?php echo $listaImagem->getIdImagen() ?></td>
						<td>
						 <img src="<?php echo $this->base_url?>system/upload/<?php echo $listaImagem->getImagen()?>" width="100"/>
						</td>
                        <td><?php echo substr($listaImagem->getNombre(), 0,50)."...";?></td>      
						
                         <td class="center" style='font-size:10px; font-weight: bold;'>
                                        <a href="<?php echo $this->base_url?>AdminNoti/editImagenNoti/<?php echo $listaImagem->getIdImagen();?>"><i class="fa fa-edit fa-2x"></i></a>

                                        <a href='<?php echo $this->base_url?>AdminNoti/delImagenNoti/<?php echo $listaImagem->getIdImagen();?>'>&#128465;</a>
                                    </td>
                        </tr>
					<?php endforeach; ?>
                          <?php endif;?>   
			  
			  
			</tbody>
		  </table>

		
				
				</div>
			</div>