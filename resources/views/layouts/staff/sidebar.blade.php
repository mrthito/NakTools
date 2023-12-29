<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="{{ config('app.name') }}">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="{{ config('app.name') }}">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}">
                    </use>
                </svg>
                Dashboard
            </a>
        </li>
        <li class="nav-title">Theme</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
                </svg>
                Customer KYC
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.kyc-docs.index', ['status' => 'Pending']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-cloud-upload') }}">
                        </svg>
                        New Submitted
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.kyc-docs.index', ['status' => 'Approved']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-check-circle') }}">
                            </use>
                        </svg>
                        Approved
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.kyc-docs.index', ['status' => 'Rejected']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-x-circle') }}">
                            </use>
                        </svg>
                        Rejected
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.kyc-docs.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-view-stream') }}">
                            </use>
                        </svg>
                        All KYC List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.check-docs') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-zoom') }}"></use>
                        </svg>
                        Check Required Docs
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use>
                </svg>
                Shipments
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.shipments.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-flight-takeoff') }}">
                        </svg>
                        New Manifested
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.shipments.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-warning') }}">
                            </use>
                        </svg>
                        Abandoned
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.shipments.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-list') }}">
                            </use>
                        </svg>
                        All Shipments List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.shipments.track') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-zoom') }}"></use>
                            </use>
                        </svg>
                        Track Shipment
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-dollar') }}"></use>
                </svg>
                Recharge &amp; Payments
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.recharges.new') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-star') }}">
                        </svg>
                        New Recharge
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.recharges.manual') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-cash') }}">
                            </use>
                        </svg>
                        Manual Recharge
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.recharges.po') }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-playlist-add') }}">
                            </use>
                        </svg>
                        PO Request List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.recharges.histories') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                            </use>
                        </svg>
                        Transactions History
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-tags') }}"></use>
                </svg>
                Escalations &amp; Disputes
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.escalations.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bullhorn') }}">
                        </svg>
                        New Tickets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.escalations.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}">
                            </use>
                        </svg>
                        Open Tickets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.escalations.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-sad') }}">
                            </use>
                        </svg>
                        Dispute Tickets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.escalations.index', ['status' => '']) }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-mood-very-good') }}">
                            </use>
                            </use>
                        </svg>
                        Escalated Tickets
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-cog') }}"></use>
                </svg>
                Settings
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.departments.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-contact') }}">
                        </svg>
                        Departments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.categories.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}">
                        </svg>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.role-assignments.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-people') }}">
                        </svg>
                        Role Assignment
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.feedbacks.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-pen-alt') }}">
                        </svg>
                        Staff Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.kyc.noticeboards.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bullhorn') }}">
                        </svg>
                        Staff Noticeboard
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.kyc.users.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                </svg>
                Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.kyc.reports.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-graph') }}"></use>
                </svg>
                User Reports
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.kyc.timelines.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-monitor') }}"></use>
                </svg>
                My Timeline
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.kyc.developers.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-code') }}"></use>
                </svg>
                Developer Notifications
            </a>
        </li>
        <li class="nav-title">Components</li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                </svg>
                Buttons
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="buttons/buttons.html">
                        <span class="nav-icon"></span>
                        Buttons
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buttons/button-group.html">
                        <span class="nav-icon"></span>
                        Buttons
                        Group
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buttons/dropdowns.html">
                        <span class="nav-icon"></span>
                        Dropdowns
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}">
                    </use>
                </svg>
                Charts
            </a>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-notes') }}"></use>
                </svg>
                Forms
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="forms/form-control.html"> Form Control
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/select.html"> Select
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/checks-radios.html"> Checks and radios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/range.html"> Range
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/input-group.html"> Input group
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/floating-labels.html"> Floating labels
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/layout.html"> Layout
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forms/validation.html"> Validation
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                </svg>
                Icons
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span
                            class="badge badge-sm bg-success ms-auto">Free</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons -
                        Brand
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons -
                        Flag
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                </svg>
                Notifications
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="notifications/alerts.html">
                        <span class="nav-icon"></span>
                        Alerts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notifications/badge.html">
                        <span class="nav-icon"></span>
                        Badge
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notifications/modals.html">
                        <span class="nav-icon"></span>
                        Modals
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notifications/toasts.html">
                        <span class="nav-icon"></span>
                        Toasts
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="widgets.html">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-calculator') }}">
                    </use>
                </svg>
                Widgets<span class="badge badge-sm bg-info ms-auto">NEW</span>
            </a>
        </li>
        <li class="nav-divider"></li>
        <li class="nav-title">Extras</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                </svg>
                Pages
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="login.html" target="_top">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                            </use>
                        </svg>
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.html" target="_top">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                            </use>
                        </svg>
                        Register
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="404.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bug') }}">
                            </use>
                        </svg>
                        Error 404
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="500.html" target="_top">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-bug') }}">
                            </use>
                        </svg>
                        Error 500
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item mt-auto">
            <a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-description') }}">
                    </use>
                </svg>
                Docs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
                </svg>
                Try CoreUI
                <div class="fw-semibold">PRO</div>

            </a>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
