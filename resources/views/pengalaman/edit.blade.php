@extends('layout.navigate')


@section('title', 'edit pengalaman karyawan')

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
                        <form action="{{ route('pengalaman.update', ['id'=>$id, 'pengalaman' => $data->id]) }}" method="POST" class="card-body p-2">
                            @csrf
                            @method('PUT')
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TAMBAH PENGALAMAN KARYAWAN</strong></h5>
                            </div>
                            <div class="data-diri d-flex flex-column flex-md-row row pt-1">
                                <div class="main col-6 mb-3">
                                    <label for="tahun" class="required">Tahun</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="number" min="1900" max="2100" maxlength="4" minlength="4" required placeholder="Ex: 1998" name="tahun" value="{{$data->tahun}}">
                                </div>
                                <div class="col-6 mb-5">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" id="form6Example3" class="form-control p-3 bg-gray-light"
                                    placeholder="Ex : Karyawan" name="pengalaman_kerja" value="{{$data->pengalaman_kerja}}"/>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary px-5 p-3 font-weight-bold">Ubah</button>
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
