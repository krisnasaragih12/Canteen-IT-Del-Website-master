<div class="card-body">
    <div class="card card-flush shadow-sm">
        <table class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Alergi</th>
                    <th>Lampiran Surat Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $key => $value)
                    <tr>
                        <td>{{$key+$report->firstItem()}}</td>
                        <td>{{$value->user->name}}</td>
                        <td>{{$value->user->nim}}</td>
                        <td>{{$value->user->prodi}}</td>
                        <td>{{$value->allergy->name}}</td>
                        <td>
                            @if ($value->file)
                                <a href="{{asset('storage/public/allergies/'.$value->file)}}" target="_blank">{{$value->file}}</a>
                            @else
                                Belum ada lampiran
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{route('admin.allergy.destroy',$value->id)}}');" class="menu-link px-3"><i class="fa fa-trash text-danger"></i>Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $report->links('theme.app.pagination') }}
    </div>
</div>