<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/specialist') : url('/specialist/'.$specialist->id)) }}"
          data-model='specialist'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $specialist->name }}" name="name" data-validation="required"  class="form-control input-sm" id="input" 
            placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Profesion</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $specialist->specialty }}" name="specialty" data-validation="required"  class="form-control input-sm" id="input" 
            placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">RM</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $specialist->rm }}" name="rm" data-validation="required"  class="form-control input-sm" id="input" 
            placeholder="Nombre">
          </div>
        </div>
      </div>
</form>