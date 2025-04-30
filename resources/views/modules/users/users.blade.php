@extends('welcome')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Usuarios
            </h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                        Nuevo Usuario
                    </button>
                </div>
                <div class="box-body">
                    <h4> Usuarios Activos</h4>
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive table-hover mb-2">
                        <thead>
                            <tr>                                
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Sucursal</th>
                                <th>Última conexión</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                @if($u->status == 1)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>{{ $u->branch->name }}</td>
                                        <td>{{ $u->last_login }}</td>
                                        <td>
                                            <button class="btn btn-warning btnEditarUsuario" 
                                            data-toggle="modal" data-target="#modalEditarUsuario" idUsuario="{{ $u->id }}">
                                                <i class="fa fa-pencil"></i></button>
                                            <a href="{{ route('users.changeStatus', ['status' => 0, 'id'=>$u->id]) }}">
                                                <button class="btn btn-danger"><i class="fa fa-times"></i>Habilitar</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <h4> Usuarios Inactivos</h4>
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive table-hover mb-2">
                        <thead>
                            <tr>                                
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Sucursal</th>
                                <th>Última conexión</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                @if($u->status == 0)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>{{ $u->branch->name }}</td>
                                        <td>{{ $u->last_login }}</td>
                                        <td>
                                            <button class="btn btn-warning btnEditarUsuario" 
                                            data-toggle="modal" data-target="#modalEditarUsuario" idUsuario="{{ $u->id }}">
                                                <i class="fa fa-pencil"></i></button>
                                            <a href="{{ route('users.changeStatus', ['status' => 1, 'id'=>$u->id]) }}">
                                                <button class="btn btn-success"><i class="fa fa-times"></i>Habilitar</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                  
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalAgregarUsuario">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header" style="background:#3c8dbc; color:white;">
                                <h4 class="modal-title">Agregar usuario</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Nombre de usuario" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Correo" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                            <input type="text" class="form-control" name="role" id="role"
                                                placeholder="Rol" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span for="branch_id">Sucursal</span>
                                        <select class="form-control" name="branch_id" id="branch_id" required>  
                                            <option value="">Seleccione una sucursal</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                            <input type="file" class="form-control" name="photo" id="photo" accept="image/*"
                                                 required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar usuario</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>

            <!-- Modal Editar -->
            <div class="modal fade" id="modalEditarUsuario" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('users.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header" style="background:#ffc107; color:black;">
                                <h4 class="modal-title">Editar usuario</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <img src="" id="photoU" class="img-thumbnail" width="100px" height="100px" alt=""
                                    style="border-radius: 5px; display: block; margin: 0 auto;">

                                    <div class="form-group" style="margin-top: 10px !important;">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="name" id="nameU"
                                                placeholder="Nombre de usuario" required>
                                            <input type="hidden" id="idEditarUsuario" name="id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="email" id="emailU"
                                                placeholder="Correo" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                            <input type="text" class="form-control" name="role" id="roleU"
                                                placeholder="Rol" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span for="branch_id">Sucursal</span>
                                        <select class="form-control" name="branch_id" id="branch_idU" required>  
                                            <option value="">Seleccione una sucursal</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                            <input type="file" class="form-control" name="photo" id="photo" accept="image/*"
                                                 required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" name="password" id="passwordU"
                                                placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection