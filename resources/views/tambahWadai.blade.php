<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
</head>
<body>
    @extends('layouts.main')

    @section('container')
    <h3 class="text-center">Tambah Data Wadai</h3>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-5 border rounded mt-2">
                    <form action="{{ route('wadai.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                
                        <div class="mb-3">
                            <label for="nama_input" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="namaInput" id="nama_input">
                        </div>
                        <div class="mb-3">
                            <label for="harga_input" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga_input" name="hargaInput">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        
                        <div class="row mx-2">
                            <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>