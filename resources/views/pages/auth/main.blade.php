<x-auth-layout title="Masuk">
    <div id="page_login">
		<!--begin::Wrapper-->
		<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
		    <!--begin::Form-->
			<form class="form w-100" novalidate="novalidate" id="form_login">
			    <!--begin::Heading-->
			    <div class="text-center mb-10">
			        <!--begin::Title-->
			        <h1 class="text-dark mb-3">Sign In Kantin IT Del</h1>
			        <!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-400 fw-bold fs-4">Belum Punya Akun?
						<a href="javascript:;" onclick="auth_content('page_register');" class="link-primary fw-bolder">Buat Akun</a>
                    </div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->
				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<!--begin::Label-->
					<label class="form-label fs-6 fw-bolder text-dark required">Username</label>
					<!--end::Label-->
					<!--begin::Input-->
					<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
					<!--end::Input-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<!--begin::Label-->
					<label class="form-label fw-bolder text-dark fs-6 mb-0 required">Password</label>
					<!--end::Label-->
					<!--begin::Input-->
					<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
					<!--end::Input-->
				</div>
				<!--end::Input group-->
				<!--begin::Actions-->
				<div class="text-center">
					<!--begin::Submit button-->
					<button type="submit" id="tombol_login" onclick="handle_login('#tombol_login','#form_login','{{route('auth.login')}}');" class="btn btn-lg btn-primary w-100 mb-5">
						<span class="indicator-label">Login</span>
						<span class="indicator-progress">Please wait...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
					<!--end::Submit button-->
				</div>
				<!--end::Actions-->
			</form>
			<!--end::Form-->
		</div>
		<!--end::Wrapper-->
    </div>
    <div id="page_register">
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" id="form_register">
                <!--begin::Heading-->
                <div class="mb-10 text-center">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Buat Akun</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">Sudah memiliki akun?
                    <a href="javascript:;" onclick="auth_content('page_login');" class="link-primary fw-bolder">Masuk di Sini</a></div>
                    <!--end::Link-->
                </div>
                <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <label class="form-label fw-bolder text-dark fs-6">Nama</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />
                    <!--end::Col-->
                </div>
                <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <label class="form-label fw-bolder text-dark fs-6">Username</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="username" autocomplete="off" />
                    <!--end::Col-->
                </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
                </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">No. Phone</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="phone" autocomplete="off" />
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                    <!--end::Hint-->
                </div>
                <!--end::Input group=-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="button" id="tombol_register" onclick="handle_post('#tombol_register','#form_register','{{route('auth.register')}}');" class="btn btn-lg btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    @section('custom_js')
        <script>
            auth_content('page_login');
            function handle_login(tombol, form, url) {
                $(tombol).prop("disabled", true);
                $(tombol).attr("data-kt-indicator", "on");
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.alert == 'success') {
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function() {
                                window.location.href = response.redirect;
                            });
                        } else {
                            $(tombol).prop("disabled", false);
                            $(tombol).removeAttr("data-kt-indicator");
                            Swal.fire({
                                text: response.message,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    },
                });
            }
        </script>
    @endsection
</x-auth-layout>