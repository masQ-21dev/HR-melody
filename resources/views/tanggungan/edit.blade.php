@extends('layout.navigate')

@section('title', 'edit tanggungan karyawan')


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
                        <div class="col-md-10">

                        <form action="{{ route('tanggungan.update', ['id'=>$id, 'tanggungan' => $data->id]) }}" method="POST" class="card-body p-2">
                            @csrf
                            @method('PUT')
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TAMBAH TANGGUNGAN KARYAWAN</strong></h5>
                            </div>
                                <div class="data-diri d-flex flex-column flex-md-row row pt-1">
                                <div class="col-6 mb-3">
                                    <label for="nama" class="required">Nama<span class="text-danger">*</span></label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : User1" name="nama" value="{{$data->nama}}"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="hubungan" class="required">Hubungan<span class="text-danger">*</span></label>
                                    <select class="form-control bg-gray-light" name="hubungan" required>
                                        {{-- <option value="Suami" {{$data->hubungan == '' ? 'Selected' : ''}}>Suami</option> --}}
                                        <option value="Istri" {{$data->hubungan == 'Istri' ? 'Selected' : ''}}>Suami/Istri</option>
                                        <option value="Anak" {{$data->hubungan == 'anak' ? 'Selected' : ''}}>Anak</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="tempatlahir" class="required">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Malang" name="tempat_lahir" value="{{$data->tempat_lahir}}"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nik" class="required">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="date" class="form-control bg-gray-light" id="reservationtime"
                                        placeholder="01/01/2000" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nama" class="required">Jenis Kelamin<span class="text-danger">*</span></label>
                                    <div class="input-group mx-2">
                                        <div>
                                            <input type="radio" id="genderlaki" name="gender" value="L" {{$data->gender == 'L' ? 'checked' : ''}} required>
                                            <label for="genderlaki" class="font-weight-normal">Laki-laki</label>
                                        </div>
                                    </div>
                                    <div class="input-group mx-2">
                                        <div>
                                            <input type="radio" id="gender" name="gender" value="P"  {{$data->gender == 'P' ? 'checked' : ''}} required>
                                            <label for="gender" class="font-weight-normal">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : SMK" name="pendidikan" value="{{$data->pendidikan}}"/>
                                </div>
                                <div class="col-6 mb-5">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Karyawan" name="pekerjaan" value="{{$data->Pekerjaan}}"/>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary px-5 p-3 font-weight-bold">ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</section>
@endsection

@section("script")
 <script>

 </script>
@endsection
