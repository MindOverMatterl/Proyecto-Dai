@extends('layouts.app')

@section('content')
<main class="container">
    <div class="mb-4">
        <h1 class="mb-3">Biblioteca Virtual</h1>
        <h5>Subir Portada de Libro</h5>
        <form action="{{ route('subirFoto') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Agrega una descripción">
            </div>
            <div class="col-md-6">
                <label for="foto" class="form-label">Portada de libro</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Subir</button>
            </div>
        </form>
    </div>

    <div class="row">
        @foreach($fotos as $foto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/foto/{{$foto->ruta}}" class="card-img-top img-fluid" style="max-height: 300px; object-fit: cover;" alt="Portada del libro">
                    <div class="card-body">
                        <h5 class="card-title">{{$foto->descripcion}}</h5>
                        <p class="card-text">{{ Str::limit($foto->descripcion, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <form method="POST" action="{{ route('eliminarFoto') }}">
                                @csrf
                                <div class="btn-group">
                                    <input type="hidden" name="id_foto" value="{{$foto->id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Eliminar
                                    </button>
                                </div>
                            </form>
                            <small class="text-muted">{{$foto->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection

@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush
