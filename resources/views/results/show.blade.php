<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/results/'.$results->id) }}"
          data-model='results'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Examen: {{ $results->exam }} </p>
        </div>
        <div class="form-group">
          <p>Diagnostico: {{ $results->diagnostic }}</p>
        </div>
        <div class="form-group">
          <p>Hallazgo: {{ $results->findings }}</p>
        </div>
        <div class="form-group">
           <p>Opcion1 : {{ $results->oneoption }}</p>
        </div>
        <div class="form-group">
           <p>Opcion2: {{ $results->secondoption }}</p>
        </div>
        <div class="form-group">
          <p>Fecha: {{ $results->date }}</p>
        </div>
        <div class="form-group">
          <p>Especialista: {{ $results->user->name }}</p>
        </div>
      </div>
</form>