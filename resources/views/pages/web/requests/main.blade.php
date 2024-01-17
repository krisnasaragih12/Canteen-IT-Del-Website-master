<x-app-layout title="Permission">
    <div id="content_list">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="" class="container-xxl">
                <div class="card card-flush shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Record Request</h3>
                        <div class="card-toolbar">
                            <a href="javascript:;" onclick="load_input('{{route('web.requests.create')}}');" class="btn btn-success btn-sm">
                                <i class="la la-plus"></i>
                                Request Izin
                            </a>
                        </div>
                    </div>
                    <div id="list_result"></div>
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>