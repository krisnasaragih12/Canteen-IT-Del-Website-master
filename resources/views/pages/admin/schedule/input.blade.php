<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-flush shadow-sm">
            <div class="card-header">
                <h3 class="card-title fs-3">
                @if ($schedule->id)
                    Edit
                @else
                    Create
                @endif
                    Map & Schedule
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                        <i class="las la-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form id="form_input">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <label for="name" class="required form-label">Kantin--</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kantin" value="{{ $schedule->name }}">
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="description" class="required form-label">Deskripsi</label>
                            <textarea class="form-control form-control-lg form-control-solid h-100px" name="description" id="description" placeholder="Deskripsi kantin">{{ $schedule->description }}</textarea>              
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="file_map" class="required form-label">Choose File Map</label>
                            <input type="file" class="form-control form-control-lg form-control-solid" id="file_map" name="file_map">             
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="file_schedule" class="required form-label">Choose File Schedule</label>
                            <input type="file" class="form-control form-control-lg form-control-solid" id="file_schedule" name="file_schedule">             
                        </div>
                    </div>
                    <div class="row">
                        <div class="min-w-150px mt-10 text-end">
                            @if ($schedule->id)
                                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.schedule.update',$schedule->id)}}','PATCH');" class="btn btn-sm btn-primary">Save</button>
                            @else
                                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.schedule.store')}}','POST');" class="btn btn-sm btn-primary">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Container-->
 </div>
