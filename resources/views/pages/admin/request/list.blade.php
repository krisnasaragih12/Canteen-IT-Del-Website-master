<div class="card-body">
    <div class="card card-flush shadow-sm">
        <table class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Izin</th>
                    <th>Keterangan</th>
                    <th>Lampiran</th>
                    <th>Waktu Requests</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requestsModel as $key => $value)
                    <tr>
                        <td>{{ $key+$requestsModel->firstItem() }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->user->nim }}</td>
                        <td>{{ $value->user->prodi }}</td>
                        <td>
                            {{ $value->Permission->name }}&nbsp;
                            @if ($value->created_at->diffInDays(Carbon\Carbon::now()) < 1)
                                <span class="badge badge-pill badge-success fs-9">Today</span>
                            @endif
                        </td>
                        <td>{{ $value->description }}</td>
                        <td>
                            @if ($value->file)
                                <a href="{{asset('storage/public/requests/'.$value->file)}}" target="_blank">{{$value->file}}</a>
                            @else
                                Belum ada lampiran
                            @endif
                        </td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                            @if($value->status == 'pending')
                            <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PATCH','{{ route('admin.requests.approve', $value->id) }}');" class="btn btn-sm btn-success">Approve</a><br><br>
                            <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','PATCH','{{ route('admin.requests.reject', $value->id) }}');" class="btn btn-sm btn-danger">Reject</a>
                            @elseif($value->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                            @elseif($value->status == 'rejected')
                            <span class="badge badge-danger">Rejected</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $requestsModel->links('theme.app.pagination') }}
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