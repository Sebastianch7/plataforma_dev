@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Registrar solicitud</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('solicitude.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="name">Nombres*</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="lastname">Apellidos*</label>
              <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="typeDocument">Tipo de identificación*</label>
              <select class="form-control" name="typeDocument" value="{{ old('typeDocument') }}">
                @forelse($typesDocument as $typeDocument)
                <option value="{{ $typeDocument->id }}">{{ $typeDocument->name }}</option>
                @empty
                <option>No se encontraron tipos de documento</option>
                @endforelse
              </select>
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="idNumber">Número de identificación*</label>
              <input type="phone" class="form-control" name="idNumber" value="{{ old('idNumber') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="phone">Número de teléfono*</label>
              <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="cellphone">Número de celular*</label>
              <input type="phone" class="form-control" name="cellphone" value="{{ old('cellphone') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="departament">Departamento*</label>
              <select class="form-control" id="departament" name="departament">
                <option>Seleccione...</option>
                @forelse($departaments as $departament)
                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
                @empty
                <option>No se encontraron ciudades</option>
                @endforelse
              </select>
            </div>
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
              <label for="city">Ciudad de residencia*</label>
              <select class="form-control" id="city" name="city">
                <option>Seleccione...</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="mail">Correo electrónico*</label>
              <input type="mail" class="form-control" name="mail" value="{{ old('mail') }}">
            </div>
            <div class="form-group col-md-6">
              <label for="address">Dirección de residencia*</label>
              <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="postulate">Cargo postulado*</label>
              <input type="mail" class="form-control" name="postulate" value="{{ old('postulate') }}">
            </div>
            <div class="form-group col-md-6">
              <label for="role">Servicio</label>
              <select class="form-control" name="service" value="{{ old('service') }}">
                <option>Seleccione...</option>
                @forelse($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                <option>No se encontraron servicios</option>
                @endforelse
              </select>
            </div>
          </div>
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('solicitude.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
