<x-app-layout title="Announcements">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="content_list" class="container-xxl">
            <div class="row">
                <div class="col-md-12">
                    <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true"
                        data-kt-search-min-length="2" data-kt-search-enter="true" data-kt-search-layout="inline">
                        <form id="content_filter" data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                            <input type="text" name="keywords" onkeyup="load_list(1);"
                                class="form-control form-control-lg form-control-solid px-15 bg-white"
                                placeholder="Search Announcement..." />
                        </form>
                    </div>
                </div>
            </div>
            <div class="card card-flush shadow-sm" id="list_result">
                <!-- Content List -->
            </div>
        </div>
        <div id="content_detail" class="container-xxl">
            <!-- Content Detail -->
        </div>
        <!--end::Container-->
    </div>
    {{-- <div id="content_input"></div> --}}
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>