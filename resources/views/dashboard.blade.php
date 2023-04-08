<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    @extends('layouts.main')

    @section('container')
    <form method="GET">
        <div class="row mb-3">
            <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
            <div class="mb-10">
                <input style="width: 99%;" type="text" class="form-control form-control-sm" value="{{ $search }}" placeholder="Cari Disini" name="search" autofocus>
            </div>
        </div>
    </form>
        <div class="row justify-content-center g-5">
            @foreach ($wadai as $item)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    @if($item->gambar)
                    <img src="{{ asset('storage/'. $item->gambar) }}" alt="{{ $item->nama }}" style="max-height: 100px;">
                    @else
                    <img src="https://i.pinimg.com/736x/d0/17/cf/d017cf0fefc93e2a39f820a915c96322.jpg" style="max-height: 100px;">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">Harga : Rp. {{ number_format($item->harga) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {!! $wadai->appends(Request::except('page'))->render() !!}
    @endsection
</body>
</html>
