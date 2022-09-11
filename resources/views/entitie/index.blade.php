@extends('app')

@section('content')
	<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section >
      
        <div class="card card-info">
          <div class="card-header">
            <h1 class="card-title pull-right">Entidades</h1>
            <button class="btn btn-primary btn-xs pull-left open_modal" model="entitie/" title="nuevo registro" action="create">Nuevo</button>
            <div class="clearfix"></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body master_list">
                @include('entitie.list',["entitie"=>$entitie])
          </div>
        </div>
        
        <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="modal-title" id="exampleModalLabel">Eliminar</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div id="modal-content" class="modal-body">
                        ¿ Desea Eliminar este registro ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-primary action">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
@endsection