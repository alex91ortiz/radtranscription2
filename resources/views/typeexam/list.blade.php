@if($typeexam->count())
<table id="example2" class="table table-bordered table-hover example2">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Entidades</th>
      <th>Valor</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($typeexam as $item)
       <tr>
          <td>{{ $item->id }}</td>                          
          <td>{{ $item->name}}</td>
          <td>{{ (($item->entitie)?$item->entitie->name:"")}}</td>
          <td>{{ $item->value}}</td>
          <td>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="typeexam/" 
                    title="Modificar registro" 
                    action="{{ $item->id.'/edit' }}" >
                    <i class="fa  fa-edit fa-fw"></i>
            </button>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="typeexam/" 
                    title="Eliminar registro"
                    action="{{ $item->id }}" >
                    <i class="fa  fa-remove fa-fw"></i>
            </button>
            
          </td>
       </tr>
    @endforeach
  </tbody>
</table>
@else
  <p> No se han encontrado fases </p>
@endif