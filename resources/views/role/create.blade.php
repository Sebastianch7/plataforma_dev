@extends('layouts.appb')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
      <div class="card-header">
        <h1>Registrar perfil</h1>
      </div>
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              - {{ $error }}<br>
            @endforeach
          </div>
        @endif
        <form action="{{ route('role.store' ) }}" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group col-md-12">
              <label for="description">Descripción</label>
              <textarea type="text" class="form-control" name="description">{{old('description')}}</textarea>
            </div>
          </div>
          <!-- <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Permisos</label>
              <input type="text" class="form-control" name="permission">
            </div>
          </div> -->
          @csrf
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
            <a class="btn btn-secondary" href="{{ route('role.index') }}">Cancelar</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
