@extends('layouts.basic')

@section('body')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- dropdown untuk pilih cinema dan kota --}}
    <h1>List show time</h1>
    <a href="{{ route('admin.showtime.create') }}" class="btn btn-primary">Add Show Time</a>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                {{-- nanti kalau bisa ubah dropdown --}}
                <th>Film</th>
                <th>Cinema</th>
                <th>Studio</th>
                <th>show_date</th>
                <th>start_time</th>
                <th>end_time</th>
                <th>price</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showtimes as $showtime)
            <tr>
                    <td>{{ $showtime->film->judul }}</td>
                    <td>{{ $showtime->cinema->name }}</td>
                    <td>{{ $showtime->studio->name }}</td>
                    <td>{{ $showtime->show_date }}</td>
                    <td>{{ $showtime->start_time }}</td>
                    <td>{{ $showtime->end_time }}</td>
                    <td>{{ $showtime->price }}</td>
                    <td>
                        <a href="{{ route('admin.showtime.edit', $showtime->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.showtime.destroy', $showtime->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>


</div>

@endsection