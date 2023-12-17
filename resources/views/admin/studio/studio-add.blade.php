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
                <form action="{{ route('admin.studio.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    {{-- studio name --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="name" class="form-label">Studio:</label>
                        </div>
                        <div class="col-6">
                            <input name="name" id="name" class="input form-control @error('name') is-invalid  @enderror" type="text" value="{{ old('name') }}" placeholder="nama studio">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror   
                        </div>
                    </div>

                    {{-- total chair --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="total_chair" class="form-label">total chair:</label>
                        </div>
                        <div class="col-6">
                            <input name="total_chair" id="total_chair" class="input form-control @error('total_chair') is-invalid  @enderror" type="number" value="{{ old('total_chair') }}" placeholder="total">
                            @error('total_chair')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror   
                        </div>
                    </div>


                    {{-- cinema --}}
                    <div class="row">
                        <div class="col-6">
                            <label for="cinema_id" class="form-label">Cinema:</label>
                        </div>
                        <div class="col-6">
                            <select name="cinema_id" id="cinema_id" class="input form-control @error('cinema_id') is-invalid  @enderror">
                                <option value="">-- Select Cinema --</option>
                                @foreach ($cinemas as $cinema)
                                    <option value="{{ $cinema->id }}">{{ $cinema->name }} - {{ $cinema->city->name }}</option>
                                @endforeach
                            </select>
                            @error('cinema_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror   
                        </div>

                    {{-- submit --}}
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.studio.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
        </div>
@endsection