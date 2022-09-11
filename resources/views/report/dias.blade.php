<table class="table table-bordered" >
	<thead>
		<tr>
			<th>Fecha</th>
			<th>{{ $fecini }}</th>
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
@if($result["source"])
<table class="table table-bordered example2">
	<thead>
		<tr>
			<th>Entidad</th>
			<th>Examen</th>
			<th>Id</th>
			<th>Nombre</th>
			<th>Cantidad de estudios</th>
			<th>Total</th>
		</tr>
	
	</thead>
	<tbody>
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
		<!--<tr>
			<td>Total general</td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td>{{$result['quantity']}}</td>
			<td>{{$result['total'] }}</td>
		</tr>-->
	</tbody>
</table>
@endif