<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TASK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i><p>Dashboard</p>
                    </a>
                </li>
                <?php
                $user = \Illuminate\Support\Facades\Auth::user();
                if ($user)
                {
                    $is_admin_user = \App\User::where('is_admin',\App\User::YES)->whereId($user->id)->first();
                }
                ?>
                @if($user)
                    @if($is_admin_user)
                        <li class="nav-item">
                            <a href="{{route('user-view')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i><p>Users</p>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </nav>
    </div>
</aside>