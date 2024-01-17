<div class="card-body">
    <div class="card card-flush shadow-sm">
        <table class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                    <th>No</th>
                    <th>Nama Kantin</th>
                    <th>Deskripsi</th>
                    <th>File Denah Kantin</th>
                    <th>File Jadwal Piket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->description}}</td>
                        <td>
                            @if ($value->file_map)
                                <a href="{{asset('storage/public/schedule/'.$value->file_map)}}" target="_blank">{{$value->file_map}}</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($value->file_schedule)
                                <a href="{{asset('storage/public/schedule/'.$value->file_schedule)}}" target="_blank">{{$value->file_schedule}}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $schedules->links('theme.app.pagination') }}
</div>