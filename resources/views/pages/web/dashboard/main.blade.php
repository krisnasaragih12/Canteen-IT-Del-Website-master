<x-app-layout title="Dashboard">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="content_list" class="container-xxl">
            <div class="card card-flush shadow-sm px-4 pt-4">
                <h1 class="text-center">
                    Layanan Kantin IT Del
                </h1>
                <p class="text-center">
                    Layanan kantin IT Del sebelumnya bersifat manual namun, 
                    kini mahasiswa del dapat menggunakan sistem informasi ini untuk melakukan aktivitas-aktivitas yang berhubungan dengan kantin, 
                    seperti izin tidak mengikuti kegiatan makan di kantin, memberikan pengumuman kehilangan, dan pengumuman lainnya.
                    Sistem informasi ini akan mempermudah mahasiswa, pihak kantin, dan keasramaan melakukan komunikasi dimanapun dan kapanpun.
                </p>
            </div><br>
            <div id="list_result"></div>
        </div>
        <div id="content_detail" class="container-xxl">
            <!-- Content Detail -->
        </div>
        <!--end::Container-->
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>