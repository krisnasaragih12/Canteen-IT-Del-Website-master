<div class="card-body">
    <div class="card card-flush shadow-sm">
        <table class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                    <th>No</th>
                    <th>Nama Izin</th>
                    <th>Keterangan</th>
                    <th>File Lampiran</th>
                    <th>Waktu Request</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requestsModel as $key => $request)
                    <tr>
                        <td>{{$key+$requestsModel->firstItem()}}</td>
                        <td>{{$request->permission->name}}</td>
                        <td>{{$request->description}}</td>
                        <td>
                            @if($request->file == null)
                                <p class="text-danger">Tidak ada lampiran</p>
                            @else    
                            <a href="{{ asset('storage/public/requests/' .$request->file) }}" target="_blank">
                                <i class="fas fa-file-alt"></i>
                                {{ $request->file }}
                            </a>
                            @endif
                        </td>
                        <td>{{$request->created_at}}</td>
                        <td>
                            @if ($request->status == 'pending')
                                <span class="badge badge-pill badge-warning">Pandding</span>
                            @elseif ($request->status == 'approved')
                                <span class="badge badge-pill badge-success">Approved</span>
                            @elseif ($request->status == 'rejected')
                                <span class="badge badge-pill badge-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            @if ($request->status == 'pending')
                                <a href="javascript:;" onclick="load_input('{{route('web.requests.edit',$request->id)}}');" class="menu-link px-3"><i class="fa fa-edit text-warning"></i>Edit</a>
                                <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{route('web.requests.destroy',$request->id)}}');" class="menu-link px-3"><i class="fa fa-trash text-danger"></i>Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr size="8" style="color: #dd4b39">
    <div class="container">
        <h6>Pedoman Izin Tidak Makan di Kantin</h6>
        <ul>
            <li>Mahasiswa mengisi pengajuan izin tidak makan di kantin selambatnya 1 jam sebelum kegiatan makan dimulai.</li>
            <li>Mahasiswa yang tidak mengajukan izin tidak makan dikantin tidak diizinkan untuk tidak hadir saat kegiatan makan dimulai kecuali dalam kondisi mendesak.</li>
            <li>Mahasiswa yang piket harus mencari pengganti disaat jadwal piket.</li>
            <li>Apabila izin tidak di approve, mahasiswa tidak diperbolehkan untuk tidak hadir saat jam makan.</li>
            <li>Mahasiswa tidak dapat mengajukan izin tidak makan dikantin apabila sudah melebihi jatah izin</li>
        </ul>
    </div>
</div>