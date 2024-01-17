<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-flush shadow-sm">
            <div class="card-header">
                <h3 class="card-title fs-3">
                    @if ($requestsModel->id)
                        Edit
                    @else
                        Create
                    @endif
                        Request Izin
                </h3> 
                <div class="card-toolbar">
                    <a href="{{ route('web.requests.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                        <i class="las la-times"></i>
                    </a>
                </div>          
            </div>
            <div class="card-body">
                <form id="form_input">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <label for="permission_id" class="required form-label">Nama Izin</label>
                            <select class="form-control form-control-lg" name="permission_id" data-fv-field="izin">
                                <option value="">--Pilih Izin--</option>
                                <option value="1" {{ $requestsModel->permission_id == 1 ? 'selected' : '' }}>Izin Tidak Makan</option>
                                <option value="2" {{ $requestsModel->permission_id == 2 ? 'selected' : '' }}>Izin Terlambat Makan</option>
                                <option value="3" {{ $requestsModel->permission_id == 3 ? 'selected' : '' }}>Izin sedang IB/diluar Kampus</option>
                                <option value="4" {{ $requestsModel->permission_id == 4 ? 'selected' : '' }}>Sakit</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="description" class="required form-label">Keterangan</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $requestsModel->description }}" placeholder="Keterangan" data-fv-field="keterangan">
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="file" class="form-label">Lampiran</label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div>
                        </div>
                        <div class="row">
                        <div class="min-w-150px mt-10 text-end">
                            @if ($requestsModel->id)
                                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.requests.update',$requestsModel->id)}}','PATCH');" class="btn btn-sm btn-primary">Save</button>
                            @else
                                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.requests.store')}}','POST');" class="btn btn-sm btn-primary">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>