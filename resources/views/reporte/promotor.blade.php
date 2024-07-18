@extends('reporte.layout')

@section('title', 'Promotor')

@section('content')
    <div class="card-title">
        <h4 class="text-center">REPORTE GENERAL PROMOTOR</h4>
        <h5 class="text-center">Información general de Matrículas registradas</h5>
        <hr>
        <table class="table my-3">
            <tr>
                <td>NOMBRE </td>
                <td class="fw-bolder">{{ $promotor->nombre }}</td>
            </tr>
            <tr>
                <td>CARNET</td>
                <td>{{ $promotor->carnet }}</td>
            </tr>
            <tr>
                <td>CORREO</td>
                <td>{{ $promotor->correo }}</td>
            </tr>
        </table>
        <p>
            Matriculas registradas: {{ $matriculas->count() }}
        </p>
        <p>
            Se cuentan únicamente las matrículas activas.
        </p>
    </div>

    <table class="table table-borderless" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>CARNET</th>
                <th>NOMBRE</th>
                <th>FECHA REGISTRO</th>
                <th>Sucursal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->carnet }}</td>
                    <td>{{ $matricula->nombre }}</td>
                    <td>{{ $matricula->created_at }}</td>
                    <td>{{ $matricula->sucursal == 'CH' ? 'Chinandega' : 'Managua' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
