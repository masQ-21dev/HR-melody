@extends('layout.navigate')

@section('title', 'Tambah User')

@section('content')
<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
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


                        <form action="{{ route('user.store') }}" method="POST" class="card-body p-2">
                            @csrf
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TAMBAH USER AKUN</strong></h5>
                            </div>
                            <div class="data-diri  pt-1">
                                <div class="main col-6 mb-3">
                                    <label for="nama" class="required">Username<span class="text-danger">*</span></label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="text" required placeholder="Ex: test" name="username">
                                </div>
                                <div class="main col-6 mb-3">
                                    <label for="email" class="required">Email<span class="text-danger">*</span></label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="email" required placeholder="Ex: user@mail.com" name="email">
                                </div>
                                <div class="main col-6 mb-3">
                                    <label for="password" class="required">password<span class="text-danger">*</span></label>
                                    <input class="yearpicker form-control p-3 bg-gray-light" type="password" id="password" required placeholder="Ex: pass123" name="password">
                                    <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="role_id" class="required">Role<span class="text-danger">*</span></label>
                                    <select class="form-control bg-gray-light" name="role_id" required>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
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
<script>
    const togglePassword = document.querySelector('.toggle-password');
    const pass = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
        pass.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endsection
