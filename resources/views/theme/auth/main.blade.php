<!DOCTYPE html>
<html lang="en">
	@include('theme.auth.head')
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('assets/media/illustrations/sketchy-1/14.png') }})">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					{{$slot}}
				</div>
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		@include('theme.auth.js')
		@yield('custom_js')
	</body>
</html>