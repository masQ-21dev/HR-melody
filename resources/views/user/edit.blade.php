@extends('layout.navigate')

@section('title', 'Edit User')

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


                        <form action="{{ route('user.update', ['user' =>$data->id])}}" method="POST" class="card-body p-2">
                            @csrf
                            @method('PUT')
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TAMBAH PENGALAMAN KARYAWAN</strong></h5>
                            </div>
                            <div class="data-diri  pt-1">
                                <div class="main col-6 mb-3">
                                    <label for="nama" class="required">Username</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="text" required placeholder="Ex: Produksi" name="username" value="{{$data->username}}">
                                </div>
                                <div class="main col-6 mb-3">
                                    <label for="email" class="required">Email</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="email" required placeholder="Ex: user@mail.com" name="email" value="{{$data->email}}">
                                </div>
                                <div class="main col-6 mb-3">
                                    <label for="password" class="required">default password = password</label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="password" required placeholder="Ex: pass123" name="password" value="password" >
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="role_id" class="required">Role</label>
                                    <select class="form-control bg-gray-light" name="role_id" required>
                                        <option value="1" {{$data->role_id == '1' ? 'Selected' : '' }}>Super Admin</option>
                                        <option value="2" {{$data->role_id == '2' ? 'Selected' : '' }}>Admin</option>
                                        {{-- <option value="3">Super Admin</option> --}}
                                    </select>
                                </div>

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
