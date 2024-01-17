<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo py-8" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#" class="d-flex align-items-center">
            <img alt="Logo" src="{{asset('img/Logo.png')}}" class="h-45px logo">
        </a>
        <!--end::Logo-->
    </div>
    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px" style="height: 507px;">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item py-2">
                    @php
                    $dashboard = '';
                    $announcement = '';
                    $schedule = '';
                    $allergy = '';
                    $request = '';
                    $comment = '';
                    $role = Auth::user()->role;
                    if($role == "admin"){
                    $dashboard = route('admin.dashboard.index');

                    }
                    else {
                    $dashboard = route('web.dashboard.index');

                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/dashboard') || request()->is('user/dashboard') ? 'active' : ''}} menu-center"
                        href="{{ $dashboard }}" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    @php
                    if($role == "admin"){
                    $announcements = route('admin.announcements.index');

                    }
                    else {
                    $announcements = route('web.announcements.index');

                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/announcements') || request()->is('user/announcements') ? 'active' : ''}} menu-center"
                        href="{{ $announcements }}" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-info-circle-fill fs-2"></i>
                        </span>
                        <span class="menu-title">Announcements</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    @php
                    if($role == "admin"){
                    $schedule = route('admin.schedule.index');

                    }
                    else {
                    $schedule = route('web.schedule.index');

                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/schedule') || request()->is('user/schedule') ? 'active' : ''}} menu-center"
                        href="{{ $schedule }}" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-map"></i>
                        </span>
                        <span class="menu-title">Map & Schedule</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    @php
                    if($role == "admin"){
                    $allergy = route('admin.allergy.index');

                    }
                    else {
                    $allergy = route('web.allergy.index');

                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/allergy') || request()->is('user/allergy') ? 'active' : ''}} menu-center"
                        href="{{ $allergy }}" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-egg-fried"></i>
                        </span>
                        <span class="menu-title">Allergy</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    @php
                    if($role == "admin"){
                    $request = route('admin.requests.index');

                    }
                    else {
                    $request = route('web.requests.index');

                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/requests') || request()->is('user/requests') ? 'active' : ''}} menu-center"
                        href="{{ $request }}" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-person-lines-fill"></i>
                        </span>
                        <span class="menu-title">Permission</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    @php
                    if($role == "admin"){
                    $comment = route('admin.comment.index');

                    }
                    else {
                    $comment = route('web.comment.index');

                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/comment') || request()->is('user/comment') ? 'active' : ''}} menu-center"
                        href="{{ $comment }}" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-chat-dots"></i>
                        </span>
                        <span class="menu-title">Comment & Suggest</span>
                    </a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>