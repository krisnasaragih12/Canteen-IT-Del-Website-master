<div class="card card-flush shadow-sm">
<div class="card-header">
    <h3 class="card-title fs-3">
    @if ($data->id)
        Edit 
    @endif
        Profile
    </h3>
    <div class="card-toolbar">
        <a href="{{ route('web.profile.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
            <i class="las la-times"></i>
        </a>
    </div>            
</div>
<div class="card-body">
    <form id="form_input">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <label for="image" class="form-label">Foto</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <div class="col-lg-12 mb-5">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="col-lg-12 mb-5">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="{{ Auth::user()->nim }}">
            </div>
            <div class="col-lg-12 mb-5">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" name="prodi" id="prodi" value="{{ Auth::user()->prodi }}">
            </div>
            <div class="col-lg-12 mb-5">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
            </div>
            <div class="col-lg-12 mb-5">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="col-lg-12 mb-5">
                <label for="dormitory" class="form-label">Asrama</label>
                <input type="text" class="form-control" name="dormitory" id="dormitory" value="{{ Auth::user()->dormitory }}">
            </div>
        </div>
        <div class="row">
            <div class="min-w-150px mt-10 text-end">
                @if ($data->id)
                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.profile.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Save</button>
                @endif
            </div>
        </div>
    </form>
</div>
</div>