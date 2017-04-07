<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper text-center">
            @if(count(\App\Files::where('linkedid',Auth::user()->id)->get()) > 0)
                <img class="img-circle text-center" style="width: 180px;border: 1px solid #36c6d3;padding: 4px;height: 180px;margin-top: -5px;" src="{{ Request::root() }}/{{ \App\Files::where('linkedid',Auth::user()->id)->first()->path }}{{ \App\Files::where('linkedid',Auth::user()->id)->first()->filename }}" alt="الصورة الشخصية">
            @else
                <img class="img-circle text-center" style="width: 180px;border: 1px solid #36c6d3;padding: 4px;height: 180px;margin-top: -5px;" src="{{ Request::root() }}/admin/pages/img/avatars/profile.png" alt="الصورة الشخصية">
            @endif
            <h4 style="color: #ffffff">{{ Auth::user()->name }}</h4>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
        </li>
        <li class="nav-item start active open">
            <a href="{{ url('user') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">الرئيسية</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">المذيد</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('user') . '/' . Auth::user()->id .'/edit' }}" class="nav-link ">
                        <span class="title">تعديل الحساب</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('user/create') }}" class="nav-link ">
                        <span class="title">تعديل الجدول</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link nav-toggle">
                <i class="fa fa-sign-out"></i>
                <span class="title">تسجيل الخروج</span>
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>