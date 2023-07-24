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
                        <div class="col-md-10">
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>PENGALAMAN KARYAWAN</strong></h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-3 text-center">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">No.</th>
                                        <th>Nama Departemen</th>
                                        <th style="width: 20%">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)

                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td class="text-center">{{$item->nama}}</td>
                                                <td class="d-flex w-auto flex-wrap justify-content-center ">
                                                    <a href="{{ route('deparatement.edit', ['deparatement'=>$item->id]) }}" class="btn-sm bg-info mx-2 m-sm-2"><i class="fas fa-eye"></i> Edit</a>
                                                    <form action="{{ route('deparatement.destroy', [ 'deparatement'=> $item->id]) }}" method="POST">
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
                            <div class="form-group d-flex justify-content-start">
                                <a href="{{ route('home') }}" class="btn btn-success px-5 p-3 font-weight-bold">Simpan</a>
                            </div>

                        <form action="{{ route('deparatement.store') }}" method="POST" class="card-body p-2">
                            @csrf
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TAMBAH PENGALAMAN KARYAWAN</strong></h5>
                            </div>
                            <div class="data-diri d-flex flex-column justify-content-center flex-md-row row pt-1">
                                <div class="main col-6 mb-3">
                                    <label for="nama" class="required">Nama Departemen</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="text" required placeholder="Ex: Produksi" name="nama">
                                </div>
                                {{-- <div class="col-6 mb-5">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" id="form6Example3" class="form-control p-3 bg-gray-light"
                                    placeholder="Ex : Karyawan" name="pengalaman_kerja"/>
                                </div> --}}
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary px-5 p-3 font-weight-bold">Tambah</button>
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
