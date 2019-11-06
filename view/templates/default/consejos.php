<?php
$list_cons = $data['listCons'];
?>	
		
		<!-- Consejos-->    		
		<section class="sect-cons">
			<div class="font-titulo"><p><font><strong>Consejos</strong></font></p></div>
				<div class="container-one">
				
				
				
					<div id="noticias">
					
						<div class="container1">
						<?php if ($list_cons): ?>
	  
							<?php foreach($list_cons as $cons):?>
							
							<div id="imag1">	
							<?php foreach ($cons->getImgcons() as $imagem): ?>
								<img src="<?php echo $this->asset."system/upload/".$imagem->getNombre()?>" width="230" height="202" />
							<?php endforeach;?>
							</div>
							
								<article>
									<div class="content1">	
										
										<h2><a href="<?php echo $this->base_url?>News/viewNews/<?php echo $cons->getIdConsejos()?>">
										<p><span><?php echo $cons->getTitulo()?> </span></p></a></h2>	
										<p><?php echo $cons->getDescripcion()?></p>	
									</div>
								</article>
						</div>
					</div>

						
				</div>
					
					<div class="content-one">	
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</div>		
			
		</section>
        <!-- /Consejos -->    
		