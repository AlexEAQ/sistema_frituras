@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Insumo {{ $insumo->id }}</div>
                <div class="card-body">

                  
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $insumo->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nombre </th>
                                    <td> {{ $insumo->nombre }} </td>
                                </tr>
                                <tr>
                                    <th> Medida </th>
                                    <td> {{ $insumo->medida }} </td>
                                </tr>
                                <tr>
                                    <th> Stock </th>
                                    <td> {{ $insumo->stock }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection