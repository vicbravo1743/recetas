@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">
        Crear nueva receta
    </h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('recetas.store') }}" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text"
                        class="form-control @error('titulo') is-invalid @enderror" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Titulo receta" 
                        autocomplete="off" 
                        value="{{ old('titulo') }}"
                    />

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select 
                        name="categoria" 
                        id="categoria"
                        class="form-control @error('categoria') is-invalid @enderror"
                    >
                        <option value="">-- Seleccione --</option>
                        @foreach ($categorias as $categoria)
                            <option 
                                value="{{ $categoria->id }}" 
                                {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                            >
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                    <input id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
                    <trix-editor 
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror"
                    ></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
                    <trix-editor 
                        input="ingredientes"
                        class="form-control @error('preparacion') is-invalid @enderror"
                    ></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="ingredientes">Elige la imagen</label>
                    <input 
                        id="imagen" 
                        type="file" 
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong> 
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar receta">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script>
@endsection