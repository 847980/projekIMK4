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

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="container">
    <h1>Create Show Time</h1>
    <form action="{{ route('admin.showtime.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="film_id">Film</label>
            <select class="form-control" name="film_id" id="film_id">
                <option hidden disabled selected value="">--Silahkan Pilih Film--</option>
                @foreach ($films as $film)
                    <option value="{{ $film->id }}">{{ $film->judul }}</option>
                @endforeach
            </select>
            
            {{-- city --}}
            <label for="city_id">City</label>
            <select class="form-control" name="city_id" id="city_id">
                <option hidden disabled selected value="">--Silahkan Pilih Kota--</option>
            
                
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>

            {{-- cinema --}}
            <label for="cinema_id">Cinema</label>
            <select class="form-control" name="cinema_id" id="cinema_id">
                <option hidden disabled selected value="">--isi kota dulu--</option>
            </select>
            
            <label for="studio_id">Studio</label>
            <select class="form-control" name="studio_id" id="studio_id">
                <option hidden disabled selected value="">--isi Cinema dulu--</option>
                
            </select>
            <label for="show_date">Show Date</label>
            <input type="date" name="show_date" id="show_date" class="form-control" placeholder="Show Date" aria-describedby="helpId">
            
            {{-- dropdown --}}
            <label for="show_time">Time</label>
            <select class="form-control" name="show_time" id="show_time">
                <option value="10:00:00-12:00:00">10.00-12.00</option>
                <option value="12:00:00-14:00:00">12.00-14.00</option>
                <option value="14:00:00-16:00:00">14.00-16.00</option>
                <option value="16:00:00-18:00:00">16.00-18.00</option>
                <option value="18:00:00-20:00:00">18.00-20.00</option>
            </select>
            
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Price" aria-describedby="helpId">
            {{-- submit --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.showtime.index') }}" class="btn btn-primary">Back</a>
            </div>

    </form>


</div>
</div>

@endsection


@section('script')
<script>
    $(document).ready(function(){
        $('#city_id').change(function(){
            var city_id = $(this).val()
            if(city_id){
                $.ajax({
                    type:"post",
                    url: "{{ route('admin.getCinema.byCity') }}",
                    data:{
                        city_id:city_id,
                        _token: "{{ csrf_token() }}"
                    },
                    datatype:'json',
                    success:function(res){
                        if(res){
                            $("#cinema_id").empty()
                            $("#cinema_id").append('<option hidden disabled selected value="">--Silahkan Pilih Cinema--</option>')
                            $('#studio_id').empty()
                            $('#studio_id').append('<option hidden disabled selected value="">--Pilih Cinema Dulu--</option>')
                            $.each(res,function(key,value){
                                console.log(value)
                                $("#cinema_id").append('<option value="'+value.id+'">'+value.name+'</option>')
                            })
                        }else{
                            $("#cinema_id").empty()
                        }
                    }
                })
            }else{
                $("#cinema_id").empty()
                $("#cinema_id").append('<option hidden disabled selected value="">--Pilih Kota Dulu--</option>')
                $('#studio_id').empty()
                $('#studio_id').append('<option hidden disabled selected value="">--Pilih Cinema Dulu--</option>')
            }
        })

        // studio
        $('#cinema_id').change(function(){
            var cinema_id = $(this).val()
            if(cinema_id){
                $.ajax({
                    type:"post",
                    url: "{{ route('admin.getStudio.byCinema') }}",
                    data:{
                        cinema_id: cinema_id,
                        _token: "{{ csrf_token() }}"
                    },
                    datatype:'json',
                    success:function(res){
                        if(res){
                            $("#studio_id").empty()
                            $("#studio_id").append('<option hidden disabled selected value="">--Silahkan Pilih Studio--</option>')
                            $.each(res,function(key,value){
                                console.log(value)
                                $("#studio_id").append('<option value="'+value.id+'">'+value.name+'</option>')
                            })
                        }else{
                            $("#studio_id").empty()
                        }
                    }
                })
            }else{
                $("#studio_id").empty()
                $("#studio_id").append('<option hidden disabled selected value="">--Pilih Cinema Dulu--</option>')
            }
        })
    })

    </script>


@endsection