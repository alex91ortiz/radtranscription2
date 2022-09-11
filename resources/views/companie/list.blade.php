@if($companie->count())
<table id="example2" class="table table-bordered table-hover example2">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Descripci&oacute;n</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($companie as $item)
       <tr>
          <td>{{ $item->id }}</td>                          
          <td>{{ $item->description}}</td>
          <td>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="companie/" 
                    title="Modificar registro" 
                    action="{{ $item->id.'/edit' }}" >
                    <i class="fa  fa-edit fa-fw"></i>
            </button>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="companie/" 
                    title="Eliminar registro"
                    action="{{ $item->id }}" >
                    <i class="fa  fa-remove fa-fw"></i>
            </button>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="companie/uploadshow/"
                    title="Logo registro"
                    file="1"
                    action="{{ $item->id }}" >
                    Logo
            </button>
          </td>
       </tr>
    @endforeach
  </tbody>
</table>
@else
  <p> No se han encontrado fases </p>
@endif