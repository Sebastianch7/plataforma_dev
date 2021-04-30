@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Registrar cliente</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          - {{ $error }}<br>
          @endforeach
        </div>
        @endif
        <form action="{{ route('company.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="phone">Teléfono</label>
              <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
          </div>
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
          <a class="btn btn-secondary" href="{{ route('company.index') }}">Cancelar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
