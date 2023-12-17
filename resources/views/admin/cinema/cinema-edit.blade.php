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
                <h1>ADD FILM</h1>
            </div>
            <div class="container container-sm">
                <form action="{{ route('admin.cinema.update', $cinema->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- cinema --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="name" class="form-label">Cinema:</label>
                        </div>
                        <div class="col-6">
                            <input name="name" id="name" class="input form-control @error('name') is-invalid  @enderror" type="text" value="{{ $cinema->name }}" placeholder="nama cinema">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror   
                        </div>
                    </div>

                    {{-- address --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="address" class="form-label">Address:</label>
                        </div>
                        <div class="col-6">
                            <input name="address" id="address" class="input form-control @error('address') is-invalid  @enderror" type="text" value="{{ $cinema->address }}" placeholder="alamat cinema">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror   
                        </div>
                    </div>

                    {{-- country --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="country_id" class="form-label">Country:</label>
                        </div>
                        <div class="col-6">
                            <select class="form-control @error('country_id') is-invalid  @enderror" name="country_id" id="country_id">
                                <option hidden disabled selected >--Silahkan Pilih Country--</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ $cinema->city->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
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
                            <select class="form-control @error('city_id') is-invalid  @enderror" name="city_id" id="city_id">
                                <option hidden disabled selected >--Silahkan Pilih City--</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $cinema->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- submit --}}
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.cinema.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
        </div>
@endsection