@extends('admin.layouts.templates')

@section('konten')
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Halaman Petugas</h1>
                </div>
                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="{{ url('admin/petugas/create') }}">
                        <i class="tio-add-circle"></i>
                        Tambah Petugas
                    </a>
                </div>
            </div>
        </div>
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
        

        <!-- Card -->
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Petugas</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{ $count }}</span>
                        </div>

                        <div class="col-auto">
                            <span class="btn btn-soft-success p-1">
                                <i class="tio-group-equal"></i>
                            </span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
        
        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" autocomplete="off" class="form-control" placeholder="Cari Petugas">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 2],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="table-column-pl-0">
                                <div class="media align-items-center">
                                  <div class="avatar avatar-sm avatar-circle mr-2">
                                    <img class="avatar-img" src=" {{($a->jenis_kelamin == 'pria') ? asset('storage/assets/foto_user/default_male.jpg') : asset('storage/assets/foto_user/default_female.jpg')}}" alt="{{ $a->nama }}">
                                  </div>
                                  <div class="media-body">
                                    <span class="h5 text-hover-primary mb-0">{{ $a->nama }} 
                                        @if($a->role == "admin")
                                        <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $a->role }}"></i>
                                        @endif
                                        </span>
                                  </div>
                                </div>
                              </td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->no_hp }}</td>
                            <td>{{ $a->alamat }}</td>
                            <td>
                                <form method="POST" action="{{ url('admin/petugas/'.$a->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url("admin/petugas/".$a->id) }}" class="btn btn-primary btn-sm"><i class="tio-visible"></i> Detail</a>
                                    @if($a->id != auth()->user()->id)
                                    <button onclick="return confirm('Apa yakin akan menonaktifkan petugas?')" type="submit" class="btn btn-danger btn-sm"><i class="tio-delete"></i> Nonaktifkan</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        
                            
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="mr-2">Showing:</span>

                            <!-- Select -->
                            <select id="datatableEntries" class="js-select2-custom" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm custom-select-borderless",
                            "dropdownAutoWidth": true,
                            "width": true
                          }'>
                                <option value="10">10</option>
                                <option value="15" selected>15</option>
                                <option value="20">20</option>
                            </select>
                            <!-- End Select -->

                            <span class="text-secondary mr-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->


</main>

@endsection