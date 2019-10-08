@extends('layout')
<link rel="stylesheet" href="/css/formReg.css">
<script src={{asset("js/jquery.js")}}></script>
<!--script src={{asset("js/cargadatos.js")}}></script-->


<script type="text/javascript" language="javascript">

	function cargarmuni(valor, response)
	{
		var prov = document.getElementById("muni");
		document.getElementById("muni").options.length=0;
		var opcion = document.createElement('option');
		opcion.value = 0;
		opcion.text = 'Selec...';
		prov.add(opcion);
		if(valor==0)
		{
			// desactivamos el segundo select
			document.getElementById("muni").disabled=true;
		}else{
			
			$.ajax({
				type: "POST",
				url : '/datos',
				dataType: "json",
				data: {
					_token: $('#token').val(),
					dat: valor,
					tipo: 'prov'
				},
				success: function( data ) {
					data.forEach(function (element){
						var opcion = document.createElement('option');
						opcion.value = element.recinto_municipio;
						opcion.text = element.recinto_municipio;
						prov.add(opcion);
					});
				}
			});
			document.getElementById("muni").disabled=false;
		}
	}
	function cargarasien(valor, response){
		var prov = document.getElementById("asiento");
		document.getElementById("asiento").options.length=0;
		var opcion = document.createElement('option');
		opcion.value = 0;
		opcion.text = 'Selec...';
		prov.add(opcion);
		if(valor==0)
		{
			// desactivamos el segundo select
			document.getElementById("asiento").disabled=true;
		}else{
			
			$.ajax({
				type: "POST",
				url : '/datos',
				dataType: "json",
				data: {
					_token: $('#token').val(),
					dat: valor,
					tipo: 'muni'
				},
				success: function( data ) {
					data.forEach(function (element){
						var opcion = document.createElement('option');
						opcion.value = element.recinto_asiento_elec;
						opcion.text = element.recinto_asiento_elec;
						prov.add(opcion);
					});
				}
			});
			document.getElementById("asiento").disabled=false;
		}
	}
	function cargarrecinto(valor, response){
		var prov = document.getElementById("recinto");
		document.getElementById("recinto").options.length=0;
		var opcion = document.createElement('option');
		opcion.value = 0;
		opcion.text = 'Selec...';
		prov.add(opcion);
		if(valor==0)
		{
			// desactivamos el segundo select
			
			document.getElementById("recinto").disabled=true;
		}else{
			
			$.ajax({
				type: "POST",
				url : '/datos',
				dataType: "json",
				data: {
					_token: $('#token').val(),
					dat: valor,
					tipo: 'asien'
				},
				success: function( data ) {
					data.forEach(function (element){
						var opcion = document.createElement('option');
						opcion.value = element.recinto_nombre;
						opcion.text = element.recinto_nombre;
						prov.add(opcion);
					});
				}
			});
			document.getElementById("recinto").disabled=false;
		}
	}
	function recintoid(valor, response){
		if(valor!=0){
			
			$.ajax({
				type: "POST",
				url : '/datos',
				dataType: "json",
				data: {
					_token: $('#token').val(),
					dat: valor,
					tipo: 'recinto'
				},
				success: function( data ) {
					data.forEach(function (element){
						console.log (element.recinto_id);
						$('#idrecint').val(element.recinto_id);
					});
				}
			});
			document.getElementById("recinto").disabled=false;
		}
	}
	
</script>
@section('contenido')
		<div id="form-r" style="width: 75%; margin: 20px auto;">
			<br>
			<div style="padding-top: 20px;">
				<!--span class="chyron"><em><a href="{route('chofer')}}">&laquo; Volver</a></em></span-->
            </div><br>
			<hr>
			<input id='token' type='hidden' name='_token' value="{{csrf_token() }}">
			<form method="POST" action="almacenar">
				{!! csrf_field() !!}
				<div>
					<DIV style="display: inline; width: 20%;">
						<label>PROVINCIA</label>
						<select id='prov' name='prov' style="width: 90px;" onchange = 'cargarmuni(this.value);'>
							<option value='0'>Selec...</option>";
							@foreach($rec as $reci)
								<option value='{{$reci}}'>{{$reci}}</option>";
							@endforeach
						</select>
					</DIV>
					<div style="display: inline; width: 20%;">
						<label>MUNICIPIO</label>
						<select id='muni' name='muni' style="width: 90px;" onchange = 'cargarasien(this.value);' disabled >
							<option value='0'>Selec...</option>";
						</select>
					</DIV>
					<div style="display: inline; width: 20%;">
						<label>ASIENTO ELECTORAL</label>
						<select id='asiento' name='asiento' style="width: 90px;" onchange = 'cargarrecinto(this.value);' disabled>
							<option value='0'>Selec...</option>";
						</select>
					</DIV>
					<div style="display: inline; width: 20%;">
						<label>RECINTO</label>
						<select id='recinto' name='recinto' style="width: 90px;" onchange = 'recintoid(this.value);' disabled>
							<option value='0'>Selec...</option>";
						</select>
					</DIV>
					<div style="display: inline; width: 20%;">
						<label>Nº DE MESA</label>
						<input type = 'text' id='nmesa' name='nmesa' placeholder='0' style="width: 20px;" value="{{old('nmesa') }}">
						@if ($errors->has('nmesa'))
							<div class='error'>{{$errors->first('nmesa')}}</div>
						@endif
					</DIV>
					
				</div>
				<input id='idrecint' type='hidden' name='idrecint' value="">
				@if ($errors->has('idrecint'))
					<div class='error'>{{$errors->first('idrecint')}}</div>
				@endif
				<br>
				<h1 class='titulo_lista' id='titulo_registro'>Registro de Mesa Presidente</h1>
				
				<div id="form-reg" >
					<!--div style=" width: 100%; height: auto; margin: 0 auto; float:left;"--->
						<table>
							<tr>
								<td valign="top">Comunidad Ciudadana</td>
								<td valign="top">Unidad Civica Solidaria</td>
								<td valign="top">Partido Democrata Cristiano</td>
								<td valign="top">Frente Para la victoria</td>
								<td valign="top">Movimiento al Socialismo-Instrumento Politico por la Soberania de los Pueblos</td>
								<td valign="top">Movimiento Nacionalista Revolucionario</td>
								<td valign="top">Movimiento Tercer Sistena</td>
								<td valign="top">Bolivia Dice no</td>
								<td valign="top">partido de Accion Nacional Boliviano</td>
								<td valign="top">Nulo</td>
								<td valign="top">Blanco</td>
							</tr>
							<tr>
								<td>
									<input type = 'text' name='presi_cc' placeholder='0' value="{{old('presi_cc') }}">
									@if ($errors->has('presi_cc'))
										<div class='error'>{{$errors->first('presi_cc')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_ucs' placeholder='0' value="{{ old('presi_ucs') }}">
									@if ($errors->has('presi_ucs'))
										<div class='error'>{{$errors->first('presi_ucs')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_pdc' placeholder='0' value="{{ old('presi_pdc') }}">
									@if ($errors->has('presi_pdc'))
										<div class='error'>{{$errors->first('presi_pdc')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_fpv' placeholder='0' value="{{old('presi_fpv') }}">
									@if ($errors->has('presi_fpv'))
										<div class='error'>{{$errors->first('presi_fpv')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_mas' placeholder='0' value="{{ old('presi_mas') }}">
									@if ($errors->has('presi_mas'))
										<div class='error'>{{$errors->first('presi_mas')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_mnr' placeholder='0' value="{{ old('presi_mnr') }}">
									@if ($errors->has('presi_mnr'))
										<div class='error'>{{$errors->first('presi_mnr')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_mts' placeholder='0' value="{{old('presi_mts') }}">
									@if ($errors->has('presi_mts'))
										<div class='error'>{{$errors->first('presi_mts')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_bdn' placeholder='0' value="{{ old('presi_bdn') }}">
									@if ($errors->has('presi_bdn'))
										<div class='error'>{{$errors->first('presi_bdn')}}</div>
									@endif	
								</td>
								<td>
									<input type = 'text' name='presi_pan' placeholder='0' value="{{ old('presi_pan') }}">
									@if ($errors->has('presi_pan'))
										<div class='error'>{{$errors->first('presi_pan')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='presi_nu' placeholder='0' value="{{ old('presi_nu') }}">
									@if ($errors->has('presi_nu'))
										<div class='error'>{{$errors->first('presi_nu')}}</div>
									@endif	
								</td>
								<td>
									<input type = 'text' name='presi_blan' placeholder='0' value="{{ old('presi_blan') }}">
									@if ($errors->has('presi_blan'))
										<div class='error'>{{$errors->first('presi_blan')}}</div>
									@endif
								</td>
							</tr>
						</table>
						
						
					<!--/div--->
					
				</div>
				<br>
				<h1 class='titulo_lista' id='titulo_registro'>Registro de Mesa Uninominal</h1>
				
				<div id="form-reg" >
						<table>
							<tr>
								<td valign="top">Comunidad Ciudadana</td>
								<td valign="top">Unidad Civica Solidaria</td>
								<td valign="top">Partido Democrata Cristiano</td>
								<td valign="top">Frente Para la victoria</td>
								<td valign="top">Movimiento al Socialismo-Instrumento Politico por la Soberania de los Pueblos</td>
								<td valign="top">Movimiento Nacionalista Revolucionario</td>
								<td valign="top">Movimiento Tercer Sistena</td>
								<td valign="top">Bolivia Dice no</td>
								<td valign="top">partido de Accion Nacional Boliviano</td>
								<td valign="top">Nulos</td>
								<td valign="top">Blancos</td>
							</tr>
							<tr>
								<td>
									<input type = 'text' name='unino_cc' placeholder='0' value="{{old('unino_cc') }}">
									@if ($errors->has('unino_cc'))
										<div class='error'>{{$errors->first('unino_cc')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_ucs' placeholder='0' value="{{ old('unino_ucs') }}">
									@if ($errors->has('unino_ucs'))
										<div class='error'>{{$errors->first('unino_ucs')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_pdc' placeholder='0' value="{{ old('unino_pdc') }}">
									@if ($errors->has('unino_pdc'))
										<div class='error'>{{$errors->first('unino_pdc')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_fpv' placeholder='0' value="{{old('unino_fpv') }}">
									@if ($errors->has('unino_fpv'))
										<div class='error'>{{$errors->first('unino_fpv')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_mas' placeholder='0' value="{{ old('unino_mas') }}">
									@if ($errors->has('unino_mas'))
										<div class='error'>{{$errors->first('unino_mas')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_mnr' placeholder='0' value="{{ old('unino_mnr') }}">
									@if ($errors->has('unino_mnr'))
										<div class='error'>{{$errors->first('unino_mnr')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_mts' placeholder='0' value="{{old('unino_mts') }}">
									@if ($errors->has('unino_mts'))
										<div class='error'>{{$errors->first('unino_mts')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_bdn' placeholder='0' value="{{ old('unino_bdn') }}">
									@if ($errors->has('unino_bdn'))
										<div class='error'>{{$errors->first('unino_bdn')}}</div>
									@endif	
								</td>
								<td>
									<input type = 'text' name='unino_pan' placeholder='0' value="{{ old('unino_pan') }}">
									@if ($errors->has('unino_pan'))
										<div class='error'>{{$errors->first('unino_pan')}}</div>
									@endif
								</td>
								<td>
									<input type = 'text' name='unino_nul' placeholder='0' value="{{ old('unino_nul') }}">
									@if ($errors->has('unino_nul'))
										<div class='error'>{{$errors->first('unino_nul')}}</div>
									@endif	
								</td>
								<td>
									<input type = 'text' name='unino_blan' placeholder='0' value="{{ old('unino_blan') }}">
									@if ($errors->has('unino_blan'))
										<div class='error'>{{$errors->first('unino_blan')}}</div>
									@endif
								</td>
							</tr>
						</table>
					
				</div>
				<div id="form-gua"  style=" width: 100%; height: auto; margin: 10px auto; float:left;">
						<input type = 'submit' name='guardar' id='subir' value='GUARDAR'>
				</div>
			</form>
		</div>
@endsection