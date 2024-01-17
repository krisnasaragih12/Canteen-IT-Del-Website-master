<div class="card-body">
    <div class="card card-flush shadow-sm">
        <table class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Konten</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $key => $value)
                    <tr>
                        <td>{{$key+$announcements->firstItem()}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->category->name}}</td>
                        <td>{{$value->content}}</td>
                        <td>
                            @if ($value->file)
                                <a href="{{asset('storage/public/announcements/'.$value->file)}}" target="_blank">{{$value->file}}</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="javascript:;" onclick="load_input('{{route('admin.announcements.edit',$value->id)}}');" class="menu-link px-3"><i class="fa fa-edit text-warning"></i>Edit</a>
                                <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{route('admin.announcements.destroy',$value->id)}}');" class="menu-link px-3"><i class="fa fa-trash text-danger"></i>Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    {{ $announcements->links('theme.app.pagination') }}
</div>