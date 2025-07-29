@extends('layouts.app')

@section('content')
    <h1>Films list</h1>
    <div class="mb-2">
        <a href="{{ route('film.create') }}" class="btn btn-primary">Add New Film</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>url_poster</th>
            <th>Genres</th>
            <th>is_published</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($films as $film)
            <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->name}}</td>
                <td>{{ $film->url_poster}}</td>
                <td>{{ $film->genres->pluck('name') }}</td>
{{--                <td>{{ $film->is_published}}</td>--}}
                <td><a href="{{ route('film.set_active', $film->id) }}" class="btn btn-secondary">{{ $film->is_published == 0 ? 'Publish' : 'Unpublish' }}</a></td>
                <td><a href="{{ route('film.edit', $film->id) }}" class="btn btn-secondary">Edit</a></td>
                <td>
                    <form action="{{ route('film.destroy', [$film->id, 'page=' . $films->currentPage()]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $films->withQueryString()->links() }}
    </div>
@endsection
