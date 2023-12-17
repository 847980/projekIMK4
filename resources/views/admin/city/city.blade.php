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
                    <form action="{{ route('admin.city.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name text-white" style="color:#EEEEEE">Add City</label>
                            <input class="form-control my-2 @error('name') is-invalid  @enderror" name="name" id="name" placeholder="City" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <select class="form-control my-2 @error('country_id') is-invalid  @enderror" name="country_id" id="country_id">
                                <option hidden disabled selected >--Silahkan Pilih City--</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : ''  }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
                            <th>City</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                        <tr>
                            <td>{{ $loop->iteration }} </td>                            
                            <td>{{ $city->name }}</td>                            
                            <td>{{ $city->country->name }}</td>
                            <td>
                                <div id="{{ $city->country->name }}" name="{{ $city->name }}">
                                    <a class="button-group btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#EditModal" id="{{ $city->id }}">Edit</a>
                                </div>
                                <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <div class="modal" tabindex="-1" id="EditModal">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-dark">Edit City</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.city.update', $city->id) }}" method="post" id="form">

                                        <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name" class="text-dark">City</label>
                                                    <input type="text" name="name" id="nameModal" class="form-control" aria-describedby="helpId" value="{{ $city->name }}">
                                                    <label for="country_id" class="text-dark">Country</label>
                                                        <select class="form-control" name="country_id" id="countrySelect">
                                                        {{-- @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach --}}
                                                        </select>
                                                    {{-- <div class="mt-3">
                                                        
                                                    </div> --}}
                                                {{-- </form> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                        </div>
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
    var test = @json($countries);
</script>

<script>
    $(document).ready(function() {
        $(".button-group").click(function() {
            country = $(this).parent().attr("id");
            city = $(this).parent().attr("name");
            cityId = $(this).attr("id").toString();
            console.log(cityId);
            console.log(city);
            console.log(country);
            $("#nameModal").val(city);
            var dynamicSelect = $('#countrySelect');
            dynamicSelect.empty(); 
            $.each(test, function(index, value) {
                var newOption = $('<option>').val(value["id"]).text(value["name"]);
                if (value["name"] == country) {
                    newOption.prop('selected', true);
                    console.log(value["name"]);   
                }
                dynamicSelect.append(newOption);
            });
            var newAction = "{{ route('admin.city.update', 'id') }}";
            console.log(newAction);
            newAction = newAction.replace('id', cityId); 
            console.log("sep");
            console.log(newAction);
            $('#form').attr('action', newAction);
        });
    });
</script>
@endsection

