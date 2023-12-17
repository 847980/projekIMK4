@extends('layouts.basic')

@section('body')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1>Create Genre</h1>
    <form action="{{ route('admin.genre.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Genre</label>
            <input class="form-control" name="name" id="name" placeholder="Genre">
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.genre.index') }}" class="btn btn-primary">Back</a>
            </div>
    </form>  
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{ $title }}</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <td>{{ $loop->iteration }} </td>                            
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a class="button-group btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModal" id="{{ $genre->id }}" name="{{ $genre->name }}">Edit</a>
                                <form action="{{ route('admin.genre.destroy', $genre->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <div class="modal" tabindex="-1" id="EditModal">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Edit Genre</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.genre.update', $genre->id) }}" id="form" method="post">
                                        <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Genre</label>
                                                    <input type="text" name="name" id="nameModal" class="form-control" placeholder="Genre" aria-describedby="helpId" value="{{ $genre->name }}">
                                                    {{-- <div class="mt-3">
                                                        
                                                    </div> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".button-group").click(function() {
            genreId = $(this).attr("id");
            genreName = $(this).attr("name");
            console.log(genreId);
            console.log(genreName);
            $('#nameModal').val(genreName);
            "{{ route('admin.genre.update', $genre->id) }}"
            var newAction = "{{ route('admin.genre.update', 'id') }}";
            console.log(newAction);
            newAction = newAction.replace('id', genreId); 
            console.log("sep");
            console.log(newAction);
            $('#form').attr('action', newAction);
        });
    });
</script>
@endsection

