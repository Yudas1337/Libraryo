@extends('users.layouts.app')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Update Password</h1>
            </div>

        </div>
    </div>
    <!-- Step Form -->
    <form method="POST">
        @csrf
        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <!-- End Step -->

                <!-- Content Step Form -->
                <div id="addUserStepFormContent">
                    <!-- Card -->
                    <div id="addUserStepProfile" class="card card-lg active" style="">
                        <!-- Body -->
                        <div class="card-body">
                            @if (session('status'))
                            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-5">
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
                                <label for="editUserModalCurrentPasswordLabel" class="col-sm-3 col-form-label input-label">Password Lama</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input autocomplete="off" type="password" class="js-toggle-password form-control" name="oldPass" id="editUserModalCurrentPasswordLabel" value="" data-hs-toggle-password-options="{
                               &quot;target&quot;: &quot;#passwordlama&quot;,
                               &quot;defaultClass&quot;: &quot;tio-hidden-outlined&quot;,
                               &quot;showClass&quot;: &quot;tio-visible-outlined&quot;,
                               &quot;classChangeTarget&quot;: &quot;#oldPass&quot;
                             }">
                                        <div id="passwordlama" class="input-group-append">
                                            <a class="input-group-text" href="javascript:;">
                                                <i id="oldPass" class="tio-hidden-outlined"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editUserModalCurrentPasswordLabel" class="col-sm-3 col-form-label input-label">Password Baru</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" autocomplete="off" class="js-toggle-password form-control" name="newPass" id="editUserModalCurrentPasswordLabel" value="" data-hs-toggle-password-options="{
                               &quot;target&quot;: &quot;#passwordbaru&quot;,
                               &quot;defaultClass&quot;: &quot;tio-hidden-outlined&quot;,
                               &quot;showClass&quot;: &quot;tio-visible-outlined&quot;,
                               &quot;classChangeTarget&quot;: &quot;#newPass&quot;
                             }">
                                        <div id="passwordbaru" class="input-group-append">
                                            <a class="input-group-text" href="javascript:;">
                                                <i id="newPass" class="tio-hidden-outlined"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editUserModalCurrentPasswordLabel" class="col-sm-3 col-form-label input-label">Ulangi Password</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" autocomplete="off" class="js-toggle-password form-control" name="newPass_confirmation" id="editUserModalCurrentPasswordLabel" value="" data-hs-toggle-password-options="{
                               &quot;target&quot;: &quot;#ulangipassword&quot;,
                               &quot;defaultClass&quot;: &quot;tio-hidden-outlined&quot;,
                               &quot;showClass&quot;: &quot;tio-visible-outlined&quot;,
                               &quot;classChangeTarget&quot;: &quot;#confirmPass&quot;
                             }">
                                        <div id="ulangipassword" class="input-group-append">
                                            <a class="input-group-text" href="javascript:;">
                                                <i id="confirmPass" class="tio-hidden-outlined"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <div class="card-footer d-flex justify-content-end align-items-center">
                            <button type="submit" name="submit" class="btn btn-success btn-sm">
                                <i class="tio-edit"></i> Update Password
                            </button>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card -->


                </div>


            </div>
        </div>
        <!-- End Row -->
    </form>
    <!-- End Step Form -->
</div>
</div>
<!-- End Content -->

</main><!-- Footer -->
@endsection