<table align="center"  style="border: 1 solid '#FFF666'; font-size: 12px;font-family: 'Arial'" width="400">

		<tr>
			<td>Fecha</td>
			<td>{{ $fecini." hasta ".$fecfin   }}</td>
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
@if(count($result["source"])>0)
<table align="center"  style="border: 1 solid '#FFF666'; font-size: 12px;font-family: 'Arial'" width="400">
	
		<tr>
			<th style="border: 1px solid black;">Fecha</th>
			<th style="border: 1px solid black;">Cantidad de estudios</th>
			<th style="border: 1px solid black;">Total</th>
		</tr>
	
		@foreach($result["source"] as $item)
		<tr>
			<td>{{$item["date"] }}</td>
			<td align="center">{{$item["quantity"] }}</td>
			<td>{{'$'.number_format($item["value"]) }}</td>
		</tr>
		@endforeach

</table>
@endif