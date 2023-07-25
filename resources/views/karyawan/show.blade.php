@extends('layout.navigate')


@section('title', 'detail karyawan')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('/') }}assets/images/gatra-mapan-logo.png" class="p-2 bg-white rounded-sm img-fluid" alt="">
                    </div>
                    <!-- card-header -->
                    <div class="card-body">
                        <div class="col-md-9">
                          <div class="card-body p-2">
                              <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                  <h5><strong>IDENTITAS KARYAWAN</strong></h5>
                                  <div class="btn-conta">
                                      <a href="{{ route('karyawan.edit', ['karyawan'=> $karyawan->id]) }}" class="btn bg-success mx-2 m-sm-2"><i class="fas fa-edit"></i> Print Biodata Aplication</a>
                                      <a href="{{ route('karyawan.edit', ['karyawan'=> $karyawan->id]) }}" class="btn bg-secondary mx-2 m-sm-2"><i class="fas fa-edit"></i> Print Kelengakapan Dokumen</a>
                                      <a href="{{ route('karyawan.edit', ['karyawan'=> $karyawan->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit Identitas</a>
                                    </div>
                              </div>
                              <div class="d-flex flex-column flex-md-row row pt-1">
                                <div class="col-6 mb-3">
                                  <h6>No. KTP</h6>
                                  <p class="text-muted">{{$karyawan->nomor_ktp}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Nama</h6>
                                  <p class="text-muted">{{$karyawan->nama}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Tanggal Lahir</h6>
                                  <p class="text-muted">{{$karyawan->tanggal_lahir}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Jenis Kelamin</h6>
                                  <p class="text-muted">{{$karyawan->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Agama</h6>
                                  <p class="text-muted">{{$karyawan->agama}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Kewarganegaraan</h6>
                                  <p class="text-muted">{{$karyawan->kewarganegaraan}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Golongan Darah</h6>
                                  <p class="text-muted">{{$karyawan->golongan_darah}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>No. HP</h6>
                                  <p class="text-muted">{{$karyawan->phone}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Alamat</h6>
                                  <p class="text-muted">{{$karyawan->alamat}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Anak Ke-</h6>
                                  <p class="text-muted">{{$karyawan->anak_ke}}</p>
                                </div>

                                {{-- oreang tua karyawan --}}
                                <div class="col-6 mb-3">
                                  <h6>Nama Ayah</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->ayah}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Nama Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->ibu}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Umur Ayah</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->umur_ayah}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Umur Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->umur_ibu}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Alamat Ayah</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->alamat_ayah}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Alamat Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->alamat_ibu}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Pekerjaan Ayah</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->pekerjaan_ayah}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Pekerjaan Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->pekerjaan_ibu}}</p>
                                </div>
                              </div>

                              <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>DATA KERJA KARYAWAN</strong></h5>

                                @if ($karyawan->jobDesc)
                                <a href="{{ route('job-data.edit', ['id'=>$karyawan->id, 'job_datum'=> $karyawan->jobDesc->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i>
                                    Edit data kerja
                                </a>
                                @else
                                <a href="{{ route('job-data.create', ['id'=>$karyawan->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i>
                                    input data kerja
                                </a>
                                @endif
                              </div>
                              <div class="d-flex flex-column flex-md-row row pt-1">
                                <div class="col-6 mb-3">
                                  <h6>No. Induk Kerja</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->jobDesc)
                                        {{$karyawan->jobDesc->no_induk_kerja}}
                                    @else
                                        null
                                    @endif
                                  </p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Departemen</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->jobDesc)
                                        {{$karyawan->jobDesc->departement->nama}}
                                    @else
                                        null
                                    @endif
                                  </p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Posisi</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->jobDesc)
                                        {{$karyawan->jobDesc->posisi}}
                                    @else
                                        null
                                    @endif
                                  </p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>TMT (Tanggal Masuk Pertama)</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->jobDesc)
                                        {{date('j \\ F Y', strtotime($karyawan->jobDesc->TMT))}}
                                        {{-- {{$karyawan->jobDesc->TMT}} --}}
                                    @else
                                        null
                                    @endif
                                  </p>
                                </div>
                              </div>

                              <div class="pekerjaan"></div>
                              <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TANGGUNGAN KARYAWAN</strong></h5>
                                <a href="{{ route('tanggungan.create', ['id'=>$karyawan->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit Tanggungan</a>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                  <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">No.</th>
                                        <th>Nama</th>
                                        <th>Hubungan</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Pekerjaan</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($karyawan->tanggunganKaryawan as $item)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->hubungan == 'istri' ? ($item->gender == 'L' ? 'Suami' : 'Istri') :'Anak' }}</td>
                                            <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                            <td>{{$item->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                            <td>{{$item->pendidikan}}</td>
                                            <td>{{$item->Pekerjaan}}</td>
                                            <td class="d-flex w-auto flex-wrap justify-content-center ">
                                                <a href="{{ route('tanggungan.edit', ['id' => $karyawan->id,'tanggungan'=> $item->id]) }}" class="btn-sm bg-success mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('tanggungan.destroy', ['id'=> $karyawan->id ,'tanggungan' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm bg-danger mx-2 m-sm-2 border-0" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                  </tbody>
                                </table>
                              </div>
                              <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>PENGALAMAN KERJA</strong></h5>
                                <a href="{{ route('pengalaman.create', ['id'=>$karyawan->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit Pengalaman</a>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped mb-3 text-center">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 20%;">Tahun</th>
                                    <th>Pekerjaan</th>
                                    <th style="width: 15rem;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan->pengalaman as $item)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->tahun}}</td>
                                            <td>{{$item->pengalaman_kerja}}</td>
                                            <td class="d-flex w-auto flex-wrap justify-content-center ">
                                                <a href="{{ route('pengalaman.edit', [ 'id' => $karyawan->id,'pengalaman'=> $item->id]) }}" class="btn-sm bg-success mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('pengalaman.destroy', ['id'=> $karyawan->id ,'pengalaman' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm bg-danger mx-2 m-sm-2 border-0" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                              <h5><strong>LAMPIRAN</strong></h5>
                              <a href="" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit Lampiran</a>
                            </div>
                            <div class="row">
                              <div class="col-sm-6 col-md-5">
                                <div class="thumbnail m-2 rounded-lg" style="border: 5px solid black;">
                                  <div class="img">
                                    <img src="../images/Logo-Gatra.png" class="img-fluid" alt="">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-5">
                                <div class="thumbnail m-2 rounded-lg" style="border: 5px solid black;">
                                  <div class="img">
                                    <img src="../images/Logo-Gatra.png" class="img-fluid" alt="">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-5">
                                <div class="thumbnail m-2 rounded-lg" style="border: 5px solid black;">
                                  <div class="img">
                                    <img src="../images/Logo-Gatra.png" class="img-fluid" alt="">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-5">
                                <div class="thumbnail m-2 rounded-lg" style="border: 5px solid black;">
                                  <div class="img">
                                    <img src="../images/Logo-Gatra.png" class="img-fluid" alt="">
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                          <!-- ./col-md -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</section>
@endsection
