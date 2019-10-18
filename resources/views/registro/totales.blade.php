@extends('layout')
<script src={{asset("js/jquery.js")}}></script>
<script type="text/javascript" language="javascript" src="/js/listadofun.js"></script>
<script type="text/javascript" language="javascript" src="/js/menuflotante.js"></script>

<link rel="stylesheet" href='/css/global.css'>
<link rel="stylesheet" href='/css/listaProcesos.css'>
<link rel="stylesheet" href='/css/menuflotante.css'>

@section('contenido') 
		<br>
        <br>
		
        <br>
		<hr>
		
		
		 <div id='titulo-pantalla'>TOTALES PRESIDENTE</div>
		 <br>
		<div style="display: inline-block; width: 800px; margin: 5px; ">
			<table  id='listado' class='listado-proce' style="margin: 0 auto; width: 100% !important;">
				<thead>
					<tr>
						<th>CC</th>
						<th>UCS</th>
						<th>PDC</th>
						<th>FPV</th>
						<th>MAS-IPSP</th>
						<th>MNR</th>
						<th>MTS</th>
						<th>BDN</th>
						<th>PAN</th>
						<th>VALIDOS</th>
						<th>TOT. HAB.</th>
						<th>NULO</th>
						<th>BLANCO</th>
					</tr>
				</thead>
				<TBODY>
					<tr>
						<td><?php echo($Presidente[0]->trcc); ?></td>
						<td><?php echo $Presidente[0]->trucs; ?></td>
						<td><?php echo $Presidente[0]->trpdc; ?></td>
						<td><?php echo $Presidente[0]->trfpv; ?></td>
						<td><?php echo $Presidente[0]->trmas; ?></td>
						<td><?php echo $Presidente[0]->trmnr; ?></td>
						<td><?php echo $Presidente[0]->trmts; ?></td>
						<td><?php echo $Presidente[0]->trbdn; ?></td>
						<td><?php echo $Presidente[0]->trpan; ?></td>
						<td><?php echo "{$Presidente[0]->validos} - $porcen%"; ?></td>
						<td><?php echo $totalElectore; ?></td>
						<td><?php echo $Presidente[0]->trnulo; ?></td>
						<td><?php echo $Presidente[0]->trblan; ?></td>
						
					</tr>
				</TBODY>
			</table>
		</div>
		<br><br>
		<div id='titulo-pantalla'>TOTALES UNINOMINALES</div>
		 <br>
		<div id='jfloat' style="display: inline-block; width: 800px; margin: 5px; ">
			<table  id='listado' class='listado-proce' style="margin: 0 auto; width: 100% !important;">
				<thead>
					<tr>
						<th>CIRCUNS.</th>
						<th>CC</th>
						<th>UCS</th>
						<th>PDC</th>
						<th>FPV</th>
						<th>MAS-IPSP</th>
						<th>MNR</th>
						<th>MTS</th>
						<th>BDN</th>
						<th>PAN</th>
						<th>VALIDOS</th>
						<th>TOT. HAB.</th>
						<th>NULO</th>
						<th>BLANCO</th>
					</tr>
				</thead>
				<TBODY>
					<?php 
						$linea='';
						foreach ($circuns as $cir){
							$porcen= round(($cir->validosu/$habC[$cir->circu])*100, 2);
							$linea .="<tr>
								<td>$cir->circu</td>
								<td>$cir->trcc</td>
								<td>$cir->trucs</td>
								<td>$cir->trpdc</td>
								<td>$cir->trfpv</td>
								<td>$cir->trmas</td>
								<td>$cir->trmnr</td>
								<td>$cir->trmts</td>
								<td>$cir->trbdn</td>
								<td>$cir->trpan</td>
								<td>$cir->validosu - $porcen%</td>
								<td>{$habC[$cir->circu]}</td>
								<td>$cir->trnulo</td>
								<td>$cir->trblan</td>
							</tr>";
						}
						echo $linea;
					?>
				</TBODY>
			</table>
		</div>
		<br><br>
		
        <div id='titulo-pantalla'><?= e($titulo); ?></div>
		
        <div id="contenedor-proceso">
            <form method="POST">
				{!! csrf_field() !!}
                <div id='jfloat' style="display: inline-block; width: 800px; margin: 5px; ">
                    <!--<div style="float: left; margin: 5px; width: auto;">-->
                        <input type="hidden" name="id_usado" id="id_usado" value="" />
                        <!--<input id="jsearch" name="busca" type="text" value="{{$buscar}}" style="float: left;">
                        <button type='submit' id='buscar' class='jaction' name="buscar" style="float: left;" value='buscar'>BUSCAR</button>-->
                        <button type='submit' id='nuevo' class='jaction' name="nuevo" value='nuevo' style="float: left;">NUEVO</button>
                        <div style="float: left;">
                        <button id='editar' class='jaction' name='editar' disabled style='visibility:hidden; width:0;  height: 0; float: right;' value='editar'>EDITAR</button>
                        </div>
                </div>
                <div style="width: 100%; overflow: auto;">
                    <div style="width: 1250px;  display: inline-block;">
                        <table  id='listado' class='listado-proce' style="margin: 0 auto; width: 100% !important;">
                            <?php      
                                $pos = 0;
                                $encab = "";
                                $encab_header = "";
                                foreach($columnas AS $col){        
                                    $encab .= "<th ";
                                    $encab_header .= "<th ";
                                    if( isset($col['width']) ){
                                        $encab .= " width='".$col['width']."'";
                                        $encab_header .= " width='".$col['width']."'";
                                    }
                                    if( isset($col['t_id']) && strcmp(trim($col['t_id']), '')!=0 ){
                                        $encab .= " id='".$col['t_id']."'";
                                        $encab_header .= " id='".$col['t_id']."'";
                                    }
                                    if( (isset($col['t_class'])  && strcmp(trim($col['t_class']), '')!=0) || (isset($col['visible']) && $col['visible'] == false ) ){
                                        $encab_header .= " class='";
                                        $encab .= " class='";
                                        if( isset($col['visible']) ){
                                            $encab .= "no-mostrar ";
                                            $encab_header .= "no-mostrar ";
                                        }
                                        $encab .= $col['t_class']."'";
                                        $encab_header .= $col['t_class']."'";
                                    }            
                                    $id_marcado_asc= '';
                                    $id_marcado_desc= '';
                                    if( isset($this->num_ordenado) ){
                                        if ( $pos == $this->num_ordenado){
                                            if( strcmp ($this->orden, 'asc' ) == 0 ){
                                                $id_marcado_asc = "class='orden-marcado'";
                                            }else
                                                $id_marcado_desc = "class='orden-marcado'";
                                        }
                                    }             
                                    $dd = "><div class='titulo-tabla-orden'>";
                                    $dd.="</div><span>".$col['t_col']."</span>";
                                    $encab .= $dd."</th>";
                                    $encab_header .= $dd."<br></th>";
                                    $pos++;
                                }        
                            ?>
                            <thead>
                                <?php echo $encab_header; ?>
                            </thead>
                            <tbody>
                                <?php             
                                    $col = 0;
									foreach($total AS $dato){
                                        $col++;
                                        if( $col % 2 == 0 ){
                                            $class=' class="fila-par"';
                                        }else{
                                            $class=' class="fila-impar"';
                                        }
                                        $linea = "<tr $class'>";
                                        //foreach ($columnas AS $columna){ 
											$linea .= "<td valign='top' class='no-mostrar'>{$dato->total_id}</td>";
											$linea .= "<td valign='top'>{$dato->recin->recin->recinto_provincia}</td>";
											$linea .= "<td valign='top'>{$dato->recin->recin->recinto_municipio}</td>";
											$linea .= "<td valign='top'>{$dato->recin->recin->recinto_asiento_elec}</td>";
											$linea .= "<td valign='top'>{$dato->recin->recin->recinto_nombre}</td>";
											$linea .= "<td valign='top'>{$dato->recin->recin->recinto_circ}</td>";
											$linea .= "<td valign='top'>{$dato->nmesa}</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_cc}<br>
												Unin.: {$dato->unino_cc}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_ucs}<br>
												Unin.: {$dato->unino_ucs}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_pdc}<br>
												Unin.: {$dato->unino_pdc}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_fpv}<br>
												Unin.: {$dato->unino_fpv}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_mas}<br>
												Unin.: {$dato->unino_mas}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_mnr}<br>
												Unin.: {$dato->unino_mnr}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_mts}<br>
												Unin.: {$dato->unino_mts}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_bdn}<br>
												Unin.: {$dato->unino_bdn}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_pan}<br>
												Unin.: {$dato->unino_pan}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_nulo}<br>
												Unin.: {$dato->unino_nulo}
											</td>";
											$linea .= "<td valign='top'>
												Presi.: {$dato->presi_blan}<br>
												Unin.: {$dato->unino_blan}
											</td>";
                                           
										//}  
										$linea .= "</tr>";
                                        echo $linea;
                                    }
                                ?>
								
                            </tbody>
                            <tfoot>
                                <?php echo $encab; ?>
                            </tfoot>
                        </table>
						<div class='paginacion'>
							<?php echo $total->links(); ?>
						</div>
                    </div>
                </div>
                <!--input type="hidden" name="num_ordenado" value='<php echo $num_ordenado; ?>'/>
                <input type="hidden" name="orden" value='<php echo $this->orden; ?>'/-->
                <!--input type="hidden" name="pagina" value='<php echo $pagina; ?>'/>    
                <input type="hidden" name="cuantos" value='<php echo $cuantos; ?>'/>
                <input type="hidden" name="paginas" value='<php echo $paginas; ?>'/>
                <!--div style="width: 900px;  display: inline-block;">
                    <php  if ($pagina > 1){?>
                    <button name='anterior' class='jaction' >Anterior</button>
                    <php } 
                        if($pagina < $paginas){
                    ?>
                    <button name='siguiente' class='jaction' >Siguiente</button>
                    <php }?>
                </div-->
            </form>

        </div>
@endsection