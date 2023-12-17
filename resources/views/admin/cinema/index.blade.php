@extends('layouts.basic')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{ $title }}</h1>
            <a href="{{ route('admin.cinema.create') }}" class="btn btn-primary">Add Cinema</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cinema</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cinemas as $cinema)
                        <tr>
                            {{-- no  --}}
                            <td>{{ $loop->iteration }} </td>
                            <td>{{ $cinema->name }}</td>
                            <td>{{ $cinema->address }}</td>
                            <td>{{ $cinema->city->name }}</td>
                            <td>{{ $cinema->city->country->name }}</td>
                            <td>
                                <a href="{{ route('admin.cinema.edit', $cinema->id) }}" class="btn btn-warning my-2">Edit</a>
                                <form action="{{ route('admin.cinema.destroy', $cinema->id) }}" method="POST">
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

