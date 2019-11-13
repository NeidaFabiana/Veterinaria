<?php
$list_noti = $data['listNoti'];
?>
		
         <!-- Noticias-->    		
		<section class="noti2">
			<div class="font-titulo"><p><font><strong>Noticias</strong></font></p></div>
				<div class="font-sub"><p>En nuestro blog encontrarás información de interés, las novedades de la clínica y las campañas que realizamos para ayudarte a cuidar la salud de tu mascota.</p></div>
				<div class="container-one">
				
					<div id="noticias">
					<?php if ($list_noti): ?>
	  
						<?php foreach($list_noti as $noti):?>
					
						<div class="container1">
						
							<div id="imag1">	
								<?php foreach ($noti->getImgnoti() as $imagen): ?>
								<img src="<?php echo $this->asset."system/upload/".$noti->getImgnoti()?>" width="230" height="202" />
								 <?php endforeach;?>	
							</div>
							
								<article>
									<div class="content1">			
									<h2><a href="<?php echo $this->base_url?>Noticias/viewNoticias/<?php echo $noti->getIdNoticias()?>">
									<p><span><?php echo $noti->getTitulo()?></span></p></a></h2>
									
										<p><?php echo $noti->getDescripcion()?></p>
									</div>
								</article>
						</div>
							<a class="btn-noti" href="<?php echo $this->base_url?>News/viewNews/<?php echo $noti->getIdNoticias()?>">Ver más</a>
					
					<?php endforeach;?>
					 <?php else:?>
                           <h3>No fueron registradas las notícias!</h3>
                    <?php endif; ?>
					
					</div>	

				</div>
					
					<div class="content-one">	
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</div>		
			
		</section>
        <!-- /Noticias -->    
		
