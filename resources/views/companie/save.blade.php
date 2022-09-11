<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/companie') : url('/companie/'.$companie->id)) }}"
          data-model='companie'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Descripci&oacute;n</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $companie->description }}"  data-validation="required"  name="description" class="form-control input-sm" id="input" 
            placeholder="Descripci&oacute;n">
          </div>
        </div>
      </div>
</form>