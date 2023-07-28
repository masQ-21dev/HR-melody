<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAPEG | IDENTITAS {{$data->nama}}</title>
    <!-- Google Font: Source Sans Pro -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{public_path('/assets/css/style.css')}}">

</head>
<body>
    <main class="main-container">
        <div class="card-body">
            <img src="{{ public_path('/assets/images/hr-logo.png')}}" class="logo" alt="">
            <div class="data-container">
                <p class="text-title"><strong>BIO DATA APPLICANT</strong></p>

                <div class="table-responsife">
                    <table class="table-no-border">
                            <tr>
                                <td class="first-col">Nama</td>
                                <td>: {{$data->nama}}</td>
                            </tr>
                            <tr>
                                <td>No. KTP</td>
                                <td>: {{$data->nama}}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>: {{$data->tempat_lahir ? $data->tempat_lahir : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{$data->tanggal_lahir ? $data->tanggal_lahir : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{$data->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{$data->agama ? $data->agama : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: {{$data->kewarganegaraan ? $data->kewarganegaraan : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>: {{$data->golongan_darah ? $data->golongan_darah : '-'}}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>: {{$data->phone ? $data->phone : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{$data->alamat ? $data->alamat : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Anak Ke</td>
                                <td>: {{$data->anak_ke ? $data->anak_ke : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Nama Ayah</td>
                                <td>: {{$data->orangTuaKaryawan->ayah}}</td>
                            </tr>
                            <tr>
                                <td>Umur Ayah</td>
                                <td>: {{$data->orangTuaKaryawan->umur_ayah ? $data->orangTuaKaryawan->umur_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td>:  {{$data->orangTuaKaryawan->pekerjaan_ayah ? $data->orangTuaKaryawan->pekerjaan_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Alamat Ayah</td>
                                <td>:  {{$data->orangTuaKaryawan->alamat_ayah ? $data->orangTuaKaryawan->alamat_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>:  {{$data->orangTuaKaryawan->ibu}}</td>
                            </tr>
                            <tr>
                                <td>Umur Ibu</td>
                                <td>:  {{$data->orangTuaKaryawan->umur_ibu ? $data->orangTuaKaryawan->umur_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td>:  {{$data->orangTuaKaryawan->pekerjaan_ibu ? $data->orangTuaKaryawan->pekerjaan_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Alamat Ibu</td>
                                <td>:  {{$data->orangTuaKaryawan->alamat_ibu ? $data->orangTuaKaryawan->alamat_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <td>REFERENSI KERJA</td>
                                <td>: </td>
                            </tr>


                    </table>
                </div>

                <div class="subtitle">
                    <p>TANGGUNGAN KARYAWAN</p>
                </div>
                <div class="table-responsive">
                    <table class="table-bordered " border="">
                        <thead>
                            <tr>
                                <th class="text-center no">No.</th>
                                <th class="text-center nama">Nama</th>
                                <th class="text-center hubungan">Hubungan</th>
                                <th class="text-center">Tempat/ Tanggal Lahir</th>
                                <th class="text-center gender">Jenis Kelamin</th>
                                <th class="text-center pendidikan">Pendidikan</th>
                                <th class="text-center">Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->tanggunganKaryawan->isEmpty())
                                <tr>
                                    <td class="text-center no">1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @else
                                @foreach ($data->tanggunganKaryawan as $item)
                                    <tr>
                                        <td class="text-center no">{{$loop->iteration}}.</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->hubungan == 'istri' ? ($item->gender == 'L' ? 'Suami' : 'Istri') :'Anak' }}</td>
                                        <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                        <td>{{$item->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                        <td>{{$item->pendidikan}}</td>
                                        <td>{{$item->Pekerjaan}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="subtitle">
                    <p>PENGALAMAN KERJA</p>
                </div>
                <div class="table-responsive">
                    <table class="table-bordered " border="">
                        <thead>
                        <tr>
                            <th class="text-center no">No.</th>
                            <th class="text-center tahun">Tahun</th>
                            <th class="text-center hubungan">Pekerjaan</th>

                        </tr>
                        </thead>
                        <tbody>
                            @if ($data->pengalaman->isEmpty())
                                <tr class="text-center">
                                    <td class="text-center no">1</td>
                                    <td class="text-center"></td>
                                    <td></td>
                                </tr>
                            @else
                                @foreach ($data->pengalaman as $item)
                                    <tr>
                                        <td class="text-center no">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$item->tahun}}</td>
                                        <td>{{$item->pengalaman_kerja}}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>

                <p>Demikian data ini saya buat dengan sebenar-benarnya.</p>

                <div class="ttd-container">
                    <div class="ttd-fild">
                        <p>Malang, {{ date('j \\ F Y', strtotime(now()->format('d-m-Y')))}} </p>
                        <br><br><br><br><br>
                        <p>{{$data->nama}}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
