@extends('admin.layouts.templates')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Profil Website</h1>
            </div>

        </div>
    </div>
    <!-- End Page Header -->


    <!-- Content Step Form -->
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div id="addUserStepFormContent">
            <!-- Card -->
            <div id="addUserStepProfile" class="card card-lg active">
                <!-- Body -->
                <div class="card-body">

                    @if (session('status'))
                    <div class="col-sm-6 col-lg-6 mb-3 mb-lg-5">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Gagal!</strong> Validasi Form Error<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <!-- Form Group -->
                    <div class="row form-group" hidden>
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Site Id </label>

                        <div class="col-sm-6">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" readonly class="form-control" name="id" value="{{ $site->id }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Logo<i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Logo dari PTSL akan ditampilkan pada halaman login"></i></label>

                        <div class="col-sm-9">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="avatarImg" class="avatar-img" src="{{ asset('storage/assets/'.$site->foto) }}" alt="{{ $site->nama }}">

                                    <input type="file" name="foto" class="js-file-attach avatar-uploader-input" id="avatarUploader" data-hs-file-attach-options='{
                                  "textTarget": "#avatarImg",
                                  "mode": "image",
                                  "targetAttr": "src",
                                  "resetTarget": ".js-file-attach-reset-img",
                                  "resetImg": "{{ asset('storage/assets/foto_user/default.jpg') }}"
                               }'>


                                    <span class="avatar-uploader-trigger">
                                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                    </span>
                                </label>
                                <!-- End Avatar -->
                                <button type="button" class="js-file-attach-reset-img btn btn-white">Hapus</button>

                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Nama <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Nama dari PTSL akan ditampilkan pada halaman login"></i></label>

                        <div class="col-sm-6">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="nama" value="{{ $site->nama }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Email</label>
                        <div class="col-sm-6">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="email" value="{{ $site->email }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">No Hp</label>
                        <div class="col-sm-6">
                            <div class="input-group input-group-sm-down-break">
                                <input type="number" class="form-control" name="no_telp" value="{{ $site->no_telp }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                   
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" name="submit" class="btn btn-success">
                        <i class="tio-edit"></i> Update
                    </button>

                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->
    </form>

</div>
<!-- End Content Step Form -->


</div>
<!-- End Content -->

</main><!-- Footer -->
@endsection