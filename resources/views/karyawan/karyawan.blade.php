@extends('layout.navigate')

@section('title', 'karyawan')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <div class="card-img">
                    <img src="{{ asset('/') }}assets/images/gatra-mapan-logo.png" alt="">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>NO.</th>
                        <th>No. KTP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Departemen</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawans as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$item->nomor_ktp}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->gender}}</td>
                            <td>null</td>
                            <td class="d-flex w-auto flex-wrap justify-content-center ">
                                <a href="{{ route('karyawan.show', ['karyawan'=>$item->id]) }}" class="btn-sm bg-info mx-2 m-sm-2"><i class="fas fa-eye"></i> Lihat</a>
                                <a href="{{ route('karyawan.edit', ['karyawan'=> $item->id]) }}" class="btn-sm bg-success mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" href="{{ route('karyawan.destroy', ['karyawan'=>$item->id]) }}" class="btn-sm bg-danger mx-2 m-sm-2 border-0"><i class="fas fa-trash"></i> Hapus</button> --}}
                                <button type="submit" class="btn-sm bg-danger mx-2 m-sm-2 border-0"><i class="fas fa-trash"></i> Hapus</button>
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
</section>
    <h2>list karyawan</h2>

    <br>
    <table class="table">
        <thead>
            <tr>
                <td>NO</td>
                <td>No KTP</td>
                <td>nama</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nomor_ktp}}</td>
                    <td>{{$item->nama}}</td>
                    <td>
                        <a href="/karyawan/{{$item->id}}">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <a href="/{{$karyawans->id}}">detail</a> --}}
@endsection


@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
