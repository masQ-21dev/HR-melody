@extends('layout.navigate')

@section('title', 'User List')

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
                                <h5><strong>DATA USER AKUN</strong></h5>
                                <a href="{{ route('user.create') }}" class="btn bg-info mx-2 m-sm-2"><i class="fas fa-edit"></i> Tambah User Akun</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-3 text-center">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">No.</th>
                                        <th>UserName</th>
                                        <th>email</th>
                                        <th style="width: 20%">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td class="text-center">{{$item->username}}</td>
                                                <td class="text-center">{{$item->email}}</td>
                                                <td class="d-flex w-auto flex-wrap justify-content-center ">
                                                    <a href="{{ route('user.edit', ['user'=>$item->id]) }}" class="btn-sm bg-info mx-2 m-sm-2"><i class="fas fa-eye"></i> Edit</a>
                                                    <form action="{{ route('user.destroy', [ 'user'=> $item->id]) }}" method="POST">
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
