@extends('layouts.app')


@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear receta</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scope="col">
                        Titulo
                    </th>

                    <th scope="col">
                        Categoria
                    </th>

                    <th scope="col">
                        Acciónes
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach ($recetas as $receta)
                        <tr>
                            <td>
                                {{ $receta->titulo }}
                            </td>

                            <td>
                                {{ $receta->categoria->nombre }}
                            </td>
                            
                            <td>
                                <eliminar-receta receta-id={{ $receta->id }}></eliminar-receta>

                                <a href="{{ route('recetas.edit', ['receta' => $receta]) }}" class="btn btn-dark mr-1 d-block mt-2">Editar</a>
                                <a href="{{ route('recetas.show', ['receta' => $receta]) }}" class="btn btn-success mr-1 d-block mt-2">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection