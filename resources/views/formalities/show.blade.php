<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/formalities/'.$formalities->id) }}"
          data-model='formalities'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombres: {{ $formalities->firstname }} </p>
        </div>
        <div class="form-group">
          <p>Apellidos: {{ $formalities->lastname }}</p>
        </div>
        <div class="form-group">
          <p>Cedula: {{ $formalities->dni }}</p>
        </div>
        <div class="form-group">
           <p>Genero : @if($formalities->gender=="M") Masculino @elseif($formalities->gender=="F") Femenino @else Otro @endif</p>
        </div>
        <div class="form-group">
          <p>Fecha: {{ $formalities->date }}</p>
        </div>
        <div class="form-group">
          <p>Auditoria: {{ $formalities->updates }}</p>
        </div>
      </div>
</form>