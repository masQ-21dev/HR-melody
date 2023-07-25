@extends('layout.navigate')

@section('title', 'input data kerja karyawan')

@section('content')

{{$data}}
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


                        <form action="{{ route('job-data.update', ['id'=>$id, 'job_datum' => $data->id]) }}" method="POST" class="card-body p-2">
                            @csrf
                            @method('PUT')
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>UBAH DATA KERJA KARYAWAN</strong></h5>
                            </div>
                            <div class="data-diri  pt-1">
                                <div class="main col-6 mb-3">
                                    <label for="no_induk_kerja" class="required">Nomor Induk Kerja</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="text" required placeholder="Ex: 90066/90" name="no_induk_kerja" value="{{$data->no_induk_kerja}}">
                                </div>
                                <div class="main col-6 mb-3">
                                    <label for="TMT" class="required">TMT (Tanggal Masuk Pertama)</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="date" required placeholder="Ex: 2002/09/01" name="TMT" value="{{$data->TMT}}">
                                </div>
                                <div class="main col-6 mb-3">
                                    <label for="posisi" class="required">Bidang Atau Posisi</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="text" required placeholder="Ex: potong 02" name="posisi" value="{{$data->possis}}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="id_departement" class="required">Role</label>
                                    <select class="form-control bg-gray-light" name="id_departement" required>
                                        @foreach ($departement as $item)
                                            <option value="{{$item->id}}" {{$item->id == $data->id_departement ? 'Selected' : ''}}>{{$item->nama}}</option>
                                        @endforeach
                                        {{-- <option value="3">Super Admin</option> --}}
                                    </select>
                                </div>

                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary px-5 p-3 font-weight-bold">Simpan</button>
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

@section('script')

@endsection
