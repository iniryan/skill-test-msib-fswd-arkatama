@extends('header')

@section('content')
    <div class="d-flex flex-column justify-content-center">
        <form class="p-5 m-5" action="{{ route('process.input') }}" method="post">
            <h2 class="my-5">Form Input Pengguna</h2>
            @csrf
            <div class="form-floating m-auto w-50">
                <input type="text" class="form-control" name="data" id="data" required>
                <label for="data">Input Data (format: NAMA USIA KOTA):</label>
            </div>
            <button class="w-50 mt-5 btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection