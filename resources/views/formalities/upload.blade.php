<form class="form-horizontal" accept-charset="UTF-8" 
          method="POST" 
          action="{{  url('/formalities/import') }}"
          data-model='formalities'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="card-body">
          <div class="form-group row">
            <label for="input" class="col-md-3  form-label">Entidades</label>
            <div class="col-sm-6">
            
              <select class="select2 selectreturns" id="entitie_id" id="entitie" model="typeexam" action="find" obj="typeexam" name="entitie_id" data-validation="required"  style="width: 100%;">
                <option value="" >-- Seleccione --</option>
                @foreach($entitie as $item)
                  <option value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
                
              </select>
          </div>
          <div class="form-group ">
            <div class="form-group row">
              <div class="col-sm-10"><input type='file' name="file" ></div>
              <div class="col-sm-2">
                <div class="spinner-border loader hiden" id="loader" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
        
            <div class="form-group">
                <div class="col-sm-10"><button type="button" class="btn btn-primary upload">Upload</button></div>
            </div>
          </div>
          
      </div>
</form>