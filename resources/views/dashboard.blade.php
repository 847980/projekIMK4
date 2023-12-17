@extends('layouts.basic')

@section('style')
<style>
    h1 {
        color: red;
    }
</style>
@endsection

@section('body')
<h1>Hai Dunia</h1>

@endsection

@section('script')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endsection

