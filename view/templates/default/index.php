<?php
$img = $data['listImagenSlide'];
$list_nost = $data['listNosotros'];
$list_prof = $data['listProf'];
$list_noti = $data['listNoti'];
$list_cons = $data['listCons'];
?>	
	
		
				<section class="sect-slide">	
				<?php if ($img): ?>
					<?php foreach ($img as $listaImagem): ?>
					<div class="slide">
						<ul>
							<li><img  src="<? $this->asset?>system/upload/<?php echo $listaImagem->getImagen()?>" width="100%" height="100%" ></li>
							</ul>
					
					</div>
					<?php endforeach; ?>
					
					<?php else:?>
						  <li>No fueron registrados las imagenes!</li>
					<?php endif; ?>
						<script src="<?php echo $this->asset?>https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
						<script src="<?php echo $this->asset?>assets/js/jquery.slide.js"></script>
						<script type="text/javascript">
						  $(function() {
							$('.slide').slide({
							  'slideSpeed': 3000,
							  'isShowArrow': true,
							  'dotsEvent': 'mouseenter',
							  'isLoadAllImgs': true
							});
						  });
						</script>
						
		
				</section>
		
         <!-- Nosotros -->    		
				<section class="sect-nosotros">
					<div class="container">
						<div class="font-titulo"><p><font><strong>Nosotros</strong></font></p></div>

							<article>
							
							<?php if ($list_nost): ?>
										<?php foreach ($list_nost as $nost): ?>
								<div id="imag">	
									<?php if ($nost->getImagen()): ?>
									<img src="<?php echo $this->asset . "system/upload/" . $nost->getImagen()[0]; ?>" width="500" height="370" />
								</div>
								<div class="content">			
									<p><?php echo $nost->getDescripcion()?></p>
								
								<?php endif; ?>
									</div>
								<?php endforeach;?>	
												  
								<?php else:?>
									<li>No fueron registrados!</li>
								<?php endif; ?>
								
							</article>
					</div>			
					
				</section>
        <!-- /Nosotros -->    
		
        <!-- Nuestros Profesionales -->    		
				<section class="sect-nuestros-prof">
					<div class="container">
						<div class="font-titulo"><p><font><strong>Nuestros Profesionales</strong></font></p></div>
							
							<div id="nuestros-prof">
								
								<article class="item1">	
								
									<?php if ($list_prof): ?>
										<?php foreach ($list_prof as $prof): ?>
									
									<div class="pro1">
									
										<?php if ($prof->getImgprof()): ?>
											<img src="<?php echo $this->asset . "system/upload/" . $prof->getImgprof()[0]->getImagen(); ?>" height="200">
											
											<a href="<?php echo $this->url."Profesionales/viewProfesionales/".$prof->getIdProfesionales()?>">
											<h2><p><?php echo $prof->getNombre()?></p></h2></a>  
										
											<p><?php echo $prof->getFormacion()?></p>
									
										<?php endif; ?>
									</div>
										<?php endforeach;?>	
												  
										<?php else:?>
											   <li>No fueron registrados los profesionales!</li>
										<?php endif; ?>
														
								</article >	
								
							
							</div>
						
							<div>
							<a class="boton" href="<?php echo $this->url?>Profesionales">Ver mas...</a>
							</div>
							
					</div>
					
				</section>
        <!-- /Nuestros Profesionales --> 

        <!-- Noticias --> 		
				<section class="sect-noticias">
					<div class="container">
						<div class="font-titulo"><p><font><strong>Sigue nuestras noticias para informarte sobre todo lo que necesita tu mascota.</strong></font></p></div>
							
							<div id="nuestros-prof">
							
								<article class="item1">			

									<?php if ($list_noti): ?>
										<?php foreach ($list_noti as $noti): ?>
										
									<div class="pro1">
										<?php if ($noti->getImgnoti()): ?>
										
										<img  src="<?php echo $this->asset . "system/upload/" . $noti->getImgnoti()[0]->getImagen(); ?>" height="210">
										
										 <a href="<?php echo $this->url."Noticias/viewNoticias/".$noti->getIdNoticias()?>">
										<h2><p><span><?php echo $noti->getTitulo() ?></span></p></h2></a>
										
										<p><?php echo $noti->getDescripcion()?></p>
										
									<?php endif; ?>	
									</div>
									<?php endforeach;?>	
									
										<?php else:?>
											<li>No fueron registradas las notícias!</li>
										<?php endif; ?>
										
								</article >
									
							
							</div>
						
							<div>
							<a class="boton" href="<?php echo $this->url?>Noticias">Ver mas...</a>
							</div>
					</div>
					
				</section>
        <!-- /Noticias --> 	

		<!-- Consejos -->
				<section class="sect-consejos">
					<div class="container">
						<div class="font-titulo"><p><font><strong>Consejos </strong></font></p></div>

							<div class="SabiasQue">
								<article>	
								
								<?php if ($list_cons): ?>
									<?php foreach ($list_cons as $cons): ?>
									<div>
									
										<?php if ($cons->getImgcons()): ?>
										<img  class="<?php echo $this->asset . "system/upload/" . $cons->getImgcons()[0]->getImagen(); ?>" height="110" /></a>
									
									</div>
									<div>
										<a href="<?php echo $this->url."Consejos/viewConsejos/".$cons->getIdConsejos()?>">
										<p><strong><?php echo $cons->getTitulo() ?></strong></p></a>
										
										<p><?php echo $cons->getDescripcion()?></p>
									
									<?php endif; ?>
									</div>
									<?php endforeach;?>	
		                      
										<?php else:?>
											   <li>No fueron registrados los consejos!</li>
										<?php endif; ?>
									
								</article>
								
								<div>
								<a class="btn3" href="<?php echo $this->url?>Consejos">Ver mas...</a>
								</div>
							
						<div class="contentc">
							
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="345" height="420" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

						</div>
						
					</div>
					

				</section>	
        <!-- /Consejos -->
		
	