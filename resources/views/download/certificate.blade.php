<html><head>
		<title>Laravel</title>
		<style type="text/css">
			td:{
				font-family: arial;
				font-size: 12pt
			}
			li{list-style-type: none}
            li:before{content: "-"}
            .body:{width: 70%;font-size: 14px;margin-top:80px;}
            .head:{width: 100%;font-size: 14px;}
            .page-break {
			    page-break-after: always;
			}
		</style>
	</head><body>
		<div class="container">     
			@foreach($results as $item)
			<div id="content" class="content">
					<table align="center" class="body"  width="50">
							<tr>
								<td colspan="4">
									<table class="head">
									<tr >
										<td width="10%"><b>FECHA:&nbsp;</b></td>
										<td width="10%">{{$item->formalitie->updates." ".$item->formalitie->time }}</td>
										<td width="10%"><b>CONS:&nbsp;</b></td>
										<td width="10%">{{ $item->id." A" }}</td>
									</tr>
									<tr>
										<td width="10%"><b>NOMBRE:&nbsp;</b></td>
										<td width="30%">{{ $item->formalitie->firstname. " ". $item->formalitie->lastname  }}</td>
										<td width="10%"><b>D.I:&nbsp;</b></td>
										<td width="10%">{{ $item->formalitie->dni }}</td>
									</tr>
									<tr>
										<td width="10%"><b>EXAMEN:&nbsp;</b></td>
										<td colspan="3" >{{ $item->exam }}</td>
									</tr>
									<tr>
										<td width="10%"><b>DIAGNOSTICO:&nbsp;</b></td>
										<td colspan="3">{{ $item->diagnostic }}</td>
									</tr>
									</table>
								</td>
							</tr>
						<tr><td  colspan="4" height="0" ><b>HALLAZGOS:&nbsp;</b></td></tr>
						<tr>
							<td colspan="4" valign="top" height="100"  >
								 <?php echo $item->findings; ?> 
							</td>
						</tr>
						<tr><td colspan="4"><b>OPINIÓN:&nbsp;</b></td></tr>
						<tr>
							<td colspan="4" >
									<?php echo  $item->oneoption; ?>
									<?php
										   echo $item->secondoption;
								 	?>
							 		<p ALIGN="justify" style="font-size:9pt;">
							 			El presente informe no constituye un diagnostico final . Este sera emitido por su
										medico tras la correlación de los hallazgos de este estudio de imagen con la historia
										clìnica integral y, si procedieran , control evolutivo y/o pruebas complementarias
										adicionales . En caso de discrepancia clinico-radiologica , se aconseja reevaluación de
										las imágenes tras indicar el problema clinico
							 		</p>
							 </td>
						</tr>						
						<tr><td colspan="4"  > Atentamente,</td></tr>
						<tr>
							<td colspan="4">
								<img src='{{ "data:image/png;base64,". $item->specialist->firma }}' width="150" height="100" >
							</td>
						</tr>
						<tr><td colspan="4"> {{ $item->specialist->name }}</td></tr>
						<tr><td colspan="4"> {{ $item->specialist->specialty }}</td></tr>
						<tr><td colspan="4"> {{ $item->specialist->rm }}</td></tr>
					</table>
					<div class="page-break"></div>
			</div>
			@endforeach
		</div>
</body></html>
