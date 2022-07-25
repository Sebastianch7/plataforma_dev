@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Registrar usuario</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('user.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="idNumber">Identificación</label>
              <input type="phone" class="form-control" name="idNumber">
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Número de contacto</label>
              <input type="phone" class="form-control" name="phone">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nombres</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Apellidos</label>
              <input type="text" class="form-control" name="lastname">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="email">email</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="role">Empresa</label>
              <select type="text" class="form-control" name="company">
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="role">Perfil</label>
              <select type="text" class="form-control" name="role">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('user.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
