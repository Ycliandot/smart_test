@extends('layouts.app')

@section('content')
    <h1>Add new film</h1>
    <div class="row">
        <form action="{{ route('film.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_published" class="form-label">Select Genre</label>
                <select class="form-select" multiple name="genre_id[]" id="genre_id">
                    @foreach($genre as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_published" class="form-label">Published</label>
                <select class="form-select" name="is_published" id="is_published">
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
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
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('film.index') }}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div
@endsection
