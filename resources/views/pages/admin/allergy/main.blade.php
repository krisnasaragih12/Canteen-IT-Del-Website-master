<x-app-layout title="Allergy">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="content_list" class="container-xxl">
            <div class="row g-5 g-xl-8">
                <div class="col-md-3">
                    <div class="card bg-danger card-sm-stretch">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Total laporan alergi:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-primary card-sm-stretch">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Alergi Cumi-cumi:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->where('allergy_id', 1)->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success card-sm-stretch">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Alergi Ikan teri/ikan asin:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->where('allergy_id', 2)->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning card-sm-stretch">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Alergi Udang:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->where('allergy_id', 3)->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 g-xl-8">
                <div class="col-md-3">
                    <div class="card bg-info card-sm-stretch">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Alergi Telur:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->where('allergy_id', 4)->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-secondary card-sm-stretch">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Alergi Tahu-tempe:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->where('allergy_id', 5)->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-sm-stretch" style="background-color: #1258c1;">
                        <div class="card-body">
                            <div class="text-white fw-bolder fs-4 mb-2 mt-1">Alergi Ikan Laut:</div>
                            <div class="h1 font-weight-bold mb-2 text-white">
                                <span class="text-white">{{$report->where('allergy_id', 6)->count()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Data Alergi Mahasiswa</h3>
                    <div class="card-toolbar">
                        <a href="{{route('admin.allergy.pdf')}}" class="btn btn-icon btn-lg btn-active-light-primary" target="_blank"  class="menu-link">
                            <i class="fas fa-print text-warning"></i>
                        </a>    
                        <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true"
                            data-kt-search-min-length="2" data-kt-search-enter="true" data-kt-search-layout="inline">
                            <form id="content_filter" data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">
                                <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <input type="text" name="keywords" onkeyup="load_list(1);"
                                    class="form-control form-control-lg form-control-solid px-15 bg-white"
                                    placeholder="Search Allergy..." />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="list_result"></div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    @section('custom_js')
    <script>
        load_list(1);
    </script>
    @endsection
</x-app-layout>