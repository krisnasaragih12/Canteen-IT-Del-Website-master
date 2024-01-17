<div class="card card-flush shadow-sm">
    <div class="card-header">
        <h3 class="card-title fs-3">
            {{ $announcement->title }}
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('web.dashboard.index') }}" class="btn btn-icon btn-sm btn-active-light-primary ms-2">
                <i class="las la-times"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <p class="form-control-static">{{ $announcement->content }}</p>             
            </div>
        </div>
    </div>
    <div class="card-footer">
        <p>
            @if ($announcement->file)
                <a href="{{asset('storage/public/announcements/'.$announcement->file)}}" target="_blank">{{$announcement->file}}</a>
            @else
                -
            @endif
        </p>
    </div>
</div>
