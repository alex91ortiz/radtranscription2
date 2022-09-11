@if($specialist->count())
<table id="example2" class="table table-bordered table-hover example2">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Profesion</th>
      <th>Rm</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($specialist as $item)
       <tr>
          <td>{{ $item->id }}</td>                          
          <td>{{ $item->name}}</td>
          <td>{{ $item->specialty}}</td>
          <td>{{ $item->rm}}</td>
          <td>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="specialist/" 
                    title="Modificar registro" 
                    action="{{ $item->id.'/edit' }}" >
                    <i class="fa  fa-edit fa-fw"></i>
            </button>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="specialist/" 
                    title="Eliminar registro"
                    action="{{ $item->id }}" >
                    <i class="fa  fa-remove fa-fw"></i>
            </button>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="specialist/uploadshow/"
                    title="Firma registro"
                    file="1"
                    action="{{ $item->id }}" >
                    Firma
            </button>
          </td>
       </tr>
    @endforeach
  </tbody>
</table>
@else
  <p> No se han encontrado fases </p>
@endif