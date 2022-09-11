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
			html:{
				padding: 0 !important;
			}
			table:{
				padding: 0px !important;
			}
			@page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: auto; 
            }
			main {
				padding-top: 100px;
			}
		</style>
	</head><body>
		<header>
			<table class="head" width="100%">
				<tr >
					<td width="10%"><b>FECHA:&nbsp;</b></td>
					<td width="10%">{{$results->formalitie->updates." ".$results->formalitie->time }}</td>
					<td width="10%"><b>CONS:&nbsp;</b></td>
					<td width="10%">{{ $results->id." A" }}</td>
				</tr>
				<tr>
					<td width="10%"><b>NOMBRE:&nbsp;</b></td>
					<td width="30%">{{ $results->formalitie->firstname. " ". $results->formalitie->lastname  }}</td>
					<td width="10%"><b>D.I:&nbsp;</b></td>
					<td width="10%">{{ $results->formalitie->dni }}</td>
				</tr>
				<tr>
					<td width="10%"><b>EXAMEN:&nbsp;</b></td>
					<td colspan="3" >{{ $results->exam }}</td>
				</tr>
				<tr>
					<td width="10%"><b>DIAGNOSTICO:&nbsp;</b></td>
					<td colspan="3">{{ $results->diagnostic }}</td>
				</tr>
			</table>
        </header>
		<main>
		<div id="content" class="content">
					<table align="center" class="body"  >
							<tr>
								<td colspan="4" width="100%">

								</td>
							</tr>
						<tr><td  colspan="4" height="0" ><b>HALLAZGOS:&nbsp;</b></td></tr>
						<tr>
							<td  colspan="4" valign="top"   >
								 <p ><?php echo str_replace('</p>',"",str_replace('<p ALIGN="justify">',"",$results->findings)); ?></p>
							</td>
						</tr>
						<tr><td colspan="4"><b>OPINIÓN:&nbsp;</b></td></tr>
						<tr>
							<td colspan="4" >
									<?php echo  $results->oneoption; ?>
									<?php
										echo $results->secondoption;
								 	?>
							 		<p ALIGN="justify" >
							 			El presente informe no constituye un diagnostico final . Este sera emitido por su
										medico tras la correlación de los hallazgos de este estudio de imagen con la historia
										clìnica integral y, si procedieran , control evolutivo y/o pruebas complementarias
										adicionales . En caso de discrepancia clinico-radiologica , se aconseja reevaluación de
										las imágenes tras indicar el problema clinico
							 		</p>
							 </td>
						</tr>						
						
					</table>
			</div>
        </main>
			<!---->
		
		<footer>
            <table>
				<tr><td colspan="4"  > Atentamente,</td></tr>
				<tr>
					<td colspan="4">
						<img src='{{ "data:image/png;base64,". $results->specialist->firma }}' width="150" height="100" >
					</td>
				</tr>
				<tr><td colspan="4"> {{ $results->specialist->name }}</td></tr>
				<tr><td colspan="4"> {{ $results->specialist->specialty }}</td></tr>
				<tr><td colspan="4"> {{ $results->specialist->rm }}</td></tr>
			</table>
        </footer>
</body></html>
