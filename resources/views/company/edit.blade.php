@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Editar cliente</h1>
      </div>
      <div class="card-body">
      	@if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          - {{ $error }}<br>
          @endforeach
        </div>
        @endif
        <form action="{{ route('company.update', $company->id) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value=" {{$company->name }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="phone">Teléfono</label>
              <input type="phone" class="form-control" name="phone" value="{{$company->phone }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-10">
              <label for="address">Dirección</label>
              <input type="phone" class="form-control" name="address" value="{{$company->address }}" required>
            </div>
          
            <div class="form-group col-md-2">
              <label for="state">Estado</label>
              <select class="form-control" id="state" value="{{ $company->state }}" name="state" required>
              @foreach($states as $state)
              <option value="{{ $state->id }}">{{ $state->name }}</option>
              @endforeach
            </select>
            </div>
          </div>
          @csrf
          @method('PUT')
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
          <a class="btn btn-secondary" href="{{ route('company.index') }}">Cancelar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
