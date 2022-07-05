@extends('layouts.appb')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body overflow-auto">
        <div class="form-row">
          <div class="form-group col-lg-3 col-md-4 -col-sm-6">
            <label for="idNumber">Ciudad y Fecha</label>
            <input class="form-control" value="" readonly>
          </div>
          <div class="form-group col-lg-3 col-md-4 -col-sm-6">
            <label for="phone">Cargo al que Aspira:</label>
            <input class="form-control" value="" readonly>
          </div>
          <div class="form-group col-lg-3 col-md-4 -col-sm-6">
            <label for="phone">Empresa:</label>
            <input class="form-control" value="" readonly>
          </div>
          <div class="form-group col-lg-3 col-md-4 -col-sm-6">
            <label for="phone">Hora:</label>
            <input class="form-control" value="" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 mt-3">
    <div class="card">
      <div class="card-body overflow-auto">
        <h4>INFORMACIÓN PERSONAL</h4>
        <hr>
        <form action="" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idNumber">Identificación</label>
              <input class="form-control" value="" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Número de contacto</label>
              <input type="" class="form-control" id="" value="" name="">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
