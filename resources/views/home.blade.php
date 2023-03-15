@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title">
                        </div>
                        <div>
                            <label for="content">Content</label>
                            <textarea name="content" id="content"></textarea>
                        </div>
                        <button type="submit">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small class="text-muted"></small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
