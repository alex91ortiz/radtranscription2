@extends('app')

@section('content')
<!-- Content Header (Page header) -->

<!-- Main content -->
<section>
  <div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#mes" aria-controls="mes" role="tab" data-toggle="tab">Mes</a></li>
      <li role="presentation"><a href="#dias" aria-controls="dias" role="tab" data-toggle="tab">Dias</a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div role="tabpanel" class="tab-pane  active" id="mes">
        <br>
        <div class="row">
          <div class="col-lg-12 col-lg-offset-1">
            <div class="form-group row">
              <div class="col-sm-3">
                <select class="select2 typeexamreport" model="report" action="" types="1" name="typeexam_id" id="typeexam_id1" data-validation="required">
                  <option value="">-- Seleccione --</option>
                  @foreach($typeexam as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach

                </select>
              </div>
              <div class="col-sm-3">
                <input type="text" model="report" name="fecini" class="form-control input-sm datepicker " id="fecinim" placeholder="Fecha Inicial">
              </div>
              <div class="col-sm-3">
                <input type="text" model="report" types="1" action="" name="fecfinm" class="form-control input-sm datepicker selectAction" id="fecfin" placeholder="Fecha Final">
              </div>
              <div class="col-sm-3">
                <button type="button" types="1" format="PDF" model="report/" action="D" class="btn btn-xs btn-danger selectDowloand">PDF
                </button>
                <button type="button" types="1" format="EXCEL" model="report/" action="D" class="btn btn-xs btn-success selectDowloand">EXCEL
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <div id="select-content1"></div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="dias">
        <br>
        <div class="row">
          <div class="col-lg-12 col-lg-offset-1">
            <div class="form-group">
              <div class="col-sm-3">
                <select class="select2 typeexamreport" model="report" action="" types="1" name="typeexam_id" id="typeexam_id2" data-validation="required">
                  <option value="">-- Seleccione --</option>
                  @foreach($typeexam as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach

                </select>
              </div>
              <label for="input" class="col-md-2  control-label">Fecha</label>
              <div class="col-sm-3">
                <input type="text" model="report" types="2" format="I" action="" name="fecini" class="form-control input-sm datepicker selectAction" id="fecinid" placeholder="Fecha Inicial">
              </div>
              <div class="col-sm-3">
                <button type="button" types="2" format="PDF" model="report/" action="D" class="btn btn-xs btn-danger selectDowloand">PDF
                </button>
                <button type="button" types="2" format="EXCEL" model="report/" action="D" class="btn btn-xs btn-success selectDowloand">EXCEL
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <div id="select-content2"></div>
          </div>
        </div>
      </div>
    </div>

  </div>


</section>

<!-- /.content -->
@endsection