@extends('layouts.appb')
@section('content')


<nav class="navbar navbar-light">
  <div class="container-fluid">
    <a href="{{ route('role.create') }}" class="btn btn-primary">Registrar perfil</a>
    <form class="d-flex" action="{{ route('role.search') }}" method="POST">
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
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <h4>Listado de perfiles</h4>
        <table class="table table-hover table-sm">
          <caption>Total de registros {{ $cant }} </caption>
          <thead class="table bg-primary text-white">
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <!-- <th>Permisos</th> -->
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $pos=1;
            ?>
            @forelse($roles as $role)
              <tr>
              <td class="align-middle"><?php print $pos++ ?></td>
              <td class="align-middle">{{ $role->name }}</td>
              <td class="align-middle">{{ $role->description }}</td>
              <!-- <td class="align-middle">{{ $role->permission }}</td> -->
              <td>
                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">Editar</a>
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
        {{ $roles->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
