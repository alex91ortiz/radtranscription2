@extends('app')

@section('content')
	<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section >
      <div>
      <!-- Nav tabs -->
          <div class="row">
             <div class="col-lg-6 col-lg-offset-1">
             <form class="form-horizontal" accept-charset="UTF-8" 
                        method="POST" 
                        action="{{ url('/pregeneratezip') }}"
                        data-model='exams'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group row">
                        <label for="input" class="col-md-2  control-label">Periodo</label>
                        <div class="col-sm-3">
                          
                          <input  type="text"  
                                model="report" 
                                name="fecini" class="form-control  datepicker " 
                                id="fecinim" 
                                placeholder="Fecha Inicial">
                          
                        </div>
                        <div class="col-sm-3">
                          <input  type="text"  
                                model="report" 
                                types="1"
                                action=""  
                                name="fecfinm" class="form-control  datepicker " 
                                id="fecfin" 
                                placeholder="Fecha Final">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit"  types="1"  format="PDF"
                                      model="pregeneratezip" 
                                      action="" 
                                      class="btn btn-danger">Generar PDF
                            </button>
                        </div>
                      </div>
                </form>
                @if(count($reportzip)>0)
                  <div class="list-group">
                  @foreach($reportzip as $item)
                    <a href="{{url('/generatezip?ini='.$item['ini'].'&fin='.$item['fin'].'&fecini='.$fecini.'&fecfinm='.$fecfinm)}}" class="list-group-item">
                      <img src="{{asset('/img/file-zip-alt.png')}}" height="50">
                      {{ $item['ini']."-".$item['fin']}}
                    </a>
                  @endforeach
                  </div>
                @else
                  <p> No se han encontrado fases </p>
                @endif
              </div>
          </div>
      </div>
    </section>

    <!-- /.content -->
@endsection