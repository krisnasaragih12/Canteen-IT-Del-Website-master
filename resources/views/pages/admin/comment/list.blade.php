<div class="card card-flush shadow-sm">
    <div class="d-flex flex-row-start">
        <div class="col-md-6">
            <div class="p-2">
                <h5 class="card-title">Komentar</h5>
                <p class="card-text">
                    @foreach($comments as $comment)
                    <div class="card card-flush card-custom card-stretch gutter-b shadow-sm">
                        <div class="card-body">
                            <div class="card-title">
                                <p class="card-text text-muted">
                                    By: {{ $comment->user->name }}
                                </p>
                                <span class="card-subtitle">
                                    {{ $comment->created_at }}
                                </span>
                            </div>
                            <div class="card-content">
                                <p class="card-text">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                        <form id="form_input">
                            <div class="card-footer">
                                @foreach($comment->replies as $reply)
                                <hr class="my-2">
                                <div class="card-content">
                                    <p class="card-text">Reply by: Admin</p>
                                    <p class="card-text">
                                        {{ $reply->content }}
                                    </p>
                                </div>
                                <div class="row">
                                    <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('admin.comment.destroy', $reply->id) }}');" class="menu-link px-3 text-end"><i class="fa fa-trash text-danger"></i>Delete</a>
                                </div>
                                @endforeach
                            <textarea class="form-control form-control-lg form-control-solid h-100px"
                                name="content[{{ $comment->id }}]" id="content"
                                placeholder="Reply..."></textarea><br>
                            <a href="javascript:;" id="tombol_simpan"
                                onclick="reply('#tombol_simpan', '#form_input', '{{route('admin.comment.reply', $comment->id)}}', '{{ $comment->id }}')"
                                class="btn btn-sm btn-primary">Save</a>
                        </form>
                    </div>
            </div><br>
            @endforeach
            </p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="p-2">
            <h5 class="card-title">Saran</h5>
            <p class="card-text">
                @foreach($suggests as $suggest)
                <div class="card card-custom card-stretch gutter-b shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <p class="card-text text-muted">
                                By: {{ $suggest->user->name }}
                            </p>
                            <span class="card-subtitle">
                                {{ $suggest->created_at }}
                            </span>
                        </div>
                        <div class="card-content">
                            <p class="card-text">
                                {{ $suggest->content }}
                            </p>
                        </div>
                    </div>
                </div><br>
                @endforeach
            </p>
        </div>
    </div>
</div>
</div>
<script>
    function reply(tombol, form, url, comment_id) {
        var content = document.querySelector('textarea[name="content[' + comment_id + ']"]').value;
        $(tombol).html('Please wait...');
        $(tombol).attr('disabled', true);
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                content: content,
            },
            success: function (response) {
                if (response.alert == "success") {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, Mengerti!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    $(form)[0].reset();
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html('Save');
                        main_content('content_list');
                        load_list(1);
                    }, 2000);
                } else {
                    Swal.fire({
                        text: response.message,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, Mengerti!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html('Save');
                    }, 2000);
                }
            }
        });
    }
</script>