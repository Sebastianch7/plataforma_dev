@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Editar usuario</h1>
      </div>
      <div class="card-body">

        <form action="{{ route('user.updateuser', $users) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idNumber">Identificación</label>
              <input class="form-control" value="{{ $users->idNumber }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Número de contacto</label>
              <input type="phone" class="form-control" id="phone" value="{{ $users->phone }}" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nombres</label>
              <input type="text" class="form-control" id="name" value="{{ $users->name }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Apellidos</label>
              <input type="text" class="form-control" id="lastname" value="{{ $users->lastname }}" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">email</label>
              <input type="email" class="form-control" id="email" value="{{ $users->email }}" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Estado</label>
              <select type="email" class="form-control" id="state" value="{{ $users->state }}" name="state" required>
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
          <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
@endsection
