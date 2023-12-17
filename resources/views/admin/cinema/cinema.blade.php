@extends("admin.layout")

@section("custom")
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    
    <script>
    $(document).ready(function() {
        var table = $('#film-table').DataTable({
            autoWidth: true,
            paging: true,
            searching: true,
            // scrollX: true
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

<h2>Cinema List</h2>

        <div class="dashbox" >
            <div class="dashbox__title">
                <a class="add-item-btn" href="{{ route('admin.cinema.create') }}">Add New Cinema</a>
                <div class="dashbox__wrap">
                    <a class="dashbox__refresh" href="#">Refresh</a>
                </div>
            </div>

                <table id="film-table" class="display main__table main__table--dash table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cinema</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Action</th>
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
        </div>
@endsection