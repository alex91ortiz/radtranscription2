
@if($result["source"])
<table align="center"   style="border-collapse: collapse;font-family: 'Arial';font-size: 12px;" width="400">

		<tr tyle="border: 1px solid black;">
			<th width="90%" colspan="6">
				<table style="width:100%" align="center">
					

						<tr>
							<td>Fecha</td>
							<td>{{ $fecini  }}</td>
						</tr>
						<tr>
							<td>Cantidad de estudios</td>
							<td>{{ $result['quantity'] }}</td>
							<td rowspan="2">{{Auth::user()->companie->description}}</td>
							<td rowspan="2">
								  @if(Auth::user()->companie)
								<img src="{{ 'data:image/png;base64,'.Auth::user()->companie->logo }}" width="50" height="50" >
								
								@endif
							 </td>
						</tr>
						<tr>
							<td>Valor total</td>
							<td>{{ '$'.number_format($result['total']) }}</td>

						</tr>
				
					
				</table>
			</th>
		</tr>
		<tr >
			<th style="border: 1px solid black;">Entidad</th>
			<th style="border: 1px solid black;">Examen</th>
			<th style="border: 1px solid black;">Id</th>
			<th style="border: 1px solid black;">Nombre</th>
			<th style="border: 1px solid black;">Cantidad de estudios</th>
			<th style="border: 1px solid black;">Total</th>
		</tr>
	

		@foreach($result["source"] as $item)
		
		<tr>

			<td>{{($item->entitie)?$item->entitie->name:'' }}</td>
			<td>{{$item->exam }}</td>
			<td>{{$item->dni }}</td>
			<td>{{$item->firstname.' '.$item->lastname }}</td>
			<td>{{ ($item->comparative)?'2':'1' }}</td>
			<td>{{'$'.number_format($item->value) }}</td>
		</tr>
		@endforeach

</table>
@endif