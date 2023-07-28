@extends('layout.navigate')

@section('title', 'input dokumen lampiran')

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


                        <form action="{{ route('lampiran.store', ['id'=>$id]) }}" method="POST" class="card-body p-2 col-10" enctype="multipart/form-data">
                            @csrf
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>INPUT DATA LAMPIRAN KARYAWAN</strong></h5>
                            </div>
                            <div class="data-diri d-flex flex-column justify-content-center flex-md-row row pt-1">

                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Foto Karyawan</label>
                                        <input class="yearpicker form-control bg-gray-light" type="file" name="foto_karyawan"  value="">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Kartu Tanda Pengenal</label>
                                        <input class="yearpicker form-control bg-gray-light" type="file" name="ktp"  value="">
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">kartu Jaminan Sosila Tenaga Kerja (Jamsostek)</label>
                                        <input class="yearpicker form-control bg-gray-light" type="file" name="jamsostek"  value="">
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Kartu JPK (boleh BPJS)</label>
                                        <input class="yearpicker form-control bg-gray-light" type="file" name="jpk"  value="">
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Id Card Karyawan</label>
                                        <input class="yearpicker form-control bg-gray-light" type="file" name="id_card"  value="">
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Kartu Keluarga</label>
                                        <input class="yearpicker form-control bg-gray-light" type="file" name="kk"  value="">
                                    </div>


                            </div>
                            <div class="row px-3">
                                <div class="form-group d-flex justify-content-start">
                                    <button class="btn btn-primary px-5 p-3 font-weight-bold">Submit</button>
                                </div>
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
