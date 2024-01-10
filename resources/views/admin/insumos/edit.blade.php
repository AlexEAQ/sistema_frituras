@extends('layouts.app')

@section('content')
  <br>
<div>

    <h5 class="animated-text col-6 text-right ">EDITAR  Insumo </h1>
        <a href="{{ url('/admin/insumos') }}" title="Back" style="position: relative; margin-left:10px"><button class="btn btn-info btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
        <br><br><br>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                        <form method="POST" action="{{ url('/admin/insumos/' . $insumo->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.insumos.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
