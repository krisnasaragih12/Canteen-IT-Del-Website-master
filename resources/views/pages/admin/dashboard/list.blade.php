<div class="card card-flush shadow-sm">
    <div class="d-flex flex-row-start">
        <div class="col-md-6">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="text-muted font-weight-bold">{{ __('Daftar Menu Makanan') }}</span>
                </h3>
            </div>
            <div class="card-body">
                @foreach ($announcements as $key => $value)
                    @if ($value->category_id == 2 && $value->created_at->diffInDays(Carbon\Carbon::now()) <= 1)
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span class="text-muted font-weight-bold">{{ $value->title }}&nbsp;
                                        @if ($value->created_at->diffInHours(Carbon\Carbon::now()) < 5)
                                        <span class="badge badge-pill badge-success">New</span>
                                        @endif
                                    </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ substr($value->content, 0, strrpos(substr($value->content, 0, 200), ' ')) }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <p>
                                    <a href="javascript:;" onclick="load_detail('{{route('admin.dashboard.show',$value->id)}}');" class="menu-link px-3"><i class="fa fa-eye text-primary"></i>View</a>
                                </p>
                            </div>
                        </div>
                        <hr class="my-4">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="text-muted font-weight-bold">{{ __('Pengumuman Terbaru') }}</span>
                </h3>
            </div>
            <div class="card-body">
                @foreach ($announcements as $key => $value)
                    @if ($value->category_id != 2)
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span class="text-muted font-weight-bold">{{ $value->title }}&nbsp;
                                        @if ($value->created_at->diffInHours(Carbon\Carbon::now()) < 5)
                                        <span class="badge badge-pill badge-success">New</span>
                                        @endif
                                    </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ substr($value->content, 0, strrpos(substr($value->content, 0, 200), ' ')) }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <p>
                                    <a href="javascript:;" onclick="load_detail('{{route('admin.dashboard.show',$value->id)}}');" class="menu-link px-3"><i class="fa fa-eye text-primary"></i>View</a>
                                </p>
                            </div>
                        </div>
                        <hr class="my-4">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>