<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="/dashboard">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-demo13.svg') }}" class="h-15px logo" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">

                <!-- Dashboard Section -->
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <span class="menu-icon">
                            <i class="bi bi-house fs-3"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>

                <!-- Polosan Section -->
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Polosan</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/polosan*') ? 'active' : '' }}"
                        href="/dashboard/polosan">
                        <span class="menu-icon">
                            <i class="bi bi-tablet fs-3"></i>
                        </span>
                        <span class="menu-title">Polosan</span>
                    </a>
                </div>

                <!-- Master Section -->
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Master</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/master/user*') ? 'active' : '' }}"
                        href="/dashboard/master/user">
                        <span class="menu-icon">
                            <i class="bi bi-person fs-3"></i>
                        </span>
                        <span class="menu-title">User</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/master/satuan*') ? 'active' : '' }}"
                        href="/dashboard/master/satuan">
                        <span class="menu-icon">
                            <i class="bi bi-shift fs-3"></i>
                        </span>
                        <span class="menu-title">Satuan</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/master/kecamatan*') ? 'active' : '' }}"
                        href="/dashboard/master/kecamatan">
                        <span class="menu-icon">
                            <i class="bi bi-justify fs-3"></i>
                        </span>
                        <span class="menu-title">Kecamatan</span>
                    </a>
                </div>

                <!-- Aktivitas Section -->
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Aktivitas</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/aktivitas/user*') ? 'active' : '' }}"
                        href="/dashboard/aktivitas/user">
                        <span class="menu-icon">
                            <i class="bi bi-stopwatch fs-3"></i>
                        </span>
                        <span class="menu-title">User</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/aktivitas/error_aplikasi*') ? 'active' : '' }}"
                        href="/dashboard/aktivitas/error_aplikasi">
                        <span class="menu-icon">
                            <i class="bi bi-exclamation-octagon fs-3"></i>
                        </span>
                        <span class="menu-title">Error Aplikasi</span>
                    </a>
                </div>

                <!-- Settings Section -->
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/settings/profile*') ? 'active' : '' }}"
                        href="/dashboard/settings/profile">
                        <span class="menu-icon">
                            <i class="bi bi-gear fs-3"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>

                <!-- Dynamic Menus Section -->
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dynamic Menus</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->is('dashboard/master/menu*') ? 'active' : '' }}"
                        href="/dashboard/master/menu">
                        <span class="menu-icon">
                            <i class="bi bi-plus-square fs-3"></i>
                        </span>
                        <span class="menu-title">Tambah Menu</span>
                    </a>
                </div>

                @foreach (App\Models\Menu::all() as $menu)
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('dashboard/' . $menu->slug . '*') ? 'active' : '' }}"
                            href="/dashboard/{{ $menu->slug }}">
                            <span class="menu-icon">
                                <i class="{{ $menu->icon ?? 'bi bi-folder' }} fs-3"></i>
                            </span>
                            <span class="menu-title">{{ $menu->name }}</span>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
