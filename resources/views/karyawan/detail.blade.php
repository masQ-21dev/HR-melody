@extends('layout.main')

@section('title', "detail karyawan $karyawan->nama")

@section('content')
    <h2>ini adalah halaman detail dari {{$karyawan->nama}}</h2>


    <table class="table">
            <tr>
                <td>Nomor KTP</td>
                <td> : </td>
                <td>{{$karyawan->nomor_ktp}}</td>
            </tr>
            <tr>
                <td>nama</td>
                <td> : </td>
                <td>{{$karyawan->nama}}</td>
            </tr>
            <tr>
                <td>tanggal lahir</td>
                <td> : </td>
                <td>{{$karyawan->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td>gender</td>
                <td> : </td>
                <td>{{$karyawan->gender}}</td>
            </tr>
            <tr>
                <td>agama</td>
                <td> : </td>
                <td>{{$karyawan->agama}}</td>
            </tr>
            <tr>
                <td>keawganaegaraan</td>
                <td> : </td>
                <td>{{$karyawan->kewarganegaraan}}</td>
            </tr>
            <tr>
                <td>golongan darah</td>
                <td> : </td>
                <td>{{$karyawan->golongan_darah}}</td>
            </tr>
            <tr>
                <td>nomor HP</td>
                <td> : </td>
                <td>{{$karyawan->phone}}</td>
            </tr>
            <tr>
                <td>alamat</td>
                <td> : </td>
                <td>{{$karyawan->alamat}}</td>
            </tr>


            <h3>orang tua</h3>
            <tr>
                <td>anak ke-</td>
                <td> : </td>
                <td>{{$karyawan->anak_ke}}</td>
            </tr>
            <tr>
                <td>ayah</td>
                <td> : </td>
                <td>{{$karyawan->orangTuaKaryawan->ayah}}</td>
            </tr>
            <tr>
                <td>ibu</td>
                <td> : </td>
                <td>{{$karyawan->orangTuaKaryawan->ibu}}</td>
            </tr>
    </table>

    <h3>tanggungan karyawan</h3>
    <table class="teble">
        <thead>
            <tr>
                <td>no</td>
                <td>nama</td>
                <td>hubungan</td>
                <td>tempat tanggal lahir</td>
                <td>gender</td>
                <td>pendidikan</td>
                <td>caction</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($karyawan->tanggunganKaryawan as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->hubungan}}</td>
                <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->pendidikan}}</td>
                <td>
                    {{-- <a href="{{route('showtanggungan', ['id' => $karyawan->id, 'id1' => $item->id])}}">detail</a> --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>
    <h3>pengalaman kerja karyawan</h3>
    <table class="teble">
        <thead>
            <tr>
                <td>no</td>
                <td>tahun</td>
                <td>pekerjaan</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan->pengalaman as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->tahun}}</td>
                    <td>{{$item->pengalaman_kerja}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
