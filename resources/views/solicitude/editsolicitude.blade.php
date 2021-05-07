@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Asignar solicitud</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('solicitude.update', $solicitude->id) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="name">Número de identificación*</label>
              <input type="text" class="form-control" value="{{ $solicitude->idNumber }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="rpostulate">Cargo postulado*</label>
              <input type="mail" class="form-control" name="rpostulate" value="{{ $solicitude->postulate }}" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="rname">Nombres*</label>
              <input type="text" class="form-control" name="rname" value="{{ $solicitude->name }}" readonly>
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="rlastname">Apellidos*</label>
              <input type="text" class="form-control" name="rlastname" value="{{ $solicitude->lastname }}" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="rphone">Número de teléfono*</label>
              <input type="phone" class="form-control" name="rphone" value="{{ $solicitude->phone }}" readonly>
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="rcellphone">Número de celular*</label>
              <input type="phone" class="form-control" name="rcellphone" value="{{ $solicitude->mobile }}" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="rmail">Correo electrónico*</label>
              <input type="mail" class="form-control" name="rmail" value="{{ $solicitude->mail }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="raddress">Dirección de residencia*</label>
              <input type="text" class="form-control" name="raddress" value="{{ $solicitude->address }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="idState">Estado*</label>
              <select type="text" class="form-control" name="idState">
                @foreach($states as $state)
                  <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @csrf
          @method('PUT')
          <div class="float-right">
            <button type="submit" class="btn btn-primary" onclick="confirm('¿Desea modificar los datos en pantalla?')">Aceptar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('solicitude.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
