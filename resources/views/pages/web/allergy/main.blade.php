<x-app-layout title="Allergy">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="content_list" class="container-xxl">
            <div class="card card-flush shadow-sm" id="list_result">
            </div>
        </div>
        <!--end::Container-->
        <!--begin::Container-->
        <div id="content_input" class="container-xxl">
        </div>
        <!--end::Container-->
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>