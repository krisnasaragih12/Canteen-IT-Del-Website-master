   <div class="card-header">
        <h3 class="card-title">
            <a href="{{ route('web.dashboard.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                <i class="fas fa-arrow-left"></i>
            </a>
        </h3>
        <div class="card-toolbar">
            <a href="javascript:;" onclick="load_input('{{route('web.profile.edit',$user->id)}}');" class="menu-link px-3">
                <i class="fa fa-edit text-warning"></i>
                Edit
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Profile</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">Nama</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $user->name }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">NIM</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <span class="fw-bold text-gray-800 fs-6">{{ $user->nim }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">Prodi</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10">
                        <span class="fw-bold text-gray-800 fs-6">{{ $user->prodi }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">Email</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $user->email }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">No HP</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $user->phone }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">Asrama</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $user->dormitory }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Image-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-2 fw-bold text-muted">Foto</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10">
                        @if ($user->image)
                            <img src="{{ asset('public/profiles/'.$user->image) }}" alt="image" class="img-fluid" width="100" height="100">
                        @else
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-bold">
                                        <h6 class="text-gray-900 fw-bolder">File Not Found</h6>
                                        <div class="fs-8 text-gray-700">Anda masih belum menambahkan file/gambar anda.</div> 
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                        @endif
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Image-->
            </div>
            <!--end::Card body-->
        </div>
    </div>