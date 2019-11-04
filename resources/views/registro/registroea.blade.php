@extends('layout')
<link rel="stylesheet" href="/css/formReg.css">
<script src={{asset("js/jquery.js")}}></script>
<!--script src={{asset("js/cargadatos.js")}}></script-->



@section('contenido')
		<div id="form-r" style="width: 75%; margin: 20px auto;">
			<br>
			<div style="padding-top: 20px;">
				<!--span class="chyron"><em><a href="{route('chofer')}}">&laquo; Volver</a></em></span-->
            </div><br>
			<hr>
			<input id='token' type='hidden' name='_token' value="{{csrf_token() }}">
			<form method="POST" action="almaelalto">
				{!! csrf_field() !!}
				
				
				<h1 class='titulo_lista' id='titulo_registro'>Registro de El Alto</h1>
				
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
								<td valign="top">Partido de Accion Nacional Boliviano</td>
								<td valign="top">VOTOS VALIDOS</td>
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
									<input type = 'text' name='presi_validos' placeholder='0' value="{{ old('presi_validos') }}">
									@if ($errors->has('presi_validos'))
										<div class='error'>{{$errors->first('presi_validos')}}</div>
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
				<h1 class='titulo_lista' id='titulo_registro'>Registro de Mesa Uninominal El Alto</h1>
				
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
								<td valign="top">Partido de Accion Nacional Boliviano</td>
								<td valign="top">VOTOS VALIDOS</td>
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
									<input type = 'text' name='unino_validos' placeholder='0' value="{{ old('unino_validos') }}">
									@if ($errors->has('unino_validos'))
										<div class='error'>{{$errors->first('unino_validos')}}</div>
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