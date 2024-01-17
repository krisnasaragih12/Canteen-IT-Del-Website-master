<div class="card card-flush shadow-sm">
    <div class="card-header">
        <h3 class="card-title fs-3">
            @if ($data->id)
                Edit
            @else
                Create
            @endif
                Laporan Alergi
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('web.allergy.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                <i class="las la-times"></i>
            </a>
        </div>         
    </div>
    <div class="card-body">
        <form id="form_input">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <label for="allergy_id" class="form-label required">Alergi:</label>
                    <select class="form-control form-control-lg form-control-solid" name="allergy_id"
                        id="allergy_id">
                        <option value="">--Alergi--</option>
                        <option value="1" {{ $data->allergy_id == 1 ? 'selected' : '' }}>Cumi-cumi</option>
                        <option value="2" {{ $data->allergy_id == 2 ? 'selected' : '' }}>Ikan teri/ikan asin</option>
                        <option value="3" {{ $data->allergy_id == 3 ? 'selected' : '' }}>Udang</option>
                        <option value="4" {{ $data->allergy_id == 4 ? 'selected' : '' }}>Telur</option>
                        <option value="5" {{ $data->allergy_id == 5 ? 'selected' : '' }}>Tahu-tempe</option>
                        <option value="6" {{ $data->allergy_id == 6 ? 'selected' : '' }}>Ikan Laut</option>
                    </select>
                </div>
                <div class="col-lg-12 mb-5">
                    <label for="file" class="form-label">File Surat Dokter:</label>
                    <input type="file" class="form-control" name="file" id="file" placeholder="Masukan File Surat Dokter">
                </div>
                <div class="row">
                    <div class="min-w-150px mt-10 text-end">
                    @if ($data->id)
                        <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.allergy.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Save</button>
                    @else
                        <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('web.allergy.store')}}','POST');" class="btn btn-sm btn-primary">Save</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
