@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- Formulario de creación de post -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Crear nuevo Post</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Contenido</label>
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-right">
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary ml-2">Crear Post</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lista de posts -->
                @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $post->title }}</h5>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ml-2">Eliminar</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
