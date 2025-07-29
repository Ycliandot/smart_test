@extends('layouts.app')

@section('content')
    <h1>Edit film</h1>
    <div class="row">
        <form action="{{ route('film.update', $film->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('patch')
            @if(Storage::disk('public')->exists($film->url_poster))
                <div class="container">
                    <div class="row w-25 h-25 mb-4">
                        <img src="{{ asset('storage/' . $film->url_poster) }}" alt="poster">
                    </div>
                </div>
            @else
                <div class="row">No photo</div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $film->name }}">
                @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_published" class="form-label">Select Genre</label>
                <select class="form-select" multiple name="genre_id[]" id="genre_id">
                    @foreach($genre as $genre)
                        <option value="{{ $genre->id }}" {{ in_array($genre->id, $film->genres->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="is_published" class="form-label">Published</label>
                <select class="form-select" name="is_published" id="is_published">
                    <option value="0" {{ $film->is_published == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $film->is_published == 1 ? 'selected' : '' }}>Yes</option>
                </select>
                @error('is_published')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url_poster" class="form-label">Poster image</label>
                <input type="file" class="form-control" id="url_poster" name="url_poster" placeholder="Poster">
                @error('url_poster')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ route('film.index') }}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div
@endsection
