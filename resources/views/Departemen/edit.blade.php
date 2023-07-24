@extends('layout.navigate')

@section('title', 'tambah departemen')

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
                        <form action="{{ route('deparatement.update', ['deparatement' => $data->id]) }}" method="POST" class="card-body p-2">
                            @csrf
                            @method('PUT')
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>EDIT NAMA DEPARTEMEN</strong></h5>
                            </div>
                            <div class="data-diri d-flex flex-column justify-content-center flex-md-row row pt-1">
                                <div class="main col-6 mb-3">
                                    <label for="nama" class="required">Nama Departemen</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="text" required placeholder="Ex: Produksi" name="nama" value="{{$data->nama}}">
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
