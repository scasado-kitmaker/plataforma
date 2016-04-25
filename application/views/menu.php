<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">       
	<!--Estilos-->
	<link href='http://localhost/blog/public/assets/css/style.css' rel='stylesheet' type='text/css' />
	<!--Scripts-->
	<script src="http://localhost/plataforma/public/assets/js/toastr.js"></script>	
	<script type="text/javascript" src="http://localhost/plataforma/public/assets/js/moment.js"></script>
	<script type="text/javascript" src="http://localhost/plataforma/public/assets/js/jquery.cookiebar.js"></script> 
	<script type="text/javascript"> 
		$(document).ready(function()
		{
			$.cookieBar();
		});
	</script>
</head>
<body>
	<div id="header">		
		<img  src="http://localhost/blog/public/assets/images/header2.png">
	</div>

	<!--Menu principal y codigo para resaltar el boton de la página donde estamos-->
	<div class="show_entries">
		<div class="menuBotones"> 

			<ul>
				<?php
				$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				$varVerde1=' ';
				$varVerde2=' ';
				$varVerde3=' ';
				$varVerde4=' ';
				$varVerde5=' ';
				
				//vista login
				if ($actual_link =='http://localhost/plataforma/index.php/users/login/') {
					$varVerde1='principal';
				}else{
					$varVerde1=' ';

				}
				//vista alta
				if ($actual_link =='http://localhost/plataforma/index.php/plataforma/alta/') {
					$varVerde2='principal';
				}else{
					$varVerde2=' ';

				}
				//vista baja
				if ($actual_link =='http://localhost/plataforma/index.php/plataforma/baja/') {
					$varVerde3='principal';
				}else{
					$varVerde3=' ';

				}
				//vista about
				if ($actual_link =='http://localhost/plataforma/index.php/plataforma/about/') {
					$varVerde4='principal';
				}else{
					$varVerde4=' ';

				}
				?>
				<li>					
					<?php
					//echo anchor(base_url().'index.php/plataforma/login/',' Login ');

					if ($this->session->userdata('is_logged_in'))		

						echo anchor(base_url().'index.php/users/logout/','Hola, '.$this->session->userdata('username'). ' logout ');
					
					else		
						echo anchor(base_url().'index.php/users/login/',' Login ','class="'.$varVerde1.'"');

					?>
				</li>

				<!--Si se esta dado de alta en el servicio-->
				<li>	
				
				<?php $resultado= $saldo;?>
				<?php echo $resultado?>

					<?php if ($saldo > '0') : ?>

						<?php echo anchor(base_url().'index.php/plataforma/alta/',' Alta1 ','class="'.$varVerde2.'"');?>
					<?php else : ?>
						<?php echo anchor(base_url().'index.php/plataforma/aviso_saldo/',' Alta2 ','class="'.$varVerde2.'"');?>
					<?php endif; ?>

					<?php 

					//if($saldo->saldo>0)
					//{
						
					//}
					//else
					//{
						
					//}
					?>
					<!--Si se tiene saldo-->					
					<?php
					//echo anchor(base_url().'index.php/plataforma/alta/',' Alta ','class="'.$varVerde2.'"');
					?>
					<!--Si no se tiene saldo-->
					<?php
					//echo anchor(base_url().'index.php/plataforma/aviso_saldo/',' Alta ','class="'.$varVerde2.'"');
					?>
				</li>
				<!--Si NO se esta dado de alta en el servicio-->
				<li>
					<?php
					echo anchor(base_url().'index.php/plataforma/baja/',' Baja ','class="'.$varVerde3.'"');
					?>
				</li>

				<li>
					<?php
					echo anchor(base_url().'index.php/plataforma/about/',' About ','class="'.$varVerde4.'"');
					?>
				</li>

				<!-- LI DE TEST-->
				<li>
					<?php
					//echo anchor(base_url().'index.php/plataforma/aviso_saldo/',' aviso_saldo ');
					?>
				</li>
				<li>
					<?php
					//echo anchor(base_url().'index.php/plataforma/logs/',' logs ');
					?>
				</li>

			</ul>	
		</div>
		<hr class="style13"/>
	</div>
</body>
</body>