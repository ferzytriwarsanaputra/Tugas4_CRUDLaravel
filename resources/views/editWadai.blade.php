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
                    <form action="{{ route('wadai.update', $wadai->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_input" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('image') is-invalid @enderror" name="namaInput" id="nama_input" value="{{ $wadai->nama }}">
                            @error('namaInput')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga_input" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('image') is-invalid @enderror" id="harga_input" name="hargaInput" value="{{ $wadai->harga }}">
                            @error('hargaInput')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            @if($wadai->gambar)
                            <img src="{{ asset('storage/'. $wadai->gambar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                                    
                        <div class="row mx-2">
                                <button type="submit" class="btn btn-primary mb-3">Edit</button>
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