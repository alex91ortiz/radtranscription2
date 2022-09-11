<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/exams') : url('/exams/'.$exams->id)) }}"
          data-model='exams'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-6">
            <input type="text" value="{{ $exams->name }}" data-validation="required"  name="name" class="form-control input-sm" id="input" 
            placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Descripci&oacute;n</label>
          <div class="col-sm-8">
            <textarea id="findings" cols="40" rows="5" class="form-control">{{ $exams->description }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label" >Diagnostico</label>
          <div class="col-sm-8">
            <input type="text" data-validation="required"  value="{{ $exams->diagnostic }}" id="diagnostic" name="diagnostic" class="form-control input-sm" id="input" 
            placeholder="Diagnostico">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Opcion1</label>
          <div class="col-sm-8">
            <textarea  id="oneoption" cols="40" rows="5" class="form-control">{{ $exams->oneoption }}
            </textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Opcion2</label>
          <div class="col-sm-8">
            <textarea  id="secondoption" cols="40" rows="5" class="form-control">{{ $exams->secondoption }}
            </textarea>
          </div>
        </div>
        
      </div>
</form>