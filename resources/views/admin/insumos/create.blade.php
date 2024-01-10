@extends('layouts.app')

@section('content')
<br>
<div>

    <h5 class="animated-text col-6 text-right ">NUEVO INSUMO</h1>
        <a href="{{ url('/admin/insumos') }}" title="Back" style="position: relative; margin-left:10px"><button class="btn btn-info btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
        <br><br><br>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <form method="POST" action="{{ url('/admin/insumos') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.insumos.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>

        @endsection