<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <div class="user-panel">
            <div class="pull-left image">
                <img src="upload/{{Session::get('img')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Session::get('name')}} </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
{{--            <li class="active treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
{{--                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>User</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('list_user')}}"><i class="fa fa-circle-o"></i> List User</a></li>
                    <li><a href="{{route('add_user')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Loại Sản Phẩm</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/loaisp/list_loaisp"><i class="fa fa-circle-o"></i>List Loại SP</a></li>
                    <li><a href="admin/loaisp/add_loaisp"><i class="fa fa-circle-o"></i>Add Loại SP</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Sản Phẩm</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="admin/sanpham/list_sanpham"><i class="fa fa-circle-o"></i>List sản phẩm</a></li>
                    <li><a href="admin/sanpham/add_sanpham"><i class="fa fa-circle-o"></i>Add sản phẩm</a></li>

                </ul>
            </li>


            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>