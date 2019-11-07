<?php
if($data){
    $list_noti = $data['listNoti'];
}else{
    $list_noti = null;
}

?>

	

	<div class="mb_content">
		<h2>Noticias</h2>
				
					<span style="float:right"><button id="but_add" class="btn btn-danger" href="<?php echo $this->base_url?>AdminNoticias/add">Add New Row</button></span>

		<div class="mb_content_inner">		
			<table class="table table-responsive-md table-sm table-bordered makeEditable">
			 <thead>
			  <tr>
				<th>Id:</th>
				<th>Nombre:</th>
				<th>Descripción:</th>
				<th>Acciones:</th>
			  </tr>
			</thead>
			<tbody>
			  <?php $count = 0;?>
                         <?php if($list_noti):?>   
                           <?php foreach($list_noti as $listNoti): ?> 
                            <?php $count++; $ccs_class=($count%2==0)?'even':'odd';?>  
						<tr class="<?php echo $ccs_class;?>">
                        <td><?php echo $listNoti->getIdNoticias() ?></td>
                        <td><?php echo $listNoti->getNombre() ?></td>
						<td><?php echo substr($listNoti->getDescripcion(), 0,50)."...";?></td>                        
                         <td class="center" style='font-size:10px; font-weight: bold;'>
                                        <a href="<?php echo $this->base_url?>AdminNoticias/editNoticias/<?php echo $listNoti->getIdNoticias();?>"><i class="fa fa-edit fa-2x"></i></a>
                          
                                        <a href='<?php echo $this->base_url?>AdminNoticias/delNoticias/<?php echo $listNoti->getIdNoticias();?>'>&#128465;</a>
                                    </td>
                        </tr>
                <?php endforeach; ?>
                          <?php endif;?>   
			  
			</tbody>
		    </table>

		</div>
	</div>