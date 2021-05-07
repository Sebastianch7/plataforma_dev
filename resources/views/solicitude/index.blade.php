@extends('layouts.appb')
@section('content')


<nav class="navbar navbar-light">
  <div class="container-fluid">
    <a href="{{ route('solicitude.create') }}" class="btn btn-primary">Registrar solicitud</a>
    <form class="d-flex" action="{{ route('solicitude.search') }}" method="POST">
      <!-- @csrf -->
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
        <h4>Listado de solicitudes</h4>
        <table class="table table-hover table-sm">
          <caption>Total de registros {{ $cant }} </caption>
          <thead class="table bg-primary text-white">
            <tr>
              <th>#</th>
              <th>Candidato</th>
              <th>Cédula</th>
              <th>Teléfono</th>
              <th>Celular</th>
              <th>Correo</th>
              <th>Dirección</th>
              <th>Cargo postulación</th>
              <th>Estado</th>
              <th>Servicio</th>
              <!-- <th>password</th> -->
              <th>acción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $pos=1;
            ?>
            @forelse($solicitudes as $solicitude)
            <tr>
              <td class="align-middle"><?php print $pos++ ?></td>
              <td class="align-middle">{{ $solicitude->name }} {{ $solicitude->lastname }}</td>
              <td class="align-middle">{{ $solicitude->idNumber }}</td>
              <td class="align-middle">{{ $solicitude->phone }}</td>
              <td class="align-middle">{{ $solicitude->mobile }}</td>
              <td class="align-middle">{{ $solicitude->mail }}</td>
              <td class="align-middle">{{ $solicitude->address }}</td>
              <td class="align-middle">{{ $solicitude->postulate }}</td>
              <td class="align-middle">{{ $solicitude->state }}</td>
              <td class="align-middle">{{ $solicitude->service }}</td>
              <!-- Estado 3 es igual a solicitado, unico que permite modificar la información o cancelar -->
              @if($solicitude->idState == 4 && ( auth()->user()->role == 2 || auth()->user()->role == 5))
              <td>
                <a href="{{ route('solicitude.edit', $solicitude->id) }}" class="btn btn-primary">Editar</a>
              </td>
              @elseif($solicitude->idState == 4 && (auth()->user()->role == 2 || auth()->user()->role == 3))
              <td>
                <a href="{{ route('solicitude.editsolicitude', $solicitude->id) }}" class="btn btn-primary">Asignar</a>
              </td>
              @elseif($solicitude->idState == 5  && (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4))
              <td>
                <a href="{{ route('solicitude.editsolicitude', $solicitude->id) }}" class="btn btn-primary">Gestionar</a>
              </td>
              @elseif($solicitude->idState == 6  && (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4))
              <td>
                <a href="{{ route('solicitude.editsolicitude', $solicitude->id) }}" class="btn btn-primary">Gestionar</a>
              </td>
              @elseif($solicitude->idState == 7  && (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3))
              <td>
                <a href="{{ route('solicitude.editsolicitude', $solicitude->id) }}" class="btn btn-primary">Verificar</a>
              </td>
              @elseif($solicitude->idState == 8)
              <td>
                <a href="" class="btn btn-success">Descargar informe</a>
              </td>
              @endif
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
        {{ $solicitudes->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
