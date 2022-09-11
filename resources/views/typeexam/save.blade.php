<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/typeexam') : url('/typeexam/'.$typeexam->id)) }}"
          data-model='typeexam'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $typeexam->name }}" data-validation="required"  name="name" class="form-control input-sm" id="input" 
            placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Valor</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $typeexam->value }}" data-validation="required"  name="value" class="form-control input-sm" id="input" 
            placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-md-2  control-label">Entidades</label>
          <div class="col-sm-6">
            <select class="select2" name="entitie_id" data-validation="required"  style="width: 100%;">
              <option value="" >-- Seleccione --</option>
              @foreach($entitie as $item)
                <option value="{{ $item->id }}" @if($item->id==$typeexam->entitie_id) selected="true" @endif>{{ $item->name }}</option>
              @endforeach
              
            </select>
          </div>
          
        </div>
      </div>
</form>