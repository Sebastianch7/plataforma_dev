@extends('layouts.appb')
@section('content')


<nav class="navbar navbar-light">
  <div class="container-fluid">
    <a href="{{ route('user.create') }}" class="btn btn-primary">Registrar usuario</a>
    <form class="d-flex" action="{{ route('user.search') }}" method="POST">
      @csrf
      <input class="form-control" name="data" type="search" placeholder="Consultar" aria-label="Search">
      <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  </div>
</nav>

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body overflow-auto">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <h4>Listado de usuarios</h4>
        <table class="table table-hover table-sm">
          <caption>Total de registros {{ $cant }} </caption>
          <thead class="table bg-primary text-white">
            <tr>
              <th>#</th>
              <th>Cédula</th>
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Compañia</th>
              <th>Correo</th>
              <th>Perfil</th>
              <!-- <th>password</th> -->
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $pos=1;
            ?>
            @forelse($users as $user)
            @if($user->state == 2)
            <tr class="table-danger">
              @else
              <tr>
              @endif
              <td class="align-middle"><?php print $pos++ ?></td>
              <td class="align-middle">{{ $user->idNumber }}</td>
              <td class="align-middle">{{ $user->name }} {{ $user->lastname }}</td>
              <td class="align-middle">{{ $user->phone }}</td>
              <td class="align-middle">{{ $user->company }}</td>
              <td class="align-middle">{{ $user->email }}</td>
              <td class="align-middle">{{ $user->role }}</td>
              <td>
                <a href="{{ route('user.edituser', $user->id) }}" class="btn btn-primary">Editar</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6"></td>
              <td>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mx-auto text-center">
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
