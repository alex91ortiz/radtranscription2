<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/typeexam/'.$typeexam->id) }}"
          data-model='typeexam'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombre: {{ $typeexam->name }} </p>
        </div>
        <div class="form-group">
          <p>Valor: {{ $typeexam->value }} </p>
        </div>
        
      </div>
</form>