@extends('layouts.basic')

@section('style')
<style>
    h1 {
        color: red;
    }
</style>
@endsection

@section('body')

@endsection

@section('script')
<script>
    Swal.fire({
        title: 'success',
        text: 'Pembayaran Berhasil!',
        icon: 'success',
        confirmButtonText: 'Ok'
    })
</script>
@endsection