<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    @extends('layouts.main')

    @section('container')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
                <h1>Tabel Data Pengguna</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n= 1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $n }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->is_admin)== 1 ? "Admin" : "Pengguna" }}</td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @endsection
</body>
</html>
