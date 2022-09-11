<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/companie/'.$companie->id) }}"
          data-model='companie'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Descripci&oacute;n: {{ $companie->description }} </p>
        </div>
        
      </div>
</form>