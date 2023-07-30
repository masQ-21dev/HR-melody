<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAPEG | LAMPIRAN {{$data->nama}}</title>



    <link rel="stylesheet" href="{{public_path('/assets/css/lampiran.css')}}">
</head>
<body>
    <main class="main-container">
        <div class="card-body">
            <div class="card-foto">
                <img class="img-contet" src="{{public_path('/storage/foto-karyawan/'.($data->lampiran ? $data->lampiran->foto_karyawan : 'none.jpg') )}}" alt="">
            </div>
            <img src="{{ public_path('/assets/images/hr-logo.png')}}" class="logo" alt="">

            <div class="data-container">
                <div class="text-title">
                    <p><strong>KELENGKAPAN DATA DOKUMEN</strong></p>
                    <span ><strong class="border_buttom">KARYAWAN PT. GATRA MAPAN
                        MALANG</strong></span>
                </div>

                <div class="subtitle">
                    <p>TANGGUNGAN KARYAWAN</p>
                </div>
                <table class="table-no-border">
                    <tr>
                        <td class="first-col">Nama</td>
                        <td>: {{$data->nama}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: {{$data->jobDesc ? $data->jobDesc->no_induk_kerja : '-'}}</td>
                    </tr>
                    <tr>
                        <td>TMT</td>
                        <td>: {{$data->jobDesc ? date('j \\ F Y', strtotime($data->jobDesc->TMT)) : '-'}}</td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td>: {{$data->jobDesc ? $data->jobDesc->posisi : '-'}}</td>
                    </tr>
                    <tr>
                        <td>Departemen</td>
                        <td>: {{$data->jobDesc ? $data->jobDesc->departement->nama : '-'}}</td>
                    </tr>
                </table>

                <div class="subtitle">
                    <p>TANGGUNGAN KARYAWAN</p>
                </div>
                <div class="table-responsive">
                    <table class="table-bordered " border >
                        <tr>
                            <td class="col1-2 ">
                                <span class="card-title">1. Kartu Tanda Penduduk</span>
                                <div class="card-container">
                                    <img class="img-contet" src="{{public_path('/storage/KTP/'.($data->lampiran ? $data->lampiran->ktp : 'none.jpg') )}}" alt="">
                                </div>
                            </td>
                            <td class="col1-2 ">
                                <span class="card-title">2. Kartu Jamsostek</span>
                                <div class="card-container">
                                    <img class="img-contet" src="{{public_path('/storage/jamsostek/'.($data->lampiran ? $data->lampiran->jamsostek : 'none.jpg') )}}" alt="">

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1-2 ">
                                <span class="card-title">3. Id Card</span>
                                <div class="card-container-id">
                                    <img class="img-contet" src="{{public_path('/storage/id-card/'.($data->lampiran ? $data->lampiran->id_card : 'none.jpg') )}}" alt="">

                                </div>
                            </td>
                            <td class="col1-2 " rowspan="2">
                                <span class="card-title">4. Kartu JPK</span>
                                <div class="card-container">
                                    <img class="img-contet" src="{{public_path('/storage/jpk/'.($data->lampiran ? $data->lampiran->jpk : 'none.jpg') )}}" alt="">
                                </div>
                                <div class="ttd-container" >
                                    <div class="ttd-fild">
                                        <p>Malang, {{ date('j \\ F Y', strtotime(now()->format('d-m-Y')))}} </p>
                                        <br><br><br><br><br><br>
                                        <p>{{$data->nama}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1-2">
                                <div class="catatan">
                                    <p class="mb-0">Catatan :</p>
                                    <ol>
                                      <li>Kelengkapan data ini disertai pelengkap FC Kartu Keluarga sebagaimana terlampir</li>
                                      <li>Data ini akan dilakukan secara berkala setiap ..... Tahun</li>
                                      <li>Kelengkapan data ini telah dilakukan Verifikasi oleh Dept SDM</li>
                                    </ol>
                                    <table class="footnote" border>
                                      <thead>
                                        <tr>
                                          <th class="">No</th>
                                          <th class="">Keterangan</th>
                                          <th class="">Cek *)</th>
                                          <th class="">Paraf Ptgs</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="number">1</td>
                                          <td>Update data tanggal {{$data->updated_at->format('Y-m-d')}}</td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td class="number">2</td>
                                          <td>Masuk dalam Personal File (PF)</td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td class="number">3</td>
                                          <td>Arsip Bank Data Karyawan</td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <p class="keterangan">*) Berikan Tanda cawang ( ) dan berikan paraf apabila sudah dilakukan proses pemeriksaan.</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </main>

    <section class="main-container">
        <div class="card-body">
            <img src="{{ public_path('/assets/images/hr-logo.png')}}" alt="" class="logo">

            <div class="kk-container">
                <span class="card-title">5. Kartu Keluarga</span>
                <div class="card-kk">
                    {{-- {{$data->lampiran ? $data->lampiran->kk : 'none.jpg'}} --}}
                    <img class="img-contet" src="{{public_path('/storage/kk/'.($data->lampiran ? $data->lampiran->kk : 'none.jpg') )}}" alt="">
                    {{-- <img class="img-contet" src="{{public_path('/storage/kk/'.$data->lampiran->kk )}}" alt=""> --}}
                </div>
            </div>
        </div>
    </section>


</body>
</html>
