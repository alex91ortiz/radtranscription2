<table class="table table-bordered">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>{{ $fecini." hasta ".$fecfin  }}</th>
		</tr>
		<tr>
			<th>Cantidad de estudios</th>
			<th>{{ $result['quantity'] }}</th>
		</tr>
		<tr>
			<th>Valor total</th>
			<th>{{ '$'.number_format($result['total']) }}</th>
		</tr>
	</thead>
</table>
@if(count($result["source"])>0)
<table class="table table-bordered example2">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Cantidad de estudios</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		@foreach($result["source"] as $item)
		<tr>
			<td>{{$item["date"] }}</td>
			<td align="center">{{$item["quantity"] }}</td>
			<td>{{'$'.number_format($item["value"]) }}</td>
		</tr>
		@endforeach
		<!--<tr>
			<td>Total general</td>
			<td>{{$result['quantity']}}</td>
			<td>{{$result['total'] }}</td>
		</tr>-->
	</tbody>
</table>
@endif