@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush
@section('content')
<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($fotos as $foto)
                <div class="col">
                    <div class="card shadow-sm">
                        <img height="200" src="/foto/{{$foto->ruta}}" alt="Imagen">
                        <div class="card-body">
                            <p class="card-text">{{$foto->descripcion}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <p> <i class="bi bi-chat"></i>
                                        <button class="btn " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$foto->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="bi bi-chat"></i> {{count($foto->comentario)}}
                                        </button>
                                    </p>
                                </div>
                                <small class="text-muted">{{$foto->User->name}}</small>
                            </div>
                            <div class="collapse" id="collapseExample{{$foto->id}}">
                                @foreach($foto->comentario as $comentario)
                                <div class="card card-body">
                                    {{$comentario->comentario}}
                                </div>
                                <small class="text-muted">{{$comentario->User->name}}</small>
                                @endforeach
                                <form method="POST" action="{{ route('subirComentario') }}" >
                                @csrf
                                    <div class="form-group">
                                        <div class="mt-2 row g-3">
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="comentario" aria-describedby="emailHelp" placeholder="Ingrese su comentario">
                                            </div>
                                            <div class="col-2">
                                            <input type="hidden" name="id_foto" value="{{$foto->id}}">
                                                <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection

