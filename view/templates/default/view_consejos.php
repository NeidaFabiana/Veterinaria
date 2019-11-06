<?php
$cons = $data['consejos'];
?>
   
   <!-- Consejos-->    		
		<section class="noti2">
			<?php if ($cons): ?>
				<div class="font-titulo"><p><font><strong><?php echo $cons->getTitulo()?></strong></font></p></div>
				
				
					<div id="info-not">
					
							<div id="imag-not">	
							
							<?php foreach ($cons->getImgnoti() as $imagen): ?>
								<img src="<?= $this->asset ?>system/upload/<?= $imagen->getNombre() ?>" width="530" height="350" />
							<?php endforeach; ?>
							</div>	
						
								<article>
										<p><?php echo $noti->getDescripcion()?></p>
					
								</article>
					</div>			

						
			<?php else: ?>
                  <h3>Consejo no encontrado!</h3>
						<?php endif; ?>
                        <a href="<?php echo $this->base_url?>#consejos">Volver</a>
					
					
			
		</section>
        <!-- /Noticias -->    
		