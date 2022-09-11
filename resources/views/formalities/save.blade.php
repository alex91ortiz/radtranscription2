<form  class="forms-sample" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/formalities') : url('/formalities/'.$formalities->id)) }}"
          jresponse='true'
          data-model='formalities'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation" ><button class="nav-link active" data-target="#formalities" data-toggle="tab"  class="active" aria-controls="formalities" type="button" role="tab" data-toggle="tab">General</button ></li>
           @if(isset($results))<li role="presentation" ><button  class="nav-link" data-target="#results" data-toggle="tab" aria-controls="results" role="tab" type="button" data-toggle="tab">* Resultados</button ></li>@endif
       
           </ul>
        
        <div class="tab-content card">
          <div role="tabpanel " class="tab-pane fade  show active" id="formalities">
            <div class="card-body">
            <div class="form-group row">
              <label for="input" class="col-sm-2 form-label">Nombres</label>
              <div class="col-sm-6">
                <input type="text" value="{{ $formalities->firstname }}" data-validation="required"  name="firstname" class="form-control  " id="input" 
                placeholder="Nombres">
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-2 form-label">Apellidos</label>
              <div class="col-sm-6">
                <input type="text" value="{{ $formalities->lastname }}" data-validation="required"  name="lastname" class="form-control  " id="input" 
                placeholder="Apellidos">
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-2 form-label">Cedula</label>
              <div class="col-sm-6">
                <input type="text" value="{{ $formalities->dni }}" data-validation="required"  name="dni" class="form-control  " id="input" 
                placeholder="Cedula">
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-2 form-label">Genero</label>
              <div class="col-sm-6">
                <select class="select2" style="width: 100%;" data-validation="required"  name="gender">
                  <option value="M" @if($formalities->gender=="M") selected="true" @endif >Masculino</option>
                  <option value="F" @if($formalities->gender=="F") selected="true" @endif >Femenino</option>
                  <option value="O" @if($formalities->gender=="O") selected="true" @endif >Otro</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-2 form-label">Fecha</label>
              <div class="col-sm-6">
                <input type="text" value="{{ $formalities->date }}" name="date" class="form-control   datepicker" id="input" 
                placeholder="Fecha">
              </div>
            </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="results">
          @if(isset($results))
          
            <div class="form-group row">
            
              <label for="input" class="col-sm-3 form-label" >Examen</label>
              
              <div class="col-sm-6">
                <input type="text" data-validation="required" model="exams" action="find"  value=""  class="form-control   typeahead" name="exam" id="input" 
                placeholder="Diagnostico">
                <input type="hidden" id="exams" name="exam_id">
              </div>
              <button type="button" class="btn  btn-primary col-sm-1 typeaheadAsign"><i class="fa fa-refresh fa-fw"></i></button>
            
            </div>
           <!--<div class="form-group row">
              <label for="input" class="col-sm-3 form-label">Examen</label>
              <div class="col-sm-6">
                <select class="select2" onchange="asignresults(this)" model="exams" data-validation="required"  action="find" name="exam_id" style="width: 100%;">
                  <option value="" >-- Seleccione --</option>
                  @foreach($exams as $item)
                    <option value="{{ $item->id }}" @if($item->id==$results->exam_id) selected="true" @endif >{{ $item->name }}</option>
                  @endforeach
                  
                </select>
              </div>
            </div>-->
            <div class="form-group row">
              <label for="input" class="col-md-3  form-label">Especialista</label>
              <div class="col-sm-6">
                <select class="select2" name="specialist_id" data-validation="required"  style="width: 100%;">
                  <option value="" >-- Seleccione --</option>
                  @foreach($specialist as $item)
                    <option value="{{ $item->id }}" @if($item->id==$results->specialist_id) selected="true"  @endif>{{ $item->name }}</option>
                  @endforeach
                  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-md-3  form-label">Entidades</label>
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
              <label for="input" class="col-md-3  form-label">Tipo examen</label>
              <div class="col-sm-6">
                <select class="select2" name="typeexam_id" id="typeexam" data-validation="required"  style="width: 100%;">
                  <option value="" >-- Seleccione --</option>
                  @foreach($typeexam as $item)
                    <option value="{{ $item->id }}" @if($item->id==$results->typeexam_id) selected="true" @endif>{{ $item->name }}</option>
                  @endforeach
                  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-3 form-label" >Diagnostico</label>
              <div class="col-sm-8">
                <input type="text" data-validation="required"  value="{{ $results->diagnostic }}" 
                id="diagnostic" name="diagnostic" class="form-control  " 
                placeholder="Diagnostico">
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-3 form-label">Hallazgo</label>
              <div class="col-sm-8">
                <textarea id="findings" data-validation="required"  name="findings" cols="150" rows="7"  class="form-control ">{{ $results->findings }}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-3 form-label">Opcion1</label>
              <div class="col-sm-8">
                <textarea name="oneoption"  id="oneoption" cols="150" rows="7" class="form-control ">{{ $results->oneoption }}
                </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="input" class="col-sm-3 form-label">Opcion2</label>
              <div class="col-sm-8">
                <textarea name="secondoption" id="secondoption" cols="150" rows="7" class="form-control ">{{ $results->secondoption }}
                </textarea>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="input" class="col-sm-3 form-label">Comparativo</label>
              <div class="col-sm-2">
                <input type="checkbox" id="comparative" name="comparative"   class="form-control  " @if($results->comparative) checked @endif>
              </div>
            </div>
          </div>
          @endif
        </div>
</form>