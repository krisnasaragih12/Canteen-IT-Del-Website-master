<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="" class="container-xxl">
        <div class="card card-flush shadow-sm">
            <div class="card-header">
                <h3 class="card-title fs-3">
                    @if ($data->id)
                    Edit
                    @else
                    Create
                    @endif
                    Announcement
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.announcements.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                        <i class="las la-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form id="form_input">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <label for="title" class="required form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Judul Pengumuman" value="{{ $data->title }}">
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="category_id" class="form-label required">Kategori</label>
                            <select class="form-control form-control-lg form-control-solid" name="category_id"
                                id="category_id">
                                <option value="">--Pilih Kategori--</option>
                                <option value="1" {{ $data->category_id == 1 ? 'selected' : '' }}>Informasi</option>
                                <option value="2" {{ $data->category_id == 2 ? 'selected' : '' }}>Menu Makanan</option>
                                <option value="3" {{ $data->category_id == 3 ? 'selected' : '' }}>Laporan Ditemukan</option>
                                <option value="4" {{ $data->category_id == 4 ? 'selected' : '' }}>Laporan Kehilangan</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="content" class="required form-label">Konten</label>
                            <textarea class="form-control form-control-lg form-control-solid h-100px" name="content"
                                id="content" placeholder="Konten Pengumuman"
                                data-kt-autosize="true">{{ $data->content }}</textarea>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="file">Pilih File</label>
                            <input type="file" class="form-control form-control-lg form-control-solid" id="file"
                                name="file">
                        </div>
                    </div>
                    <div class="row">
                        <div class="min-w-150px mt-10 text-end">
                            @if ($data->id)
                            <button id="tombol_simpan"
                                onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.announcements.update',$data->id)}}','PATCH');"
                                class="btn btn-sm btn-primary">Save</button>
                            @else
                            <button id="tombol_simpan"
                                onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.announcements.store')}}','POST');"
                                class="btn btn-sm btn-primary">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>