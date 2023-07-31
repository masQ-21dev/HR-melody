@extends('layout.navigate')


@section('title', 'detail karyawan')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <div>{{$message}}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
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
                                      <a href="{{ route('aplication', ['id'=> $karyawan->id]) }}" class="btn bg-success mx-2 m-sm-2"><i class="fas fa-edit"></i> Print Aplication</a>
                                      <a href="{{ route('lampiran', ['id'=> $karyawan->id]) }}" class="btn bg-secondary mx-2 m-sm-2"><i class="fas fa-edit"></i> Print Lampran</a>
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
                                  <h6>Tempat, Tanggal Lahir</h6>
                                  <p class="text-muted">{{$karyawan->tempat_lahir}}, {{$karyawan->tanggal_lahir}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Jenis Kelamin</h6>
                                  <p class="text-muted">{{$karyawan->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Agama</h6>
                                  <p class="text-muted">{{$karyawan->agama != 'null' ? $karyawan->agama : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Kewarganegaraan</h6>
                                  <p class="text-muted">{{$karyawan->kewarganegaraan ? $karyawan->kewarganegaraan : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Golongan Darah</h6>
                                  <p class="text-muted">{{$karyawan->golongan_darah != 'null' ? $karyawan->golongan_darah : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>No. HP</h6>
                                  <p class="text-muted">{{$karyawan->phone ? $karyawan->phone : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Alamat</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->alamat)
                                        {{$karyawan->alamat->jalan ? $karyawan->alamat->jalan : '-' }}
                                        RT {{$karyawan->alamat->rt ? $karyawan->alamat->rt : '-'}}
                                        / RW {{$karyawan->alamat->rw ? $karyawan->alamat->rw : '-'}},
                                        {{$karyawan->alamat->desa ? $karyawan->alamat->desa : '-'}},
                                        {{$karyawan->alamat->kecamatan ? $karyawan->alamat->kecamatan : '-'}},
                                        {{$karyawan->alamat->kabupaten ? $karyawan->alamat->kabupaten : '-'}},
                                        {{$karyawan->alamat->provinsi ? $karyawan->alamat->provinsi : '-'}}
                                    @else
                                    -
                                    @endif
                                  </p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Anak Ke-</h6>
                                  <p class="text-muted">{{$karyawan->anak_ke ? $karyawan->anak_ke : '-'}}</p>
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
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->umur_ayah ? $karyawan->orangTuaKaryawan->umur_ayah : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Umur Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->umur_ibu ? $karyawan->orangTuaKaryawan->umur_ibu : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Alamat Ayah</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->alamat_ayah ? $karyawan->orangTuaKaryawan->alamat_ayah : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Alamat Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->alamat_ibu ? $karyawan->orangTuaKaryawan->alamat_ibu : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Pekerjaan Ayah</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->pekerjaan_ayah ? $karyawan->orangTuaKaryawan->pekerjaan_ayah : '-'}}</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Pekerjaan Ibu</h6>
                                  <p class="text-muted">{{$karyawan->orangTuaKaryawan->pekerjaan_ibu ? $karyawan->orangTuaKaryawan->pekerjaan_ibu : '-'}}</p>
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
                                        -
                                    @endif
                                  </p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Departemen</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->jobDesc)
                                        {{$karyawan->jobDesc->departement->nama}}
                                    @else
                                        -
                                    @endif
                                  </p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Posisi</h6>
                                  <p class="text-muted">
                                    @if ($karyawan->jobDesc)
                                        {{$karyawan->jobDesc->posisi}}
                                    @else
                                        -
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
                                        -
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
                              @if ($karyawan->lampiran)
                              <a href="{{ route('lampiran.edit', ['id'=>$karyawan->id, 'lampiran'=> $karyawan->lampiran->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i>
                                  Edit lampiran
                              </a>
                              @else
                              <a href="{{ route('lampiran.create', ['id'=>$karyawan->id]) }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i>
                                  input Lampiran
                              </a>
                              @endif

                            </div>
                            <div class="row">
                                {{-- foto karyawan --}}
                                <div class="col-sm-10 col-md-5 mx-auto">
                                    <label for="">Foto Karyawan</label>
                                  <div class="m-2 rounded-lg" style=" width: 100%;">
                                    <div class="img relative ratio  border-5" style="aspect-ratio: 1.5/2; border:black solid;">
                                        @if ($karyawan->lampiran &&$karyawan->lampiran->foto_karyawan)
                                            <img src="{{ asset('storage/foto-karyawan/'.$karyawan->lampiran->foto_karyawan) }}" style="object-fit: contain; border:black solid;" class=" img-bordered" alt="">
                                        @else
                                         <span class="absolute font-weight-bold text-danger" style="bottom: 0px left:50%;">Foto Karyawan Tidak DI temukan</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>


                                {{-- KTP --}}
                                <div class="col-sm-10 col-md-5 mx-auto mt-3">
                                    <label for="">Kartu Tanda Penduduk (KTP)</label>
                                  <div class="m-2 rounded-lg" style=" width: 100%;">
                                    <div class="img relative ratio ratio-4x3  border-5" style="width: inherit; border:black solid">
                                        @if ($karyawan->lampiran && $karyawan->lampiran->ktp)
                                            <img src="{{ asset('storage/KTP/'.$karyawan->lampiran->ktp) }}" style="width: inherit;  border:black solid;" class=" object-fit-none border-5" alt="">
                                        @else
                                         <span class="absolute font-weight-bold text-danger" style="bottom: 0px left:50%;">KTP Tidak DI temukan</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>

                                {{-- jamsostek --}}
                                <div class="col-sm-10 col-md-5 mx-auto mt-3">
                                    <label for="">Kartu Jaminan Sosial Tenaga Kerja (jamsostek)</label>
                                  <div class="m-2 rounded-lg" style=" width: 100%;">
                                    <div class="img relative ratio ratio-4x3  border-5" style="width: inherit; border:black solid">
                                        @if ($karyawan->lampiran &&$karyawan->lampiran->jamsostek)
                                            <img src="{{ asset('storage/jamsostek/'.$karyawan->lampiran->jamsostek) }}" style="height: 100%;  border:black solid;" class=" object-fit-none border-5" alt="">
                                        @else
                                         <span class="absolute font-weight-bold text-danger" style="bottom: 0px left:50%;">Jamsostek Tidak DI temukan</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>

                                {{-- id-card --}}
                                <div class="col-sm-10 col-md-5 mx-auto mt-3">
                                    <label for="">id card</label>
                                  <div class="m-2 rounded-lg" style=" width: 100%;">
                                    <div class="img relative ratio   border-5" style=" border:black solid; aspect-ratio: 1.5/2;">
                                        @if ($karyawan->lampiran &&$karyawan->lampiran->id_card)
                                            <img src="{{ asset('storage/id-card/'.$karyawan->lampiran->id_card) }}" style="object-fit: contain;" class=" img-bordered" alt="" alt="">
                                        @else
                                         <span class="absolute font-weight-bold text-danger" style="bottom: 0px left:50%;">id card Tidak DI temukan</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>

                                {{-- jpk --}}
                                <div class="col-sm-10 col-md-5 mx-auto mt-3">
                                    <label for="">Kartu JPK</label>
                                  <div class="m-2 rounded-lg" style=" width: 100%;">
                                    <div class="img absolute ratio ratio-4x3  border-5" style="width: inherit; border:black solid">
                                        @if ($karyawan->lampiran &&$karyawan->lampiran->jpk)
                                            <img src="{{ asset('storage/jpk/'.$karyawan->lampiran->jpk) }}" style="width: inherit;  border:black solid;" class=" object-fit-none border-5" alt="">
                                        @else
                                         <span class="relative font-weight-bold text-danger" style="bottom: 0px left:50%;">JPK Tidak DI temukan</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                {{-- KK --}}
                                <div class="col-sm-10 col-md-5 mx-auto mt-3">
                                    <label for="">Kartu Keluarga</label>
                                  <div class="m-2 rounded-lg" style=" width: 100%;">
                                    <div class="img absolute ratio ratio-4x3  border-5" style="width: inherit; border:black solid">
                                        @if ($karyawan->lampiran && $karyawan->lampiran->kk)
                                            <img src="{{ asset('storage/kk/'.$karyawan->lampiran->kk) }}" style="width: inherit;  border:black solid;" class=" object-fit-none border-5" alt="">
                                        @else
                                         <span class="relative font-weight-bold text-danger" style="bottom: 0px left:50%;">JPK Tidak DI temukan</span>
                                        @endif
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
