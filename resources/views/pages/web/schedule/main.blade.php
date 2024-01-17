<x-app-layout title="Map & Schedule">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="content_list" class="container-xxl">
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Map & Schedule</h3>
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