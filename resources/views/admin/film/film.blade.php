@extends("admin.layout")

@section("custom")
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    
    <script>
    $(document).ready(function() {
        var filmData = [
            [1, "https://placekitten.com/50/50", "Film 1", "2022-01-01", "2h 30m", "Description 1", "Director 1", "Action", "Country 1", "Action 1"],
            [2, "https://placekitten.com/50/50", "Film 2", "2022-02-01", "2h 15m", "Description 2", "Director 2", "Adventure", "Country 2", "Action 2"],
        ];

        var table = $('#film-table').DataTable({
            // data: filmData,
            // columns: [
            //     { title: "ID" },
            //     { title: "POSTER", render: function(data, type, row) {
            //         return '<img src="' + data + '" alt="Poster" style="width:80px;height:120px;">';
            //     }},
            //     { title: "TITLE" },
            //     { title: "RELEASE DATE" },
            //     { title: "DURATION" },
            //     { title: "DESCRIPTION" },
            //     { title: "DIRECTOR" },
            //     { title: "GENRE" },
            //     { title: "COUNTRY" },
            //     { title: "ACTION", render: function() {
            //         return '<button class="edit-btn btn btn-warning"><i class="far fa-edit"></i></button>' +
            //                '<button class="delete-btn btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
            //     }},
            // ],
            autoWidth: true,
            paging: true,
            searching: true,
            scrollX: true
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

<h2>Film List</h2>

        <div class="dashbox" >
            <div class="dashbox__title">
                <a class="add-item-btn" href="{{ route('admin.film.create') }}">ADD ITEMS</a>
                <div class="dashbox__wrap">
                    <a class="dashbox__refresh" href="#">Refresh</a>
                </div>
            </div>

                <table id="film-table" class="display main__table main__table--dash table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>POSTER</th>
                            <th>TITLE</th>
                            <th>RELEASE DATE</th>
                            <th>DURATION</th>
                            <th>DESCRIPTION</th>
                            <th>SUTRADARA</th>
                            <th>CAST</th>
                            <th>AGE_CAT</th>
                            <th>GENRE</th>
                            <th>COUNTRY</th>
                            <th>TRAILER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)
                            <tr>
                                {{-- no  --}}
                                <td>{{ $loop->iteration }} </td>
                                <td>
                                    @if($film->poster_potrait)
                                        <img src="{{ asset('storage/poster/'.$film->poster_potrait) }}" alt="{{ $film->judul }}" width="100px">
                                    @else
                                        <span>No Image Yet</span>
                                    @endif
                                </td>
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
                                    <a href="{{ route('admin.film.edit', $film->id) }}" class="btn btn-warning my-2">Edit</a>
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
        </div>
@endsection