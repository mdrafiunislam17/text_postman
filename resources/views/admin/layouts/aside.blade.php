<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="#" class="w-75" alt="">
            </div>
            <h6 class="sidebar-brand-text mx-3 mt-2 font-weight-bold" title="K">k</h6>
        </a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('todo.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('todo.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Todo</span>
        </a>
    </li>


</ul>
