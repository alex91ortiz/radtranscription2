<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/word/'.$word->id) }}"
          data-model='word'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombre: {{ $word->name }} </p>
        </div>
        <div class="form-group">
          <p>Descripci&oacute;n: {{ $word->description }} </p>
        </div>
        
      </div>
</form>