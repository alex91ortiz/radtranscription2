<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/entitie/'.$entitie->id) }}"
          data-model='entitie'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombre: {{ $entitie->name }} </p>
        </div>
        
      </div>
</form>