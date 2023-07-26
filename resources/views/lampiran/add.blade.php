@extends('layout.navigate')

@section('title', 'input dokumen lampiran')

@section('style')
<style>
    .img-area img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 100;
    }
    .img-area::before {
        content: attr(data-img);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        color: #fff;
        font-weight: 500;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        opacity: 0;
        transition: all .3s ease;
        z-index: 200;
    }
    .img-area.active:hover::before {
        opacity: 1;
    }
    .select-image {
        display: block;
        width: 100%;
        padding: 16px 0;
        border-radius: 15px;
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all .3s ease;
    }

    .uploadpreview{
        height:300px;
        display:block;
        border:1px solid #ccc;
        border-radius:10px;
        margin-left:23px;
        margin:0 auto 15px;
        background-size:contain;
        background-repeat:no-repeat;
        background-position:center;
        z-index: 999;
        }

    input[type="file"] {
        color: transparent;
        width: 120px;
        /* padding-right:32px; */
        margin: 0 auto;
        display: block;
    }
</style>
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="../images/gatra-mapan-logo.png" class="p-2 bg-white rounded-sm img-fluid" alt="">
                    </div>
                    <!-- card-header -->
                <div class="card-body">
                    <div class="col-md-10">
                        <form action="" class="card-body p-2">
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>EDIT LAMPIRAN</strong></h5>
                            </div>
                            <div class="d-flex flex-column align-items-center flex-md-row row pt-1">
                                <div class="upload-wrap col-6 mb-3">
                                    <h5 class="text-center pt-4">FOTOCOPY KTP</h5>
                                    <div class="w-100 uploadpreview 01 d-flex justify-content-center align-items-center mx-auto flex-column position-relative bg-gray-light mb-4 rounded-lg overflow-hidden" data-img="">
                                        <i class='fas fa-cloud-upload-alt' style="font-size: 80px; color: rgba(0, 0, 0, .1);"></i>
                                        <h3 style="color: rgba(0, 0, 0, .1);">Upload Image</h3>
                                        <label for="01" class="position-absolute w-100" style="background-color: rgba(0, 0, 0, 0); cursor: pointer; width: 300px; height: 300px;">
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <input id="01" class="visually-hidden" type="file" accept="image/*">
                                </div>
                                <div class="upload-wrap col-6 mb-3">
                                    <h5 class="text-center pt-4">FOTOCOPY Kartu Jamsostek</h5>
                                    <div class="w-100 uploadpreview 02 d-flex justify-content-center align-items-center mx-auto flex-column position-relative bg-gray-light mb-4 rounded-lg overflow-hidden" data-img="">
                                        <i class='fas fa-cloud-upload-alt' style="font-size: 80px; color: rgba(0, 0, 0, .1);"></i>
                                        <h3 style="color: rgba(0, 0, 0, .1);">Upload Image</h3>
                                        <label for="02" class="position-absolute w-100" style="background-color: rgba(0, 0, 0, 0); cursor: pointer; width: 300px; height: 300px;">
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <input id="02" class="visually-hidden" type="file" accept="image/*">
                                </div>
                                <div class="upload-wrap col-6 mb-3">
                                    <h5 class="text-center pt-4">FOTOCOPY ID Card</h5>
                                    <div class="w-100 uploadpreview 03 d-flex justify-content-center align-items-center mx-auto flex-column position-relative bg-gray-light mb-4 rounded-lg overflow-hidden" data-img="">
                                        <i class='fas fa-cloud-upload-alt' style="font-size: 80px; color: rgba(0, 0, 0, .1);"></i>
                                        <h3 style="color: rgba(0, 0, 0, .1);">Upload Image</h3>
                                        <label for="03" class="position-absolute w-100" style="background-color: rgba(0, 0, 0, 0); cursor: pointer; width: 300px; height: 300px;">
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <input id="03" class="visually-hidden" type="file" accept="image/*">
                                </div>
                                <div class="upload-wrap col-6 mb-3">
                                    <h5 class="text-center pt-4">FOTOCOPY Kartu JPK</h5>
                                    <div class="w-100 uploadpreview 04 d-flex justify-content-center align-items-center mx-auto flex-column position-relative bg-gray-light mb-4 rounded-lg overflow-hidden" data-img="">
                                        <i class='fas fa-cloud-upload-alt' style="font-size: 80px; color: rgba(0, 0, 0, .1);"></i>
                                        <h3 style="color: rgba(0, 0, 0, .1);">Upload Image</h3>
                                        <label for="04" class="position-absolute w-100" style="background-color: rgba(0, 0, 0, 0); cursor: pointer; width: 300px; height: 300px;">
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <input id="04" class="visually-hidden" type="file" accept="image/*">
                                </div>
                                <div class="upload-wrap mx-auto col-6 mb-3">
                                    <h5 class="text-center pt-4">FOTOCOPY Kartu Keluarga</h5>
                                    <div class="w-100 uploadpreview 05 d-flex justify-content-center align-items-center mx-auto flex-column position-relative bg-gray-light mb-4 rounded-lg overflow-hidden" data-img="">
                                        <i class='fas fa-cloud-upload-alt' style="font-size: 80px; color: rgba(0, 0, 0, .1);"></i>
                                        <h3 style="color: rgba(0, 0, 0, .1);">Upload Image</h3>
                                        <label for="05" class="position-absolute w-100" style="background-color: rgba(0, 0, 0, 0); cursor: pointer; width: 300px; height: 300px;">
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <input id="05" class="visually-hidden" type="file" accept="image/*">
                                </div>

                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <a href="./lihat-karyawan.html">
                                    <button class="btn btn-primary px-5 p-3 mt-5 font-weight-bold">Simpan</button>
                                </a>
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
