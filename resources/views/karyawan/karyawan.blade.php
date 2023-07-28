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
                    <div class="card-title">
                        <span>Karyawan list</span>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                    <table id="example1" class="table table-hover text-nowrap  table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>NO.</th>
                        <th>No. KTP</th>
                        <th>No. Induk Kerja</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Departemen</th>
                        <th>Posisi</th>
                        <th>TMT</th>
                        <th>last Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawans as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$item->nomor_ktp}}</td>
                            <td>
                                @if ($item->jobDesc)
                                    {{$item->jobDesc->no_induk_kerja}}
                                @else
                                    null
                                @endif
                            </td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                            <td>
                                @if ($item->jobDesc)
                                    {{$item->jobDesc->departement->nama}}
                                @else
                                    null
                                @endif
                            </td>
                            <td>
                                @if ($item->jobDesc)
                                    {{$item->jobDesc->posisi}}
                                @else
                                    null
                                @endif
                            </td>
                            <td>
                                @if ($item->jobDesc)
                                    {{date('j \\ F Y', strtotime($item->jobDesc->TMT))}}
                                @else
                                    null
                                @endif
                            </td>
                            <td>{{$item->updated_at->format('Y-m-d')}}</td>
                            <td class="d-flex w-auto flex-wrap justify-content-center ">
                                <a href="{{ route('karyawan.show', ['karyawan'=>$item->id]) }}" class="btn-sm bg-info mx-2 m-sm-2"><i class="fas fa-eye"></i> Lihat</a>
                                <a href="{{ route('karyawan.edit', ['karyawan'=> $item->id]) }}" class="btn-sm bg-success mx-2 m-sm-2"><i class="fas fa-edit"></i> Edit</a>

                                <form action="{{ route('karyawan.destroy', ['karyawan' => $item->id]) }}" method="POST">
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
</section>

@endsection


@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
         "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });
    });
  </script>
@endsection
