<div class="card-header">
    <h3 class="card-title">Announcement</h3>
</div>
<div class="card-body">
    @foreach ($announcements as $key => $value)
        <div class="card card-flush shadow-sm">
            <div class="card-header">
                <h3 class="card-title">{{ $value->title }}&nbsp;
                    @if ($value->created_at->diffInHours(Carbon\Carbon::now()) < 5)
                    <span class="badge badge-pill badge-success">New</span>
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <p>
                    {{ substr($value->content, 0, strrpos(substr($value->content, 0, 200), ' ')) }}
                </p>
            </div>
            <div class="card-footer">
                <p>
                    <a href="javascript:;" onclick="load_detail('{{route('web.announcements.show',$value->id)}}');" class="menu-link px-3"><i class="fa fa-eye text-primary"></i>View</a>
                </p>
            </div>
        </div>
        <hr class="my-4">
    @endforeach
</div>
{{ $announcements->links('theme.app.pagination') }}