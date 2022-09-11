<form class="form-horizontal" accept-charset="UTF-8" 
          method="{{ (($action=='create')?'POST':'PUT') }}" 
          action="{{ (($action=='create')? url('/users') : url('/users/'.$users->id)) }}"
          data-model='users'>
          
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-body">
          <div class="form-group">
            <label class="col-md-3 control-label">Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control" data-validation="required"  name="name" value="{{ $users->name }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">E-Mail Address</label>
            <div class="col-md-6">
              <input type="email" class="form-control" data-validation="required"  name="email" value="{{ $users->email }}">
            </div>
          </div>

          <div class="form-group">
            <label for="input" class="col-md-3  control-label">Compañia</label>
            <div class="col-sm-6">
              <select class="select2" data-validation="required"  name="companie_id" style="width: 100%;">
                <option value="" >-- Seleccione --</option>
                @foreach($companies as $item)
                  <option value="{{ $item->id }}" @if($item->id==$users->companie_id) selected="true" @endif>{{ $item->description }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="input" class="col-md-3  control-label">Entidades</label>
            <div class="col-sm-6">
              <select class="select2" name="entitie_id" style="width: 100%;">
                <option value="" >-- Seleccione --</option>
                @foreach($entities as $item)
                  <option value="{{ $item->id }}" @if($item->id==$users->clients) selected="true" @endif>{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="input" class="col-md-3  control-label">Rol</label>
            <div class="col-sm-6">
              <select class="select2" data-validation="required"  name="role" style="width: 100%;">
                <option value="" >-- Seleccione --</option>
                <option value="1" @if($users->role==1) selected="true" @endif>Administrador</option>
                <option value="2" @if($users->role==2) selected="true" @endif>Usuario</option>
                <option value="3" @if($users->role==3) selected="true" @endif>Cliente</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label">Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Confirm Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password_confirmation">
            </div>
          </div>
          
      </div>
</form>