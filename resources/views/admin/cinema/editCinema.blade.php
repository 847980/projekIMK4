@extends('layouts.basic')

@section('body')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Edit Cinema</h1>
    <form action="{{ route('admin.cinema.update', $cinema->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Cinema</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="cinema" aria-describedby="helpId" value="{{ $cinema->name }}">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-describedby="helpId" value="{{ $cinema->address }}">
            
            <label for="country_id">Country</label>
            <select class="form-control" name="country_id" id="country_id">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->city_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
            
            <label for="city_id">City</label>
            <select class="form-control" name="city_id" id="city_id">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $country->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>

            {{-- submit --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.film.index') }}" class="btn btn-primary">Back</a>  
</div>

@endsection