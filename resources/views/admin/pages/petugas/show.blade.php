@extends('admin.layouts.templates')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Detail Petugas</h1>
            </div>

        </div>
    </div>
        <div class="col-lg-12">
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Petugas</h2>
                </div>

                <!-- Body -->

                <div class="card-body">
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="nama" class="col-sm-3 col-form-label input-label">Foto</label>

                        <div class="col-sm-9">
                            <a target="_blank" href="{{ asset('storage/assets/foto_user/'. $petugas->foto) }}">
                                <img class="rounded-circle" width="100" height="100" src="{{ asset('storage/assets/foto_user/'. $petugas->foto) }}" alt="{{ $petugas->nama }}">
                            </a>
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="nama" class="col-sm-3 col-form-label input-label">Nama Lengkap</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="nama" value="{{ $petugas->nama }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="email" class="col-sm-3 col-form-label input-label">Email</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="email" value="{{ $petugas->email }}">
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="no_hp" class="col-sm-3 col-form-label input-label">Nomor Telepon</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="no_hp" value="{{ $petugas->no_hp }}">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="alamat" class="col-sm-3 col-form-label input-label">Alamat Anggota</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="alamat" value="{{ $petugas->alamat }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Jenis Kelamin</label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="L" {{($petugas->jenis_kelamin == 'pria') ? 'checked' : ''}} class="custom-control-input" name="jenis_kelamin" id="userAccountTypeRadio1" >
                                        <label class="custom-control-label" for="userAccountTypeRadio1">Pria</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{($petugas->jenis_kelamin == 'wanita') ? 'checked' : ''}}value="P" class="custom-control-input" name="jenis_kelamin" id="userAccountTypeRadio2" >
                                        <label class="custom-control-label" for="userAccountTypeRadio2">Wanita</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="username" class="col-sm-3 col-form-label input-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="username" value="{{ $petugas->username }}">
                        </div>
                    </div>
                    <!-- End Form Group -->


                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->



            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
       
</div>
</div>

</main>
@endsection