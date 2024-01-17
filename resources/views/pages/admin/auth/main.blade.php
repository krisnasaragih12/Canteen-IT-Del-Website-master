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
					<!--begin::Wrapper-->
					<div class="d-flex flex-stack mb-2">
						<!--begin::Label-->
						<label class="form-label fw-bolder text-dark fs-6 mb-0 required">Password</label>
						<!--end::Label-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Input-->
	    			<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
				<!--end::Input-->
				</div>
				<!--end::Input group-->
				<!--begin::Actions-->
				<div class="text-center">
					<!--begin::Submit button-->
					<button type="submit" id="tombol_login" onclick="handle_post('#tombol_login','#form_login','{{route('admin.auth.login')}}');" class="btn btn-lg btn-primary w-100 mb-5">
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
    </div>
    @section('custom_js')
        <script>
            auth_content('page_login');
        </script>
    @endsection
</x-auth-layout>