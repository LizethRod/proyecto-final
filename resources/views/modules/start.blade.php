@extends('welcome')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Inicio
            </h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSucursal">
                        Nueva Sucursal
                    </button>
                </div>
                <div class="box-body">
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalAgregarSucursal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="POST">
                            @csrf
                            <div class="modal-header" style="background:#3c8dbc; color:white;">
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button> --}}
                                <h4 class="modal-title">Agregar sucursal</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Nombre de la sucursal" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Sucursal</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection