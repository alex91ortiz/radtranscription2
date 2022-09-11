<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/results') : url('/results/'.$results->id)) }}"
          data-model='results'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body col-sm-12">
        <div class="form-group row">
          <label for="input" class="col-sm-3 control-label">Paciente</label>
          <div class="col-sm-6">
              <p>{{ $formalitie->firstname.' '.$formalitie->lastname }}</p>
              <p>{{ $formalitie->dni}}</p>
          </div>
        </div>
        <div class="form-group row">
          <label for="input" class="col-sm-3 control-label" >Examen</label>
          <div class="col-sm-7">
            <input type="text" data-validation="required" model="exams" action="find"  value="{{ $results->exam}}"  class="form-control input-sm typeahead" name="exam" id="input" 
            placeholder="Diagnostico">
            <input type="hidden" id="exams" name="exam_id">
          </div>
          <button type="button" class="btn  btn-primary col-sm-1 typeaheadAsign"><i class="fa fa-refresh fa-fw"></i></button>
        </div>
        <div class="form-group row">
          <label for="input" class="col-md-3  control-label">Especialista</label>
          <div class="col-sm-6">
            <select class="select2" name="specialist_id" data-validation="required"  style="width: 100%;">
              <option value="" >-- Seleccione --</option>
              @foreach($specialist as $item)
                <option value="{{ $item->id }}" @if($item->id==$results->specialist_id) selected="true" @endif>{{ $item->name }}</option>
              @endforeach
              
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="input" class="col-md-3  control-label">Entidades</label>
          <div class="col-sm-6">
            <select class="select2 selectreturns" id="entitie_id" id="entitie" model="typeexam" action="find" obj="typeexam" name="entitie_id" data-validation="required"  style="width: 100%;">
              <option value="" >-- Seleccione --</option>
              @foreach($entitie as $item)
                <option value="{{ $item->id }}" @if($item->id==$results->entitie_id) selected="true" @else @if($item->id==intval(Auth::user()->clients)) selected="true" @endif @endif>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="button" action="{{url('/client/favorite/'.Auth::user()->id)}}" class="btn  btn-warning col-sm-1 favorite"><i class="fa fa-star fa-fw"></i></button>
        </div>
        <div class="form-group row">
          <label for="input" class="col-md-3  control-label">Tipo examen</label>
          <div class="col-sm-6">
            <select class="select2" name="typeexam_id"  data-validation="required" id="typeexam"  style="width: 100%;">
              <option value="" >-- Seleccione --</option>
              @foreach($typeexam as $item)
                <option value="{{ $item->id }}" @if($item->id==$results->typeexam_id) selected="true"  @endif>{{ $item->name }}</option>
              @endforeach
              
            </select>
          </div>
          
        </div>
        <div class="form-group row">
          <label for="input" class="col-sm-3 control-label" >Diagnostico</label>
          <div class="col-sm-8">
            <input type="text" data-validation="required"  value="{{ $results->diagnostic }}" 
            id="diagnostic" name="diagnostic" class="form-control input-sm" 
            placeholder="Diagnostico">
          </div>
        </div>
        <div class="form-group row">
          <label for="input" class="col-sm-3 control-label">Hallazgo</label>
          <div class="col-sm-8">
            <textarea id="findings" data-validation="required"  cols="150" rows="7"  class="form-control">{{ $results->findings }}</textarea>
          </div>
        </div>

         <div class="form-group row">
            <label for="input" class="col-sm-3 control-label">Opcion1</label>
            <div class="col-sm-8">
              <textarea  id="oneoption" cols="150" rows="7" class="form-control">{{ $results->oneoption }}
              </textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 control-label">Opcion2</label>
            <div class="col-sm-8">
              <textarea  id="secondoption" cols="150" rows="7" class="form-control">{{ $results->secondoption }}
              </textarea>
            </div>
          </div>
          <div class="form-group row">
              <label for="input" class="col-sm-3 control-label">Comparativo</label>
              <div class="col-sm-2">
                <input type="checkbox"   value="1" id="comparative" name="comparative"   class="form-control input-sm" @if($results->comparative) checked @endif>
              </div>
          </div>
        <input type="hidden" value="{{ $results->formalitie_id }}" id="formalitie_id" name="formalitie_id">
      </div>
</form>