@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Editar mis datos</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          - {{ $error }}<br>
          @endforeach
        </div>
        @endif
        <form action="{{ route('user.update', $users) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idNumber">Identificación</label>
              <input class="form-control" value="{{ $users->idNumber }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Número de contacto</label>
              <input type="phone" class="form-control" id="phone" value="{{ $users->phone }}" name="phone" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nombres</label>
              <input type="text" class="form-control" id="name" value="{{ $users->name }}" name="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Apellidos</label>
              <input type="text" class="form-control" id="lastname" value="{{ $users->lastname }}" name="lastname" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">email</label>
              <input type="email" class="form-control" id="email" value="{{ $users->email }}" name="email" required>
            </div>
          </div>
        @csrf
        @method('PUT')
        <div class="float-right">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('sideface') }}" class="btn btn-secondary">Cancelar</a>
        </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
@endsection
