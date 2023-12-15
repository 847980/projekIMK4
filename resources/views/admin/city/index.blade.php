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
<script>
    var test = @json($countries);
</script>
<div class="container">
    <h1>Create City</h1>
    <form action="{{ route('admin.city.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">City</label>
            <input class="form-control" name="name" id="name" placeholder="City">
            <select class="form-control" name="country_id" id="country_id">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                        <th>City</th>
                        <th>Country</th>
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
                                    <a class="button-group btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModal" id="{{ $city->id }}">Edit</a>
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
                                          <h5 class="modal-title">Edit City</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.city.update', $city->id) }}" method="post" id="form">

                                        <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">City</label>
                                                    <input type="text" name="name" id="nameModal" class="form-control" aria-describedby="helpId" value="{{ $city->name }}">
                                                    <label for="country_id">Country</label>
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
    </div>
</div>
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

