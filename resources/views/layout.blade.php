<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ELECCION</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="/images/logo.ico">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" >
        <link rel="stylesheet" href="/css/formulario.css">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link rel="stylesheet" type="text/css" href="/css/inicio.css">
        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
        <link rel="stylesheet" href="/css/runnable.css" />
        <link rel="stylesheet" href="/css/dropzone.css" />
        <script src={{asset("js/jquery.js")}}></script>
        <script src={{asset("js/jquery.min.js")}}></script>
        <script src="/js/scripts.js"></script>
        <script src={{asset("js/jquery-ui.js")}}></script>
        <script src="/js/jquery.media.js"></script>
        <script src="/js/dropzone.js"></script>
        <!--<script src="/js/infupload.js"></script>-->
    </head>
    <body>
        <div style="height: 100%;">
			<header>
				<div id="cabecera">
					<div id='hoy' style="top:100px; right: 18px; color:#494949; position:relative; float:right; font-family: 'Arial';"><?php //echo $this->layout()->nomUser; ?><br><?php echo date('d/m/Y');?></div>
				</div>
			</header>
			<main>
				<div id="contenido">
					<div id="cuerpo">
						@yield('contenido')
					</div>
					<div id="costado">
						<div class="">
							<div id="titulo"><h2>COMPUTO<BR>2019<br>MENÚ</h2></div>
						
							<!--div class="tarjeta tfacebook">
								<a class="fa-upload" href="/ININCIO">INICIO</a>
							</div-->
							<div class="tarjeta tgoogle">
								<a class="fa-sun-o" href="/registro/nuevo">REGISTROS</a>
							</div>
							<div class="tarjeta ttwitter">
								<a class="fa-outdent" href="/registro/resultados">SEGUIMIENTO</a>
							</div>
							<div class="tarjeta tlinkedin">
								<a class="fa-lock" href="/">Reportes</a>
							</div>
						</div>
					</div>
				</div>
			</main>
			<footer>
				<div id='footer'>
					<table id="foot">
						<tr>
							<td width="28%">
								<div id="advise">
									<!--img src='/images/escudo_blanco.png' width='100' style="float:left;"/--->Ministerio de Desarrollo Rural y Tierras
								</div>
							</td>
							<td width="44%">
								<div id='f_titulo'>Derechos Reservados <a href="http://www.ruralytierras.gob.bo/" title="MDRyT" target="blank" style="color:#F7AE36;">MINISTERIO DE DESARROLLO RURAL Y TIERRAS</a> <br>Area de Parque Automotor<br>Desarrollado por: Área de Sistemas<br>La Paz - <?php echo date('Y') ?></div>
							</td>
							<td width="28%">
								<div id="mess">
									Navegadores recomendados: <br>Mozilla Firefox | Google Chrome<br>Resolución recomendada: 1360x768 o superior<!--br>Descargar <a href="/MANUAL.pdf" target="blank" style="color:#F7AE36;">MANUAL</a-->
								</div>
							</td>
						</tr>
					</table>
				</div>
			</footer>
		</div>
    </body>
    
</html>