
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dashboard</title>

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

</head>

<body class="footer-offset">


    <!-- ONLY DEV -->

    <!-- Builder -->
    <div id="styleSwitcherDropdown" class="hs-unfold-content sidebar sidebar-bordered sidebar-box-shadow" style="width: 35rem;">
        <div class="card card-lg border-0 h-100">
            <!-- Footer -->
            <div class="card-footer">
                <div class="row gx-2">
                    <div class="col">
                        <button type="button" id="js-builder-reset" class="btn btn-block btn-lg btn-white">
                            <i class="tio-restore"></i> Reset
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" id="js-builder-preview" class="btn btn-block btn-lg btn-primary">
                            <i class="tio-visible"></i> Preview
                        </button>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
    </div>
    <!-- End Builder -->



    <!-- JS Preview mode only -->
    <div id="headerMain" class="d-none">
        <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
            <div class="navbar-nav-wrap">

                <div class="navbar-nav-wrap-content-left">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-toggle="tooltip" data-placement="right" title="Expand"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->


                </div>

                <!-- Secondary Content -->
                <div class="navbar-nav-wrap-content-right">
                    <!-- Navbar -->
                    <ul class="navbar-nav align-items-center flex-row">

                        <li class="nav-item">
                            <!-- Account -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;" data-hs-unfold-options='{
                 "target": "#accountNavbarDropdown",
                 "type": "css-animation"
               }'>
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="{{ asset('storage/assets/foto_user/'. auth()->user()->foto) }}">
                                        <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                    </div>
                                </a>

                                <div id="accountNavbarDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account" style="width: 16rem;">
                                    <a class="dropdown-item" href="{{ url('admin/profile') }}">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-sm avatar-circle mr-2">
                                                <img class="avatar-img" src="{{ asset('storage/assets/foto_user/'. auth()->user()->foto) }}">
                                            </div>
                                            <div class="media-body">
                                                <span class="card-title h5">{{ auth()->user()->nama }}</span>
                                                <span class="card-text">{{ auth()->user()->email}}</span>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ asset('admin/updatePassword') }}">
                                        <span class="text-truncate pr-2" title="Settings">Update Password</span>
                                    </a>
                                    <a data-toggle="modal" href="" data-target="#logoutModal" class="dropdown-item" >
                                        <span class="text-truncate pr-2" title="Settings">Log Out</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Account -->
                        </li>
                    </ul>
                    <!-- End Navbar -->
                </div>
                <!-- End Secondary Content -->
            </div>
        </header>
    </div>
    <div id="headerFluid" class="d-none">

    </div>
    <div id="headerDouble" class="d-none">
    
    </div>
    <div id="sidebarMain" class="d-none">
        <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
            <div class="navbar-vertical-container">
                <div class="navbar-vertical-footer-offset">
                    <div class="navbar-brand-wrapper justify-content-center" style="height: auto;">
                        <!-- Logo -->
    
    
                        <a class="navbar-brand" href="{{ url('admin/') }}" aria-label="Front">
                            <img class="navbar-brand-logo" style="min-width: 3.5rem;max-width: 3.5rem;" src="{{ asset('storage/assets/' . session()->get('siteProfile')['foto'] ) }}" alt="{{ session()->get('siteProfile')['nama'] }}">
                            <img class="navbar-brand-logo-mini" src="{{ asset('storage/assets/'. session()->get('siteProfile')['foto'] ) }}" alt="{{ session()->get('siteProfile')['nama'] }}">
                        </a>
    
                        <!-- End Logo -->
    
                        <!-- Navbar Vertical Toggle -->
                        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                            <i class="tio-clear tio-lg"></i>
                        </button>
                        <!-- End Navbar Vertical Toggle -->
                    </div>
    
                    <!-- Content -->
                    <div class="navbar-vertical-content">
                        <ul class="navbar-nav navbar-nav-lg nav-tabs">
                            <!-- Dashboards -->
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('admin')) ? 'active' : '' }}"  href="{{ url('admin') }}" title="Dashboards">
                                    <i class="tio-home-vs-1-outlined nav-icon"></i>
                                    <span class="nav-compact-title text-truncate">Dashboard</span>
                                </a>
                            </li>
                            <!-- End Dashboards -->
                            @if(auth()->user()->role == "admin")
                            <!-- BUAT ADMINISTRATOR -->
                            <li class="nav-item">
                                <small class="nav-subtitle" title="Menu Utama">Menu Utama</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('admin/buku') || Request::is('admin/buku/*')) ? 'active' : '' }} " href="{{ url('admin/buku') }}" title="Data Buku">
                                    <i class="tio-book nav-icon"></i>
                                    <span class="text-truncate">Data Buku</span>
                                </a>
                            </li>

                            
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('admin/rak') || Request::is('admin/rak/*')) ? 'active' : '' }} " href="{{ url('admin/rak') }}" title="Data Rak">
                                    <i class="tio-archive nav-icon"></i>
                                    <span class="text-truncate">Data Rak</span>
                                </a>
                            </li>
                            @endif

                            <!---- BUAT ADMINISTRATOR DAN PETUGAS -->
                            <li class="nav-item">
                                <small class="nav-subtitle" title="Menu Transaksi">Menu Transaksi</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('admin/peminjaman') || Request::is('admin/peminjaman/*')) ? 'active' : '' }} " href="{{ url('admin/peminjaman') }}" title="Data Peminjaman">
                                    <i class="tio-notebook-bookmarked nav-icon"></i>
                                    <span class="text-truncate">Data Peminjaman</span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu {{ (Request::is('admin/pengembalian') || Request::is('admin/pengembalian/*')) ? 'show' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:;" title="Data Pengembalian">
                                    <i class="tio-history nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data Pengembalian</span>
                                </a>
                                <!-- Menu Admin -->
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{ (Request::is('admin/pengembalian') || Request::is('admin/pengembalian/*')) ? 'show' : '' }}">
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Request::is('admin/pengembalian/validasi')) ? 'active' : '' }} "  href="{{ url('admin/pengembalian/validasi') }}" title="Validasi Pengembalian">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate">Validasi Pengembalian</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Request::is('admin/pengembalian')) ? 'active' : '' }}" href="{{ url('admin/pengembalian') }}" title="Pengembalian">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate">Pengembalian</span>
                                            </a>
                                        </li>
                                    
                                </ul>
                            </li>

                            @if(auth()->user()->role == "admin")
                            <li class="nav-item">
                                <small class="nav-subtitle" title="Menu user">Menu User</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu {{ (Request::is('admin/member') || Request::is('admin/member/*')) ? 'show' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:;" title="Data Member">
                                    <i class="tio-user nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Member</span>
                                </a>
                                <!-- Menu Admin -->
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{ (Request::is('admin/member') || Request::is('admin/member/*')) ? 'show' : '' }}">
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Request::is('admin/member')) ? 'active' : '' }} "  href="{{ url('admin/member/') }}" title="Data Member Aktif">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate">Member Aktif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Request::is('admin/member/nonaktif')) ? 'active' : '' }}" href="{{ url('admin/member/nonaktif') }}" title="Data Member Nonaktif">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate">Member Nonaktif</span>
                                            </a>
                                        </li>
                                    
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu {{ (Request::is('admin/petugas') || Request::is('admin/petugas/*')) ? 'show' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:;" title="Data Petugas">
                                    <i class="tio-group-equal nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Petugas</span>
                                </a>
                                <!-- Menu Admin -->
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub {{ (Request::is('admin/petugas') || Request::is('admin/petugas/*')) ? 'show' : '' }}">
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Request::is('admin/petugas')) ? 'active' : '' }} "  href="{{ url('admin/petugas/') }}" title="Data Petugas Aktif">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate">Petugas Aktif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Request::is('admin/petugas/nonaktif')) ? 'active' : '' }}" href="{{ url('admin/petugas/nonaktif') }}" title="Data Petugas Nonaktif">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate">Petugas Nonaktif</span>
                                            </a>
                                        </li>
                                    
                                </ul>
                            </li>

                            <li class="nav-item">
                                <small class="nav-subtitle" title="Menu Utama">Pengaturan Website</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('admin/siteProfile') || Request::is('admin/siteProfile/*')) ? 'active' : '' }} " href="{{ url('admin/siteProfile') }}" title="Profil Website">
                                    <i class="tio-settings nav-icon"></i>
                                    <span class="text-truncate">Profil Website</span>
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                    <!-- End Content -->
    
    
                </div>
            </div>
        </aside>
    </div>
    <div id="sidebarCompact" class="d-none">
    
    </div>
    
    
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    
    
    
    <!-- End Footer -->
    </main>
    
    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    
    
    
    <!-- JS Front -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    
    <!-- JS Plugins Init. -->
    

    @yield('konten')

    <!-- Footer -->

<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <p class="font-size-sm mb-0">&copy; CopyRights {{ session()->get('siteProfile')['nama'] }} All Rights Reserved </p>
        </div>

    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin ingin logout?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         dengan klik logout, maka sesi anda akan berakhir.
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>


<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function() {
        // ONLY DEV

        if (window.localStorage.getItem('hs-builder-popover') === null) {
            $('#builderPopover').popover('show');

            $(document).on('click', '#closeBuilderPopover', function() {
                window.localStorage.setItem('hs-builder-popover', true);
                $('#builderPopover').popover('dispose');
            });
        } else {
            $('#builderPopover').on('show.bs.popover', function() {
                return false
            });
        }
        // initialization of Show Password
        $('.js-toggle-password').each(function() {
            new HSTogglePassword(this).init()
        });

        // END ONLY DEV

        $('.js-navbar-vertical-aside-toggle-invoker').click(function() {
            $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
        });


        // initialization of mega menu
        var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
            desktop: {
                position: 'left'
            }
        }).init();


        // initialization of navbar vertical navigation
        var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

        // initialization of tooltip in navbar vertical menu
        $('.js-nav-tooltip-link').tooltip({
            boundary: 'window'
        })

        $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
            if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                return false;
            }
        });

        // initialization of unfold
        $('.js-hs-unfold-invoker').each(function() {
            var unfold = new HSUnfold($(this)).init();
        });

        // initialization of form search
        $('.js-form-search').each(function() {
            new HSFormSearch($(this)).init()
        });

        // initialization of file attach
        $('.js-file-attach').each(function() {
            var customFile = new HSFileAttach($(this)).init();
        });

        // initialization of step form
        $('.js-step-form').each(function() {
            var stepForm = new HSStepForm($(this), {
                finish: function() {
                    $("#createProjectStepFormProgress").hide();
                    $("#createProjectStepFormContent").hide();
                    $("#createProjectStepSuccessMessage").show();
                }
            }).init();
        });

        // initialization of select2
        $('.js-select2-custom').each(function() {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // initialization of quilljs editor
        var quill = $.HSCore.components.HSQuill.init('.js-quill');

        // initialization of tagify
        $('.js-tagify').each(function() {
            var tagify = $.HSCore.components.HSTagify.init($(this));
        });

        $('.js-tagify-avatars').each(function() {
            var settings = $(this).attr('data-hs-tagify-options') ? JSON.parse($(this).attr('data-hs-tagify-options')) : {},
                tagifyAvatars = $.HSCore.components.HSTagify.init($(this), {
                    templates: {
                        tag: function tag(tagData) {
                            try {
                                return "<tag title=\"" + tagData.value + "\" contenteditable=\"false\" spellcheck=\"false\" class=\"tagify__tag " + (tagData["class"] ? tagData["class"] : "") + "\" " + this.getAttributes(tagData) + ">" +
                                    "<x title=\"remove tag\" class=\"tagify__tag__removeBtn\"></x>" +
                                    "<div class=\"d-flex align-items-center\">" +
                                    "" + (tagData.src ? "<img class=\"avatar avatar-xss avatar-circle mr-2\" src=\"" + tagData.src.toLowerCase() + "\">" : "") + "" +
                                    "<span>" + tagData.value + "</span>" +
                                    "</div>" +
                                    "</tag>";
                            } catch (err) {}
                        },
                        dropdownItem: function dropdownItem(tagData) {
                            try {
                                return "<div " + this.getAttributes(tagData) + " class=\"tagify__dropdown__item " + (tagData["class"] ? tagData["class"] : "") + "\">" +
                                    "<img class=\"avatar avatar-xss avatar-circle mr-2\" src=\"" + tagData.src.toLowerCase() + "\">" +
                                    "<span>" + tagData.value + "</span>" +
                                    "</div>";
                            } catch (err) {}
                        }
                    }
                }).addTags(settings.whitelist.slice(0, 1));
        });

   
        // initialization of datatables
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    className: 'd-none'
                },
                {
                    extend: 'excel',
                    className: 'd-none'
                },
                {
                    extend: 'csv',
                    className: 'd-none'
                },
                {
                    extend: 'pdf',
                    className: 'd-none'
                },
                {
                    extend: 'print',
                    className: 'd-none'
                },
            ],
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src=" {{ asset('assets/svg/illustrations/sorry.svg') }}" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
            }
        });

        $('#datatableSearch').on('mouseup', function(e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function() {
                var newValue = $input.val();

                if (newValue == "") {
                    // Gotcha
                    datatable.search('').draw();
                }
            }, 1);
        });

        $('#datatableWithSearchInput').on('mouseup', function(e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function() {
                var newValue = $input.val();

                if (newValue == "") {
                    // Gotcha
                    datatableWithSearch.search('').draw();
                }
            }, 1);
        });

        $('#export-copy').click(function() {
            datatable.button('.buttons-copy').trigger()
        });

        $('#export-excel').click(function() {
            datatable.button('.buttons-excel').trigger()
        });

        $('#export-csv').click(function() {
            datatable.button('.buttons-csv').trigger()
        });

        $('#export-pdf').click(function() {
            datatable.button('.buttons-pdf').trigger()
        });

        $('#export-print').click(function() {
            datatable.button('.buttons-print').trigger()
        });

        $('.js-datatable-filter').on('change', function() {
            var $this = $(this),
                elVal = $this.val(),
                targetColumnIndex = $this.data('target-column-index');

            datatable.column(targetColumnIndex).search(elVal).draw();
        });

        $('#datatableSearch').on('search', function() {
            datatable.search('').draw();
        });

        // initialization of flatpickr
        $('.js-flatpickr').each(function() {
            $.HSCore.components.HSFlatpickr.init($(this));
        });
    });
</script>


</body>

</html>