@extends('users.layouts.app')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Update Profile</h1>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ url('users/profile') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Profile Cover -->
                <div class="profile-cover">
                    <div class="profile-cover-img-wrapper">
                        <img id="profileCoverImg" class="profile-cover-img" src="{{ asset('storage/assets/foto_user/default_header.jpg') }}" alt="Image Description">


                    </div>
                </div>
                <!-- End Profile Cover -->

                <!-- Avatar -->
                <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar" for="avatarUploader">
                    <img id="avatarImg" class="avatar-img" src="{{ asset('storage/assets/foto_user/'.$user->foto)}}" alt="{{ $user->nama }}">

                    <input type="file" name="foto" class="js-file-attach avatar-uploader-input" id="avatarUploader" data-hs-file-attach-options="{
                  &quot;textTarget&quot;: &quot;#avatarImg&quot;,
                  &quot;mode&quot;: &quot;image&quot;,
                  &quot;targetAttr&quot;: &quot;src&quot;,
                  &quot;resetTarget&quot;: &quot;.js-file-attach-reset-img&quot;,
                  &quot;resetImg&quot;: &quot;http://127.0.0.1:8000/storage/assets/foto_user/default.jpg&quot;
               }">


                    <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                    </span>
                </label>
                <!-- End Avatar -->


            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Diri</h2>
                </div>

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
                    <div class="row form-group">
                        <label for="nama_lengkap" class="col-sm-3 col-form-label input-label">Nama Lengkap</label>

                        <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" name="nama" placeholder="John Doe" value="{{ $user->nama }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="alamat" class="col-sm-3 col-form-label input-label">Alamat</label>

                        <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" name="alamat" placeholder="Jl Welirang No 74 Kepanjen" value="{{ $user->alamat }}">
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="alamat" class="col-sm-3 col-form-label input-label">Email</label>

                        <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" name="email" placeholder="clarice@gmail.com" value="{{ $user->email }}">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="telepon" class="col-sm-3 col-form-label input-label">Telepon</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="no_hp" placeholder="0812532323206" autocomplete="off" value="{{ $user->no_hp }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Jenis Kelamin</label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ ($user->jenis_kelamin == "pria" ? 'checked' : '') }} value="pria" class="custom-control-input" name="jenis_kelamin" id="userAccountTypeRadio1">
                                        <label class="custom-control-label" for="userAccountTypeRadio1">Pria</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ ($user->jenis_kelamin == "wanita" ? 'checked' : '') }} value="wanita" class="custom-control-input" name="jenis_kelamin" id="userAccountTypeRadio2" >
                                        <label class="custom-control-label" for="userAccountTypeRadio2">Wanita</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Body -->
                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" name="submit" class="btn btn-success btn-sm">
                        <i class="tio-edit"></i> Update Profile
                    </button>

                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->



            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
        <form>
</div>
</div>
<!-- End Content -->
</main><!-- Footer -->
@endsection