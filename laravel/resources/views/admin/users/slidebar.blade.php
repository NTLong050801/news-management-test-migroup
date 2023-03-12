<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-is-opening menu-open">
            <a href="{{route('admin.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Quản lý  Tin tức

                </p>
            </a>
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <p>
                   Loại tin

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item ">
                    <a href="{{route('admin.category.create')}}" class="nav-link bg-secondary">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm loại tin</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.category.listCategories')}}" class="nav-link  bg-secondary">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách loại tin</p>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
