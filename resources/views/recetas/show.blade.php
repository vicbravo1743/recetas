@extends('layouts.app')

@section('content')
    
    <article class="contenido-receta">
        <h1 class="text-center mb-4">
            {{ $receta->titulo }}
        </h1>

        <div class="image-receta">
            <img src="/storage/{{ $receta->imagen }}" alt="image-receta" class="w-100">
        </div>

        <div class="receta-meta mt-2">
            <p>
                <span class="font-weight-bold text-primary">
                    Escrito en:
                </span>
                {{ $receta->categoria->nombre }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">
                    Autor:
                </span>
                {{-- TODO: mostrar el usuario --}}
                {{ $receta->autor->name }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">
                    Fecha:
                </span>
        
                <fecha-receta fecha="{{ $receta->created_at }}"></fecha-receta>

            </p>

            
            <div class="ingredientes">
                <h2 class="my-3 text-primary">
                    Ingredientes
                </h2>

                {!! $receta->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-primary">
                    Preparación
                </h2>

                {!! $receta->preparacion !!}
            </div>

        </div>
    </article>
@endsection