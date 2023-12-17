@extends("admin.layout")

@section("custom")
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<style>
    h1 {
        margin-top: 0.5em;
    }
    h1, label {
        color: #EEEEEE;
        font-weight: bold;
    }
    .dashbox__title {
        display: flex;
        justify-content: center;
    }
    .form-control {
        border: none;
        outline: none;
        background-color: #393E46;
        border-bottom: 1.5px solid #EEEEEE;
        width: 100%;
        caret-color: #EEEEEE;
        border-radius: 0;
        color: #EEEEEE;
        font-weight: bold;
    }
    .form-control:focus {
        background-color: #393E46;
        color: #EEEEEE;
        border-color: #FFD369;
        transition: border 0.2s ease-out, background-color 0.2s ease-out, color 0.2s ease-out, border-radius 0.2s ease-out;
        box-shadow: none;
    }

    .row {
        margin-bottom: 1em;
        align-items: center;
    }

    label {
        margin-left: 2em;
        margin-top: 1em;
        font-size: 1.2rem;    
    }
</style>
@endsection

@section("content")
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

        <div class="dashbox">
            <div class="dashbox__title">
                <h1>ADD New Show Time</h1>
            </div>
            <div class="container container-sm">
                <form action="{{ route('admin.showtime.update', $showtime->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- film --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="film_id" class="form-label">Film:</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control @error('film_id') is-invalid @enderror" name="film_id" id="film_id">
                                <option hidden disabled selected value="">--Silahkan Pilih Film--</option>
                                @foreach ($films as $film)
                                    <option value="{{ $film->id }}" {{ $showtime->film_id == $film->id ? 'selected' : ''}}>{{ $film->judul }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>

                    {{-- city --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="city_id" class="form-label">City:</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="city_id">
                                <option hidden disabled selected value="">--Silahkan Pilih Kota--</option>    
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"  {{ $showtime->cinema->city_id == $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- cinema --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="cinema_id" class="form-label">Cinema:</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control @error('cinema_id') is-invalid @enderror" name="cinema_id" id="cinema_id">
                                @foreach ($cinemas as $cinema)
                                <option value="{{ $cinema->id }}" {{ $showtime->cinema_id == $cinema->id ? 'selected' : ''}} >{{ $cinema->name }}</option>
                
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- studio --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="studio_id" class="form-label">Studio:</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control @error('studio_id') is-invalid @enderror" name="studio_id" id="studio_id">
                                @foreach ($studios as $studio)
                                <option value="{{ $studio->id }}" {{ $showtime->studio_id == $studio->id ? 'selected' : ''}} >{{ $studio->name }}</option>
                
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- show_date --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="show_date" class="form-label">Show Date:</label>
                        </div>
                        <div class="col-6">
                            <input type="date" name="show_date" id="show_date" class="form-control @error('show_date') is-invalid @enderror" placeholder="Show Date" aria-describedby="helpId" value="{{ $showtime->show_date }}">

                        </div>
                    </div>

                    {{-- show_time --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="show_time" class="form-label">Show Time:</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control @error('show_time') is-invalid @enderror" name="show_time" id="show_time">
                                <option value="10:00:00-12:00:00" {{ $showtime->start_time == '10:00:00' ? 'selected' : ''}}>10.00-12.00</option>
                                <option value="12:00:00-14:00:00" {{ $showtime->start_time == '12:00:00' ? 'selected' : ''}}>12.00-14.00</option>
                                <option value="14:00:00-16:00:00" {{ $showtime->start_time == '14:00:00' ? 'selected' : ''}}>14.00-16.00</option>
                                <option value="16:00:00-18:00:00" {{ $showtime->start_time == '16:00:00' ? 'selected' : ''}}>16.00-18.00</option>
                                <option value="18:00:00-20:00:00" {{ $showtime->start_time == '18:00:00' ? 'selected' : ''}}>18.00-20.00</option>
                
                            </select>
                        </div>
                    </div>

                    {{-- price --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="price" class="form-label">Price:</label>
                        </div>
                        <div class="col-6">
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" aria-describedby="helpId" value="{{ $showtime->price }}">
                        </div>
                    </div>

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
                            $('#studio_id').append('<option hidden disabled selected value="">--Silahkan Pilih Cinema Dulu--</option>')
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
                        console.log(res)
                        if(res.length > 0){
                            $("#studio_id").empty()
                            $("#studio_id").append('<option hidden disabled selected value="">--Silahkan Pilih Studio--</option>')
                            $.each(res,function(key,value){
                                console.log(value)
                                $("#studio_id").append('<option value="'+value.id+'">'+value.name+'</option>')
                            })
                        }else{
                            $("#studio_id").empty()
                            // tidak ada studio
                            $("#studio_id").append('<option hidden disabled selected value="">--Tidak ada studio--</option>')
                        }
                    }
                })
            }else{
                $("#studio_id").empty()
                $("#studio_id").append('<option hidden disabled selected value="">--Silahkan Pilih Cinema Dulu--</option>')
            }
        })
    })

    </script>


@endsection