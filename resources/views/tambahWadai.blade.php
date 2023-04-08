<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    @extends('layouts.main')

    @section('container')
    <h3 class="text-center">Tambah Data Wadai</h3>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-5 border rounded mt-2">
                    <form action="{{ route('wadai.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                
                        <div class="mb-3">
                            <label for="nama_input" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('namaInput') is-invalid @enderror" name="namaInput" id="namaInput" value="{{ old('namaInput') }}">
                            @error('namaInput')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga_input" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('namaInput') is-invalid @enderror" id="hargaInput" name="hargaInput" value="{{ old('hargaInput') }}">
                            @error('hargaInput')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('namaInput') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" value="{{ old('image') }}">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                            @enderror
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
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
</html>