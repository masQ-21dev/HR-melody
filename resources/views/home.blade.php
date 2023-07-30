@extends('layout.navigate')

@section("title", 'home')

@section("content")

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <div>{{$message}}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
{{--
    <h3>anda login denga akun {{Auth::user()->username}}</h3>
    <h4>sebai role {{ Auth::user()->role->role_name}}</h4> --}}
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <h5 class="mb-3"><strong>DATA JUMLAH KARYAWAN</strong></h5>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$totalKaryawan}}</h3>

              <p>Total Karyawan</p>
            </div>
          </div>
        </div>
      </div>

        <div class="row mt-4">
            <h5 class="mb-3"><strong>DATA KARAYAWAN BERDASARKAN KOTA/KABUPATEN</strong></h5>
            <!-- ./col -->
            @if ($baseOnDep != null)
                @foreach ($baseOnDep as $item)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$item['countdata']}}</h3>

                            <p>karyawan di departemen <strong>{{$item['name']}}</strong></p>
                        </div>

                        </div>
                    </div>
                @endforeach
            @else
                <h6 class="mb-3 text-danger"><strong>data belum tersedia</strong></h6>

            @endif
            <!-- ./col -->
        </div>
        <div class="row mt-4">
            <h5 class="mb-3"><strong>DATA KARAYAWAN BERDASARKAN KOTA/KABUPATEN</strong></h5>
            @if ($baseOnKota != null)
                @foreach ($baseOnKota as $item)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning ">
                    <div class="inner">
                        <h3>{{$item['countdata']}}</h3>

                        <p>Total karyawan dari daerah <strong>{{$item['name']}}</strong></p>
                    </div>
                    </div>
                </div>

                @endforeach
            <!-- ./col -->
            @else
                <h6 class="mb-3 text-danger"><strong>data belum tersedia</strong></h6>

            @endif



        </div>

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection
