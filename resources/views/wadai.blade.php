<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wadai</title>
</head>
<body>
    @extends('layouts.main')

    @section('container')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('wadai.create') }}" class="btn btn-success">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($wadai as $item)
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td><img src="{{ asset('storage/'. $item->gambar) }}" alt="{{ $item->nama }}" style="max-height: 100px;"></td>
                <td>
                    <a href="{{ route('wadai.edit', $item->id) }}"  class="btn btn-primary">Edit</a>
                    <form action="{{ route('wadai.destroy',$item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="confirm('Anda yakin akan meenghapus data ini?')">Hapus</button>
                   </form>                   
                </td>
            </tr>

            @php
                $no++;
            @endphp
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>