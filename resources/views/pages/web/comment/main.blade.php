<x-app-layout title="Comment & Suggest">
    <div id="content_list">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="" class="container-xxl">
                <div class="card card-flush shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Komentar</h3>
                        <div class="card-toolbar">
                            <a href="javascript:;" onclick="load_input('{{route('web.comment.create')}}');" class="btn btn-success btn-sm">
                                <i class="la la-plus"></i>
                                Buat Komentar & Saran
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