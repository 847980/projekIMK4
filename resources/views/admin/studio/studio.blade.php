@extends("admin.layout")

@section("custom")
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    
    <script>
    $(document).ready(function() {
       

        var table = $('#film-table').DataTable({
            // autoWidth: true,
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

<h2>Studio List</h2>

        <div class="dashbox" >
            <div class="dashbox__title">
                <a class="add-item-btn" href="{{ route('admin.studio.create') }}">Add New Studio</a>
                <div class="dashbox__wrap">
                    <a class="dashbox__refresh" href="#">Refresh</a>
                </div>
            </div>

                <table id="film-table" class="display main__table main__table--dash table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Studio</th>
                            <th>Total Chair</th>
                            <th>Cinema</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Action</th>
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
                                <a class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#EditStudio">Edit</a>
                                <form action="{{ route('admin.studio.destroy', $studio->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <div class="modal" tabindex="-1" id="EditStudio">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-dark">Edit Studio</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.studio.update', $studio->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name" class="text-dark">Studio</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Studio" aria-describedby="helpId" value="{{ $studio->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_chair" class="text-dark">total chair </label>
                                                    <input type="number" name="total_chair" id="total_chair" class="form-control" placeholder="total" aria-describedby="helpId" value="{{ $studio->total_chair }}">
                                                </div>
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