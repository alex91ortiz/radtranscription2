<form class="form-horizontal" accept-charset="UTF-8" 
          method="DELETE" 
          action="{{ url('/users/'.$users->id) }}"
          data-model='users'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
        <div class="form-group">
          <p>Nombre de usuario: {{ $users->name }} </p>
        </div>
        <div class="form-group">
          <p>Email: {{ $users->email }}</p>
        </div>
        <div class="form-group">
          <p>compañia: {{ $users->companie->description }}</p>
        </div>
        
        <div class="form-group">
           <p>Rol : @if($users->role==1) Administrador @else Usuario @endif</p>
        </div>

        <div class="form-group">
           <p>Fecha creacion : {{ $users->created_at }}</p>
        </div>

      </div>
</form>