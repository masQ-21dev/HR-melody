@extends('layout.main')

@section('title', 'print Aplication')

@section('content')
<main style="font-size: 10px;">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- card-body -->
                <div class="card-body">
                    <img src="{{ asset('/') }}assets/images/hr-logo.png" class="p-2 bg-white rounded-sm img-fluid" alt="">
                    <div class="col-md-9">
                      <div class="card-body p-2">
                        <h5 class="text-center"><strong>BIO DATA APPLICANT</strong></h5>

                          <table class="table table-sm no-border table-borderless">
                            <tr>
                                <td>Nama</td>
                                <td>: {{$data->nama}}</td>
                            </tr>
                            <tr>
                                <td>No. KTP</td>
                                <td>: {{$data->nama}}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>: Malang</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:{{$data->tanggal_lahir ? $data->tanggal_lahir : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <input type="checkbox" id="gender_laki" name="gender" value="Laki-laki" {{$data->gender == 'L' ? 'checked' : ''}}>
                                    <label class="mr-4 font-weight-normal" for="gender_laki">Laki-laki</label>

                                    <input type="checkbox" id="gender_perempuan" name="gender_perempuan" value="Perempuan" {{$data->gender == 'P' ? 'checked' : ''}}>
                                    <label class="font-weight-normal" for="gender_perempuan">Perempuan</label>
                                </td>
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
                          <div class="heading d-flex justify-content-between align-items-center mt-3">
                            <h5><strong>TANGGUNGAN KARYAWAN</strong></h5>
                          </div>
                          <div class="table-responsive" style="font-size: 10.5px">
                            <table class="table-bordered mb-4 w-100">
                              <thead>
                                <tr>
                                  <th class="text-center px-1 font-weight-normal">No.</th>
                                  <th class="text-center px-3 font-weight-normal">Nama</th>
                                  <th class="text-center px-2 font-weight-normal">Hubungan</th>
                                  <th class="text-center px-4 font-weight-normal">Tempat/ Tanggal Lahir</th>
                                  <th class="text-center px-2 font-weight-normal">Jenis Kelamin</th>
                                  <th class="text-center px-2 font-weight-normal">Pendidikan</th>
                                  <th class="text-center px-5 font-weight-normal">Pekerjaan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if ($data->tanggunganKaryawan->isEmpty())
                                    <tr class="text-center">
                                        <td class="text-center">1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                    @foreach ($data->tanggunganKaryawan as $item)
                                        <tr class="">
                                            <td class="text-center">{{$loop->iteration}}</td>
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
                          <div class="heading d-flex justify-content-between align-items-center mt-3">
                            <h5><strong>PENGALAMAN KERJA</strong></h5>
                        </div>
                        <div class="" style="font-size: 10.5px">
                          <table class="table-bordered mb-3 text-center w-100">
                            <thead>
                                <tr>
                                    <th class="text-center font-weight-normal px-1">No.</th>
                                    <th class="text-center font-weight-normal px-4">Tahun</th>
                                    <th class="text-center font-weight-normal w-100">Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data->pengalaman->isEmpty())
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                    @foreach ($data->pengalaman as $item)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->tahun}}</td>
                                            <td>{{$item->pengalaman_kerja}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                          </table>
                        </div>
                        <!-- table-responsive -->
                        <p>Demikian data ini saya buat dengan sebenar-benarnya.</p>
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col">

                            </div>
                            <div class="col">
                                <p>Malang, .......................</p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">

                            </div>
                            <div class="col">

                            </div>
                            <div class="col">
                                <p>Sugiono</p>
                            </div>
                        </div>
                      </div>
                    </div>
                      <!-- ./col-md -->
                </div>
            </div>
            </div>
            <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </section>
</main>
@endsection
