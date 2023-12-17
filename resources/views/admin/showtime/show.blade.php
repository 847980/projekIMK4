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

<h2>Showtime List</h2>

        <div class="dashbox" >
            <div class="dashbox__title">
                <a class="add-item-btn" href="{{ route('admin.showtime.create') }}">Add New Show</a>
                <div class="dashbox__wrap">
                    <a class="dashbox__refresh" href="#">Refresh</a>
                </div>
            </div>

                <table id="film-table" class="display main__table main__table--dash table">
                    <thead>
                        <tr>
                            <th>film</th>
                            <th>cinema</th>
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
                                    <a href="{{ route('admin.showtime.edit', $showtime->id) }}" class="btn btn-warning my-2">Edit</a>
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