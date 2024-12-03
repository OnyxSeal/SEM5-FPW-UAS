<!-- resources/views/mahasiswa/index.blade.php -->
@extends('layouts.app') <!-- Menggunakan layout umum -->

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Mahasiswa</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->name }}</td>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection