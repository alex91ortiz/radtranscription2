<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/specialist/'.$specialist->id) }}"
          data-model='specialist'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombre: {{ $specialist->name }} </p>
        </div>
        <div class="form-group">
          <p>Profesion: {{ $specialist->specialty }} </p>
        </div>
        <div class="form-group">
          <p>Rm: {{ $specialist->rm }} </p>
        </div>
      </div>
</form>