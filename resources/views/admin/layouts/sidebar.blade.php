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
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="nav-item start active open">
            <a href="{{ url('/') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">الرئيسية</span>
                <span class="selected"></span>
            </a>
        </li>
        @if(Auth::user()->type == '1')
            <li class="heading">
                <h3 class="uppercase">الخصائص</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-hospital-o"></i>
                    <span class="title">المستشفيات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('/') }}" class="nav-link ">
                            <span class="title">عرض الكل</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('hospital/create') }}" class="nav-link ">
                            <span class="title">اضافة جديدة +</span>
                        </a>
                    </li>
                </ul>
            </li>
        @elseif(Auth::user()->type == 0)
            <li class="heading">
                <h3 class="uppercase">الخصائص</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">العنايات المركزة</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('intensive_care') }}" class="nav-link ">
                            <span class="title">عرض الكل</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('intensive_care/create') }}" class="nav-link ">
                            <span class="title">اضافة جديدة +</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bed"></i>
                    <span class="title">السرير</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('beds') }}" class="nav-link ">
                            <span class="title">عرض الكل</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('beds/create') }}" class="nav-link ">
                            <span class="title">اضافة جديدة +</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">المرضي</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('patients') }}" class="nav-link ">
                                    <span class="title">عرض الكل</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('patients/create') }}" class="nav-link ">
                            <span class="title">اضافة جديدة +</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">موظفين الاستقبال</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('receptionist') }}" class="nav-link ">
                            <span class="title">عرض الكل</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('receptionist/create') }}" class="nav-link ">
                            <span class="title">اضافة جديدة +</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="nav-item  ">
            <a href="{{ url('account') }}" class="nav-link nav-toggle">
                <i class="fa fa-cogs"></i>
                <span class="title">تعديل الحساب</span>
                {{--<span class="arrow"></span>--}}
            </a>
        </li>
    </ul>
</div>