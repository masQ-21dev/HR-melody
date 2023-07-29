@extends('layout.navigate')

@section('title', 'input data karyawan')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="../images/gatra-mapan-logo.png" class="p-2 bg-white rounded-sm img-fluid" alt="">
                    </div>
                    <!-- card-header -->
                    <div class="card-body">
                        <div class="col-md-9">
                          <form action="{{ route('karyawan.store') }}" method="POST" class="card-body p-2">
                            @csrf
                              <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                  <h5><strong>TAMBAH IDENTITAS KARYAWAN</strong></h5>
                              </div>
                              <div class="data-diri d-flex flex-column flex-md-row row pt-1">
                                <div class="col-6 mb-3">
                                    <label for="nomo_ktp" class="required">No. KTP</label>
                                    <input type="number" min="1" minlength="16" id="nomor_ktp" name="nomor_ktp" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : 1111222233334444"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nama" class="required">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : User1"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="tempat_lahir" class="required">Tempat Lahir</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded-4 p-3 bg-gray-light" id="tempat_lahir" name="tempat_lahir" placeholder="Ex. Malang" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="tanggal_lahir" class="required">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control bg-gray-light" id="tanggal_lahir" name="tanggal_lahir" placeholder="01/01/2000" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nama" class="required">Jenis Kelamin</label>
                                    <div class="input-group mx-2">
                                        <div>
                                            <input type="radio" id="laki_kali" name="gender" value="L" required>
                                            <label for="laki_laki" class="font-weight-normal">Laki-laki</label>
                                        </div>
                                    </div>
                                    <div class="input-group mx-2">
                                        <div>
                                            <input type="radio" id="perempuan" name="gender" value="P" required>
                                            <label for="perempuan" class="font-weight-normal">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="agama" class="required">Agama</label>
                                    <select class="form-control bg-gray-light" name="agama" required>
                                        <option value="null">pilih agama kepercayaan</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="kewarganegaraan" class="required">Kewarganegaraan</label>
                                    <input type="text" id="kewarganegaraan" class="form-control rounded-4 p-3 bg-gray-light"
                                    name="kewarganegaraan"
                                    placeholder="Ex : Indonesia"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="goldar" class="required">Golongan Darah</label>
                                    <select class="form-control bg-gray-light" name="golongan_darah" required>
                                        <option value="null">pilih golongan darah</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nohp" class="required">No. HP</label>
                                    <div>
                                        <input id="phone" class="form-control bg-gray-light rounded-4" type="tel" name="phone" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="heading d-flex justify-content-between mt-3">
                                        <h6>Alamat</h6>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="jalan" >Jalan</label>
                                        <div>
                                            <input id="jalan" class="form-control bg-gray-light rounded-4" placeholder="Ex: Jl. Mapan" type="text" name="jalan" />
                                        </div>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="rt">RT</label>
                                        <div>
                                            <input id="rt" class="form-control bg-gray-light rounded-4" placeholder="Ex: 02" type="text" name="rt" />
                                        </div>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="rw">RW</label>
                                        <div>
                                            <input id="rw" class="form-control bg-gray-light rounded-4" placeholder="Ex: 08" type="text" name="rw" />
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="kelurahan">Desa/Kelurahan</label>
                                        <div>
                                            <input id="kelurahan" class="form-control bg-gray-light rounded-4" placeholder="Ex: Pakisjajar" type="text" name="desa" />
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="kecamatan">Kecamatan</label>
                                        <div>
                                            <input id="kecamatan" class="form-control bg-gray-light rounded-4" placeholder="Ex: Pakis" type="text" name="kecamatan" />
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="kabupaten">Kota/Kabupaten</label>
                                        <div>
                                            <input id="kabupaten" class="form-control bg-gray-light rounded-4" placeholder="Ex: Malang" type="text" name="kabupaten" />
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="provinsi" class="required">Provinsi</label>
                                        <select class="form-control bg-gray-light" name="provinsi" required>
                                            <option value="null">pilih provinsi</option>
                                            @foreach ($provinsi as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row data-keluarga d-flex flex-column flex-md-row row pt-1">
                                <div class="heading d-flex justify-content-between mt-3">
                                    <h6>Data orang tua </h6>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-6 mb-3"> --}}
                                <div class="col-7 mb-3">
                                    <label for="anakke" class="required">Anak Ke-</label>
                                    <input type="number" min="1" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : 4"
                                    name="anak_ke"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="namaayah" class="required">Nama Ayah</label>
                                    <input type="text" id="ayah" name="ayah" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Nama ayah"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="namaibu" class="required">Nama Ibu</label>
                                    <input type="text" id="ibu" name="ibu" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Nama Ibu"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="umurayah">Umur Ayah</label>
                                    <input type="number" min="1" id="umur_ayah" name="umur_ayah" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : 50"/>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="umuribu">Umur Ibu</label>
                                    <input type="number" min="1" id="umur_ibu" name="umur_ibu" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : 35"/>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="pekerjaanayah">Pekerjaan Ayah</label>
                                    <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : PNS"/>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="pekerjaanibu">Pekerjaan Ibu</label>
                                    <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Ibu Rumah Tangga"/>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="alamatayah">Alamat Ayah</label>
                                    <textarea name="alamat_ayah" class="form-control bg-gray-light" cols="5" rows="5" placeholder="Ex: Surya Citra Estate"></textarea>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="alamatibu">Alamat Ibu</label>
                                    <textarea name="alamat_ibu" class="form-control bg-gray-light" cols="5" rows="5" placeholder="Ex: Surya Citra Estate"></textarea>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary px-5 p-3 font-weight-bold">Submit</button>
                            </div>
                        </form>
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
