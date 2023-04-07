<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    @extends('layouts.main')

    @section('container')
    <h3 class="text-center">Edit Data Wadai</h3>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-5 border rounded mt-2">
                    <form action="{{ route('wadai.update', $wadai->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                                <label for="nama_input" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="namaInput" id="nama_input" value="{{ $wadai->nama }}">
                        </div>
                        <div class="mb-3">
                                <label for="harga_input" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga_input" name="hargaInput" value="{{ $wadai->harga }}">
                        </div>
                        {{-- <div class="mb-3">
                                <label for="prodi_input" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="prodi_input" name="prodiInput" value="{{ $wadai->prodi }}">
                        </div> --}}
                                    
                        <div class="row mx-2">
                                <button type="submit" class="btn btn-primary mb-3">Edit</button>
                        </div>
                </form>               
                </div>
            </div>
        </div>
    @endsection
</body>
</html>