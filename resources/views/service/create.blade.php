@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Registrar servicio</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          - {{ $error }}<br>
          @endforeach
        </div>
        @endif
        <form action="{{ route('service.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="description">Descripción <small>(200 caractéres maximo)</small></label>
              <textarea class="form-control" name="description" maxlength="200"></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
                <label for="price">Precio</label>
                <input type="phone" class="form-control" name="price">
            </div>
          </div>
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
          <a class="btn btn-secondary" href="{{ route('service.index') }}">Cancelar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
