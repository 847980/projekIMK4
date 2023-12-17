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
        <h1>Edit Film </h1>
    </div>
    <div class="container container-sm">
        <form action="{{ route('admin.film.update',$film->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- judul --}}
            <div class="row">
                <div class="col-6">
                    <label for="judul" class="form-label">Judul:</label>
                </div>
                <div class="col-6">
                    <input name="judul" id="judul" class="input form-control @error('judul') is-invalid  @enderror" type="text" value="{{ $film->judul }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror   
                </div>
            </div>
        
            {{-- poster landscape --}}
            <div class="row">
                <div class="col-6">
                    <label for="poster_landscape" class="form-label">POSTER LANDSCAPE  :</label>
                </div>
                <div class="col-6">
                    <img src="{{ asset('storage/poster/'.$film->poster_landscape) }}" alt="{{ $film->judul }}" width="100px">
                    <input type="file" name="poster_landscape" id="poster_landscape" class="mt-2 form-control @error('poster_landscape') is-invalid  @enderror">
                    @error('poster_landscape')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- poster potrait --}}
            <div class="row">
                <div class="col-6">
                    <label for="poster_potrait" class="form-label">POSTER POTRAIT  :</label>
                </div>
                <div class="col-6">
                    <img src="{{ asset('storage/poster/'.$film->poster_potrait) }}" alt="{{ $film->judul }}" width="100px">
                    <input type="file" name="mt-2 poster_potrait" id="poster_potrait" class="form-control @error('poster_potrait') is-invalid  @enderror">
                    @error('poster_potrait')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            {{-- release date --}}
            <div class="row">
                <div class="col-6">
                    <label for="release_date" class="form-label">RELEASE DATE   :</label>
                </div>
                <div class="col-6">
                    <input name="release_date" id="release_date" class="input form-control @error('release_date') is-invalid  @enderror" type="date" value="{{ $film->release_date }}">
                    @error('release_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>

            {{-- duration --}}
            <div class="row">
                <div class="col-6">
                    <label for="duration" class="form-label">DURATION (minute)  :</label>
                </div>
                <div class="col-6">
                    <input name="duration" id="duration" class="input form-control @error('duration') is-invalid  @enderror" type="number" value="{{ $film->duration }}">
                    @error('duration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>

            {{-- description --}}
            <div class="row">
                <div class="col-6">
                    <label for="description" class="form-label">DESCRIPTION    :</label>
                </div>
                <div class="col-6">
                    <textarea class="form-control @error('description') is-invalid  @enderror" name="description" id="description" rows="3" placeholder="deskripsi film" >{{ $film->description }}</textarea>

                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            
            {{-- sutradara --}}
            <div class="row">
                <div class="col-6">
                    <label for="sutradara" class="form-label">Sutradara   :</label>
                </div>
                <div class="col-6">
                    <input name="sutradara" id="sutradara" class="input form-control @error('sutradara') is-invalid  @enderror" type="text" value="{{ $film->sutradara }}">
                    @error('sutradara')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- cast --}}
            <div class="row">
                <div class="col-6">
                    <label for="cast" class="form-label">Cast    :</label>
                </div>
                <div class="col-6">
                    <input name="cast" id="cast" class="input form-control @error('cast') is-invalid  @enderror" type="text" value="{{ $film->cast }}">
                    @error('cast')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- age category --}}
            <div class="row">
                <div class="col-6">
                    <label for="age_cat" class="form-label">Age Category   :</label>
                </div>
                <div class="col-6">
                    <input name="age_cat" id="age_cat" class="input form-control @error('age_cat') is-invalid  @enderror" type="text" value="{{ $film->age_cat  }}">
                    @error('age_cat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- trailer --}}
            <div class="row">
                <div class="col-6">
                    <label for="trailer" class="form-label">Trailer :</label>
                </div>
                <div class="col-6">
                    <input name="trailer" id="trailer" class="input form-control @error('trailer') is-invalid  @enderror" type="text" value="{{ $film->age_cat }}">
                    @error('trailer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- genre --}}
            <div class="row">
                <div class="col-6">
                    <label for="genre_id">Genre</label>
                </div>
                <div class="col-6">
                    <select class="form-control @error('genre_id') is-invalid  @enderror" name="genre_id" id="genre_id">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $film->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                
            {{-- country --}}
            <div class="row">
                <div class="col-6">
                    <label for="country_id" class="form-label">COUNTRY    :</label>
                </div>
                <div class="col-6">
                    <select class="form-control @error('country_id') is-invalid  @enderror" name="country_id" id="country_id">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $film->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- submit --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.film.index') }}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
</div>
        
        
@endsection