@extends('layouts.appb')
@section('content')


<div class="row justify-content-center">
  <div class="col-lg-6 col-md-12 mx-auto">
    <div class="card">
        <div class="card-header">
          <h1>Información de usuario</h1>
        </div>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
            <label for=""><b>Identificacíon</b></label>
            <p><i>{{ $user[0]->idNumber }}</i></p>
            <label for=""><b>Número de contacto</b></label>
            <p><i>{{ $user[0]->phone }}</i></p>
            <label for=""><b>Nombres</b></label>
            <p><i>{{ $user[0]->name }}</i></p>
            <label for=""><b>Apellidos</b></label>
            <p><i>{{ $user[0]->lastname }}</i></p>
            <label for=""><b>Email</b></label>
            <p><i>{{ $user[0]->email }}</i></p>
          </form>
        </div>
        <div class="card-footer">
            <a href="{{ route('user.edit',$user[0]->id) }}" class="btn btn-primary float-right">Actualizar información</a>
        </div>
      </div>      
    </div>
  </div>
@endsection
