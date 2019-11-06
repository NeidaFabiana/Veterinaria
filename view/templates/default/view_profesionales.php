<?php
$prof = $data['profesionales'];
?>
   
   <!-- Noticias-->    		
		<section class="noti2">
			<?php if ($prof): ?>
				<div class="font-titulo"><p><font><strong><?php echo $prof->getTitulo()?></strong></font></p></div>
				
				
					<div id="info-not">
					
							<div id="imag-not">	
							
							<?php foreach ($prof->getImgnoti() as $imagen): ?>
								<img src="<?= $this->asset ?>system/upload/<?= $imagen->getNombre() ?>" width="530" height="350" />
							<?php endforeach; ?>
							</div>	
						
								<article>
										<p><?php echo $prof->getFormacion()?></p>
					
								</article>
					</div>			

						
			<?php else: ?>
                  <h3>Notícia no encontrada!</h3>
						<?php endif; ?>
                        <a href="<?php echo $this->base_url?>#noticias">Volver</a>
					
					
			
		</section>
        <!-- /Noticias -->    
		