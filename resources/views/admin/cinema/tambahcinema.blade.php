@extends('layouts.basic')


@section('body')

<div class="container">
    <h1>Create film</h1>
    <form action="{{ route('admin.cinema.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="cinema">Cinema</label>
            <input type="text" name="name" id="cinema" class="form-control" placeholder="Cinema" aria-describedby="helpId">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Address" aria-describedby="helpId">

            <label for="city_id">City</label>
            <select class="form-control" name="city_id" id="city_id">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>

            {{-- submit --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.cinema.index') }}" class="btn btn-primary">Back</a>
            </div>
    </form>  


</div>

@endsection