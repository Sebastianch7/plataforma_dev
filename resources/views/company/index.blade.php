@extends('layouts.appb')
@section('content')


<nav class="navbar navbar-light">
  <div class="container-fluid">
    <a href="{{ route('company.create') }}" class="btn btn-primary">Registrar cliente</a>
    <form class="d-flex" action="{{ route('company.search') }}" method="POST">
      @csrf
      <input class="form-control" name="data" type="search" placeholder="Consultar" aria-label="Search">
      <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  </div>
</nav>

<div class="row justify-content-center">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
      <div class="card-body overflow-auto">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <h4>Listado de clientes</h4>
        <table class="table table-hover table-sm">
          <caption>Total de registros {{ $cant }} </caption>
          <thead class="table bg-primary text-white">
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $pos=1;
            ?>
            @forelse($companies as $company)
              <tr>
              <td class="align-middle"><?php print $pos++ ?></td>
              <td class="align-middle">{{ $company->name }}</td>
              <td class="align-middle">{{ $company->phone }}</td>
              <td class="align-middle">{{ $company->address }}</td>
              <td>
                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary">Editar</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4">No se encontraron registros.</td>
              <td>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mx-auto text-center">
        {{ $companies->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
