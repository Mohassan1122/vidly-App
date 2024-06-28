<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if (Session::get('page')=='dashboard') style="background: #4B49AC !important; color:#fff !important;" @endif class="nav-link" href="{{ url('superadmin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::guard('superadmin')->user()->type == "admin" )
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-admin" aria-expanded="false" aria-controls="ui-admin">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Admin Details</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-admin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ url('superadmin/update-admin-details/personal') }}">Company Personal Details</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ url('superadmin/update-admin-details/business') }}">Company Business Details</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ url('superadmin/update-admin-details/bank') }}">Company Bank Details</a></li>

                </ul>
            </div>
        </li>
        @else

        <li class="nav-item">
            <a  @if (Session::get('page')=='update-superadmin-detail' || Session::get('page')=='update-admin-password') style="background: #4B49AC !important; color:#fff !important;" @endif  class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu" style="background: #fff !important;color:#4B49AC !important;">
                <li class="nav-item"> <a  @if (Session::get('page')=='update-admin-password') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link"  href="{{ url('superadmin/update-admin-password') }}">Update Password </a></li>
                <li class="nav-item"> <a @if (Session::get('page')=='update-superadmin-detail') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link"  href="{{ url('superadmin/update-superadmin-details') }}">Update Details</a></li>
              </ul>
            </div>
          </li>


        
        <li class="nav-item">
            <a @if (Session::get('page')=='view_superadmin' || Session::get('page')=='view_admin'|| Session::get('page')=='view_all') style="background: #4B49AC !important; color:#fff !important;" @endif  class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Admin Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu" style="background: #fff !important;color:#4B49AC !important;">
                    <li class="nav-item"><a @if (Session::get('page')=='view_superadmin') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif class="nav-link" href="{{ url('superadmin/admins/superadmin') }}">Super Admin</a>
                    </li>
                    <li class="nav-item"><a @if (Session::get('page')=='view_admin') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link" href="{{ url('superadmin/admins/admin') }}">Admin</a>
                    </li>
                    <li class="nav-item"><a @if (Session::get('page')=='view_all') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link" href="{{ url('superadmin/admins') }}">All</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a @if (Session::get('page')=='sections' || Session::get('page')=='categories'|| Session::get('page')=='products') style="background: #4B49AC !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Catalogue Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catalogue">
                <ul class="nav flex-column sub-menu" style="background: #fff !important;color:#4B49AC !important;">
                    <li class="nav-item"> <a  @if (Session::get('page')=='sections') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link" href="{{ url('superadmin/sections') }}">Sections</a></li>
                    <li class="nav-item"> <a  @if (Session::get('page')=='categories') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link" href="{{ url('superadmin/categories') }}">Categories</a>
                    </li>
                    <li class="nav-item"> <a  @if (Session::get('page')=='brands') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link" href="{{ url('superadmin/brands') }}">Brands</a>
                    </li>
                    <li class="nav-item"> <a @if (Session::get('page')=='products') style="background: #4B49AC !important; color:#fff !important;"@else style="background: #fff !important; color:#4B49AC !important;" @endif  class="nav-link" href="{{ url('superadmin/products') }}">Products</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('superadmin/user') }}">Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('superadmin/subscribers') }}">Subscribers</a>
                    </li>
                </ul>
            </div>
        </li>

        @endif



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>