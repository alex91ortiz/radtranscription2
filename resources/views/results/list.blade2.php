@if($results->count())
<table id="example2" class="table table-bordered table-hover example2">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Fecha</th>
      <th>Cedula</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Examen</th>
      
      
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($results as $item)
       <tr>
          <td>{{ $item->id }}</td>                          
          <td>{{ $item->date}}</td>
          <td>{{ ($item->formalitie) ? $item->formalitie->dni : ""}}</td>
          <td>{{ ($item->formalitie) ? $item->formalitie->firstname : ""}}</td>
          <td>{{ ($item->formalitie) ? $item->formalitie->lastname : ""}}</td>
          <td>{{ $item->exam}}</td>

          <td>
            @if(Auth::user()->role!=3)
            <button class="btn btn-primary btn-xs open_modal" 
                    model="results/" 
                    title="Modificar registro" 
                    alter="ckedit"
                    action="{{ $item->id.'/edit' }}" >
                    <i class="fa  fa-edit fa-fw"></i>
            </button>
            
            <button class="btn btn-primary btn-xs open_modal" 
                    model="results/" 
                    title="Eliminar registro"
                    action="{{ $item->id }}" >
                    <i class="fa  fa-remove fa-fw"></i>
            </button>
            @endif
            <a href="{{ url('results/certificate/'.$item->id) }}" class="btn btn-xs btn-danger">C</a>
          </td>
       </tr>
    @endforeach
  </tbody>
</table>
@else
  <p> No se han encontrado fases </p>
@endif