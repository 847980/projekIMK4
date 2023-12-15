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
<div class="container">
    <h1>Create film</h1>
    <form action="{{ route('admin.film.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" aria-describedby="helpId" value="{{ old('judul') }}" >
            {{-- upload poster landscape dan potrait --}}
            <label for="poster_landscape">Poster Landscape</label>
            <input type="file" name="poster_landscape" id="poster_landscape" class="form-control" placeholder="Poster Landscape" aria-describedby="helpId">
            <label for="poster_potrait">Poster Potrait</label>
            <input type="file" name="poster_potrait" id="poster_potrait" class="form-control" placeholder="Poster Potrait" aria-describedby="helpId">
            
            {{-- buatkan form untuk create film, field: release_date, duration, description, sutradara, cast, trailer, age_cat,country --}}
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" placeholder="Release Date" aria-describedby="helpId">
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" class="form-control" placeholder="Duration" aria-describedby="helpId">
            <label for="description">Description</label>
            {{-- descriptioin text area --}}
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="deskripsi film"></textarea>
            <label for="sutradara">Sutradara</label>
            <input type="text" name="sutradara" id="sutradara" class="form-control" placeholder="Sutradara" aria-describedby="helpId">
            <label for="cast">Cast</label>
            <input type="text" name="cast" id="cast" class="form-control" placeholder="Cast" aria-describedby="helpId">
            <label for="trailer">Trailer</label>
            <input type="text" name="trailer" id="trailer" class="form-control" placeholder="Trailer" aria-describedby="helpId">
            <label for="age_cat">Age Category</label>
            <input type="text" name="age_cat" id="age_cat" class="form-control" placeholder="Age Category" aria-describedby="helpId">
            <label for="genre_id">Genre</label>
            <select class="form-control" name="genre_id" id="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            <label for="country_id">Country</label>
            <select class="form-control" name="country_id" id="country_id">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>

            {{-- submit --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.film.index') }}" class="btn btn-primary">Back</a>
            </div>
    </form>  


</div>

@endsection