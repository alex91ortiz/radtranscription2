<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/exams/'.$exams->id) }}"
          data-model='exams'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombre: {{ $exams->name }} </p>
        </div>
        <div class="form-group">
          <p>Descripci&oacute;n: {{ $exams->description }}</p>
        </div>
        <div class="form-group">
          <p>Opcion1: {{ $exams->oneoption }}</p>
        </div>
        <div class="form-group">
          <p>Opcion2: {{ $exams->secondoption }}</p>
        </div>
      </div>
</form>