@extends('layout.main')

@section('title', 'karyawan')

@section('content')
    <h2>list karyawan</h2>

    <br>
    <table class="table">
        <thead>
            <tr>
                <td>NO</td>
                <td>No KTP</td>
                <td>nama</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nomor_ktp}}</td>
                    <td>{{$item->nama}}</td>
                    <td>
                        <a href="/karyawan/{{$item->id}}">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <a href="/{{$karyawans->id}}">detail</a> --}}
@endsection
