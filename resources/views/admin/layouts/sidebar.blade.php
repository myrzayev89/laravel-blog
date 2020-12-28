<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sayta get</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Ana Səhifə</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Bölmələr
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bölmələrin Siyahısı</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Bölmə</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Taqlar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tags.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Taqların Siyahısı</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tags.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Taq</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>
                            Məqalələr
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Məqalələrin Siyahısı</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Məqalə</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
@section('footer')
<script>
    $(document).ready(function () {
        $('.nav-sidebar a').each(function () {
            let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
            let link = this.href;
            if (link == location) {
                $(this).addClass('active');
                $(this).closest('.has-treeview').addClass('menu-open');
            }
        });
    });
</script>
@endsection
