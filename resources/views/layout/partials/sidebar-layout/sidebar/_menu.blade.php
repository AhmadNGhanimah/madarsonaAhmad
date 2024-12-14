<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
         data-kt-scroll-activate="true" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
         data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu"
             data-kt-menu="true" data-kt-menu-expand="false">
            <div class="menu-item {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('dashboard') }}">
                    <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    <span class="menu-title">Dashboards</span>
                </a>
            </div>

            <div class="menu-item ">
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
                </div>
            </div>

            <div class="menu-item {{ request()->routeIs('schools.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('schools.index') }}">
                    <span class="menu-icon">
                          <i class="fa fa-school fa-xl"></i>
                    </span>
                    <span class="menu-title">Schools</span>
                </a>
            </div>

            <div class="menu-item {{ request()->routeIs('suppliers.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('suppliers.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-industry text-hover-primary fa-xl"></i>
                    </span>
                    <span class="menu-title">Suppliers</span>
                </a>
            </div>

            <div class="menu-item {{ request()->routeIs('news.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('news.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-newspaper text-hover-primary fa-xl"></i>
                    </span>
                    <span class="menu-title">Main News</span>
                </a>
            </div>

            <div class="menu-item {{ request()->routeIs('subscriptions.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('subscriptions.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-font-awesome text-hover-primary fa-xl"></i>
                    </span>
                        <span class="menu-title">Subscriptions</span>
                </a>
            </div>


            <div class="menu-item {{ request()->routeIs('contacts.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('contacts.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-contact-book text-hover-primary fa-xl"></i>
                    </span>
                    <span class="menu-title">Contacts</span>
                </a>
            </div>

            <div class="menu-item ">
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Job</span>
                </div>
            </div>

            <div class="menu-item {{ request()->routeIs('teachers.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('teachers.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-chalkboard-teacher  fa-xl"></i>
                    </span>
                    <span class="menu-title">Teachers</span>
                </a>
            </div>

            <div class="menu-item {{ request()->routeIs('vacancies.*') ? 'here show' : '' }}">
                <a class="menu-link" href="{{ route('vacancies.index') }}">
                    <span class="menu-icon">
                        <i class="fa fa-tasks fa-xl"></i>
                    </span>
                    <span class="menu-title">Vacancies</span>
                </a>
            </div>

            <div class="menu-item ">
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Admin Management</span>
                </div>
            </div>

            @role('administrator')

            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{ request()->routeIs('user-management.users.*') ? 'active' : '' }}"
                   href="{{ route('user-management.users.index') }}">
							<span class="menu-icon">
								 <i class="fa fa-users-cog  fa-xl"></i>
							</span>
                    <span class="menu-title">Accounts</span>
                </a>
                <!--end:Menu link-->
            </div>
            @endrole
        </div>
    </div>
</div>

