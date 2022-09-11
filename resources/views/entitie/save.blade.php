<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/entitie') : url('/entitie/'.$entitie->id)) }}"
          data-model='entitie'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="card-body">
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-12">
            <input type="text" value="{{ $entitie->name }}"   autofocus name="name" class="form-control input-sm" id="input" 
            placeholder="Nombre" data-validation="required">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-12 control-label">Parametros para archivo de importaci&oacute;n</label>
          <div class="col-sm-12">
          <button id="addRow" type="button" class="btn btn-primary"  >Agregar nuevo campo</button>
          <table id="parameters" class="table" style="width:100%">
              <thead>
                  <tr>
                      <th>Encabezado</th>
                      <th>Posici&oacute;n</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                @foreach($entitie->fields->get() as $item)
                  <tr>
                      <td>
                      <select size="1" id="row-3-office" name="names[]">
                          <option value="Nombres" @if($item->name=="Nombres") selected="true" @endif>
                              Nombres
                          </option>
                          <option value="Apellidos" @if($item->name == "Apellidos") selected="true" @endif>
                              Apellidos
                          </option>
                          <option value="Cedula" @if($item->name=="Cedula") selected="true" @endif>
                              Cedula
                          </option>
                          <option value="Genero" @if($item->name=="Genero") selected="true" @endif>
                              Genero
                          </option>
                          <option value="Fecha" @if($item->name=="Fecha") selected="true" @endif>
                              Fecha
                          </option>
                          <option value="Hora" @if($item->name=="Hora") selected="true" @endif>
                              Hora
                          </option>
                          <option value="Nacimiento" @if($item->name=="Nacimiento") selected="true" @endif>
                              Nacimiento
                          </option>
                      </select>

                      </td>                          
                      <td><input type="number" id="row-3-age" name="positions[]" value="{{ $item->position}}"></td>
                      <td><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          </div>
        </div>
      </div>
</form>