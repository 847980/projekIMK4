@extends('layouts.basic')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{ $title }}</h1>
            {{-- <a href="{{ route('admin.studio.create') }}" class="btn btn-primary">Add Film</a> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Studio</th>
                        <th>Total Chair</th>
                        <th>Cinema</th>
                        <th>City</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studios as $studio)
                        <tr>
                            {{-- no  --}}
                            <td>{{ $loop->iteration }} </td>
                            <td>{{ $studio->name }}</td>
                            <td>{{ $studio->total_chair }}</td>
                            <td>{{ $studio->cinema->name }}</td>
                            <td>{{ $studio->cinema->city->name }}</td>
                            <td>{{ $studio->cinema->city->country->name }}</td>
                            <td>
                                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditStudio">Edit</a>
                                <form action="{{ route('admin.studio.destroy', $studio->id) }}" method="POST">
                                    {{-- @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button> --}}
                                </form>
                                <div class="modal" tabindex="-1" id="EditStudio">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Edit Studio</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.studio.update', $studio->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Studio</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Studio" aria-describedby="helpId" value="{{ $studio->name }}">
                                                    {{-- <div class="mt-3">
                                                        
                                                    </div> --}}
                                                </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
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

