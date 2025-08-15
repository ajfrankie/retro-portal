<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.category.index') }}" class="waves-effect">
                        <i class="bx bx-category"></i>
                        <span key="t-chat">Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.cake.index') }}" class="waves-effect">
                        <i class="bx bx-cake"></i>
                        <span key="t-chat">Cakes</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.size.index') }}" class="waves-effect">
                        <i class="bx bx-cake"></i>
                        <span key="t-chat">Sizes</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.onsite.index') }}" class="waves-effect">
                        <i class="bx bx-cake"></i>
                        <span key="t-chat">Onsite Order</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.customizedOrder.index') }}" class="waves-effect">
                        <i class="bx bx-cake"></i>
                        <span key="t-chat">Customized Order</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
