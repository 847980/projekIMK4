@extends('layouts.basic')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{ $title }}</h1>
            <a href="{{ route('admin.film.create') }}" class="btn btn-primary">Add Film</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Release_date</th>
                        <th>Duration(minute)</th>
                        <th>Description</th>
                        <th>Sutradara</th>
                        <th>Cast</th>
                        <th>Age Rated</th>
                        <th>Genre</th>
                        <th>Country</th>
                        <th>Trailer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            {{-- no  --}}
                            <td>{{ $loop->iteration }} </td>
                            <td>{{ $film->judul }}</td>
                            <td>{{ $film->release_date }}</td>
                            <td>{{ $film->duration }}</td>
                            <td>{{ $film->description }}</td>
                            <td>{{ $film->sutradara }}</td>
                            <td>{{ $film->cast }}</td>
                            <td>{{ $film->age_cat }}</td>
                            <td>{{ $film->genre->name }}</td>
                            <td>{{ $film->country->name }}</td>
                            <td><a href="{{ $film->trailer }}">{{ $film->trailer }}</a></td>
                            <td>
                                <a href="{{ route('admin.film.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.film.destroy', $film->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $films->links() }} --}}
        </div>
    </div>
</div>

@endsection

