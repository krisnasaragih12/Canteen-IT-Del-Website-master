<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-flush shadow-sm">
            <div class="card-header">
                <h3 class="card-title fs-3">Add Comment & Suggest</h3>
                <div class="card-toolbar">
                    <a href="{{ route('web.comment.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                        <i class="las la-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form id="form_input">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <label for="content" class="form-label">Comment</label>
                            <textarea class="form-control" name="comment" id="comment"></textarea>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <label for="content" class="form-label">Suggest</label>
                            <textarea class="form-control" name="suggest" id="suggest"></textarea>
                        </div>
                        </div>
                        <div class="row">
                            <div class="min-w-150px mt-10 text-end">
                            @if ($data->id)
                                <button id="tombol_simpan" onclick="handle_save('#tombol_simpan','#form_input','{{route('web.comment.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Save</button>
                            @else
                                <button id="tombol_simpan" onclick="handle_save('#tombol_simpan','#form_input','{{route('web.comment.store')}}','POST');" class="btn btn-sm btn-primary">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
