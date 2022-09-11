@if($formalities && $formalities->count())
<table id="formalitie" class="table table-bordered table-hover example2 ">
  <thead>
    <tr>
      <th>Resultado</th>
      <th>Codigo</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Cedula</th>
      <th>Genero</th>
      <th>Fecha </th>
      <th>Hora </th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($formalities as $item)
       <tr id="{{$item->id}}" class="{{($item->result)?'success':''}}">
          <td>
          
          @if(!$item->result)
          <button class="btn btn-primary btn-xs open_modal" 
                    model="/results/" 
                    title="Modificar registro" 
                    alter="ckedit"
                    id="{{'btn'.$item->id}}"
                    action="{{ 'create?formalitie_id='.$item->id }}" >
                    Gestionar
            </button>
          @endif
          </td> 
          <td>{{ $item->id }}</td>                          
          <td>{{ $item->firstname}}</td>
          <td>{{ $item->lastname}}</td>
          <td>{{ $item->dni}}</td>
          <td>{{ $item->gender}}</td>
          <td>{{ $item->updates}}</td>
          <td>{{ $item->time}}</td>
          <td>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="formalities/" 
                    title="Modificar registro" 
                    action="{{ $item->id.'/edit' }}" >
                    <i class="fa  fa-edit fa-fw"></i>
            </button>
            <button class="btn btn-primary btn-xs open_modal" 
                    model="formalities/" 
                    title="Eliminar registro"
                    action="{{ $item->id }}" >
                    <i class="fa  fa-remove fa-fw"></i>
            </button>
            @if($item->result)
            <button class="btn btn-warning btn-xs open_modal" 
                    model="/results/" 
                    title="Modificar registro" 
                    alter="ckedit"
                    id="{{'btn2'.$item->id}}"
                    action="{{ 'create?formalitie_id='.$item->id }}" >
                    <i class="fa  fa-repeat"></i>
            </button>
            @endif
            <button class="btn btn-warning btn-xs open_modal" 
                    model="/results/" 
                    title="Modificar registro" 
                    alter="ckedit"
                    style="display:none" 
                    id="{{'btn2'.$item->id}}"
                    action="{{ 'create?formalitie_id='.$item->id }}" >
                    <i class="fa  fa-repeat"></i>
            </button>
          </td>
       </tr>
    @endforeach
  </tbody>
</table>
@else
  <p> No se han encontrado fases </p>
@endif