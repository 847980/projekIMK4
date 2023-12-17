@extends("admin.layout")

@section("custom")
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    
    <script>
    $(document).ready(function() {
        // var filmData = [
        //     [1, "https://placekitten.com/50/50", "Film 1", "2022-01-01", "2h 30m", "Description 1", "Director 1", "Action", "Country 1", "Action 1"],
        //     [2, "https://placekitten.com/50/50", "Film 2", "2022-02-01", "2h 15m", "Description 2", "Director 2", "Adventure", "Country 2", "Action 2"],
        // ];

        var table = $('#film-table').DataTable({
            autoWidth: true,
            paging: true,
            searching: true,
        });
    });
    </script>
    <style>
        p {
            color: #EEEEEE;
        }
        .page-title {
            display: flex;
            justify-content: space-between;
        }
        .dashbox {
        }
        #film-table {
            width: 100%;
        }
        #film-table_info {
            color: #EEEEEE; 
        }
        #film-table_length label {
            color: #EEEEEE; 
        }

        #film-table_filter label {
            color: #EEEEEE; 
        }

        #film-table_filter input[type="search"] {
            color: #EEEEEE;
            background-color: #393E46;
        }
        #film-table_length select {
            color: #EEEEEE;
            background-color: #393E46;
        }
    </style>
@endsection

@section("content")
@if (session('error'))
<script>
    Swal.fire({
        title: "Error",
        text: "{{ session('error')  }}",
        icon: "error",
    });
</script>
@endif
@if (session('success'))
<script>
    Swal.fire({
        title: "Success",
        text: "{{ session('success')  }}",
        icon: "success",
        confirmButtonText: "OK",
        timer: 1500
    });
</script>
@endif

<h2>Genre List</h2>

        <div class="dashbox" >
            <div class="dashbox__title">
                {{-- input genre --}}
                <div class="input-container">
                    <form action="{{ route('admin.genre.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name text-white" style="color:#EEEEEE">New Genre</label>
                            <input class="form-control" name="name" id="name" placeholder="Genre">
                            <div class="mt-3">
                                <button type="submit" class="add-item-btn mx-0">Submit</button>
                            </div>
                        </div>
                    </form>  
                </div>
                <div class="dashbox__wrap">
                    <a class="dashbox__refresh" href="#">Refresh</a>
                </div>
            </div>

                <table id="film-table" class="display main__table main__table--dash table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                        <tr>
                            <td>{{ $loop->iteration }} </td>                            
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a class="button-group btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#EditModal" id="{{ $genre->id }}" name="{{ $genre->name }}">Edit</a>
                                <form action="{{ route('admin.genre.destroy', $genre->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <div class="modal" tabindex="-1" id="EditModal">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-dark">Edit Genre</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.genre.update', $genre->id) }}" id="form" method="post">
                                        <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name" class="text-dark">Genre</label>
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
@endsection

@section("script")
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

