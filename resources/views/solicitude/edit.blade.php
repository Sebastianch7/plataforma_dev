@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Editar solicitud</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('solicitude.update', $solicitude[0]->id) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="name">Número de identificación*</label>
              <input type="text" class="form-control" value="{{ $solicitude[0]->idNumber }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="postulate">Cargo postulado*</label>
              <input type="mail" class="form-control" name="postulate" value="{{ $solicitude[0]->postulate }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="name">Nombres*</label>
              <input type="text" class="form-control" name="name" value="{{ $solicitude[0]->name }}">
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="lastname">Apellidos*</label>
              <input type="text" class="form-control" name="lastname" value="{{ $solicitude[0]->lastname }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="phone">Número de teléfono*</label>
              <input type="phone" class="form-control" name="phone" value="{{ $solicitude[0]->phone }}">
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="cellphone">Número de celular*</label>
              <input type="phone" class="form-control" name="cellphone" value="{{ $solicitude[0]->mobile }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="mail">Correo electrónico*</label>
              <input type="mail" class="form-control" name="mail" value="{{ $solicitude[0]->mail }}">
            </div>
            <div class="form-group col-md-6">
              <label for="address">Dirección de residencia*</label>
              <input type="text" class="form-control" name="address" value="{{ $solicitude[0]->address }}">
            </div>
          </div>
          @csrf
          @method('PUT')
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('solicitude.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
