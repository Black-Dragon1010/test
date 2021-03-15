<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{asset(Auth::user()->avatar)}}" alt="User Image" data-nsfw-filter-status="sfw" style="visibility: visible; filter: opacity(1);" data-image-blur-on-load-update-occured="true">
        <div>
            <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
            <p class="app-sidebar__user-designation">{{Auth::user()->role}}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item
             @if (\Request::is('manage'))
             active
             @endif
             " href="{{route('index')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item
            @if (\Request::is('manage/users'))
             active
             @endif" href="{{route('users')}}">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                <span class="app-menu__label">Users</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item
            @if (\Request::is('manage/blogs'))
             active
             @endif" href="{{route('blogs')}}">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                <span class="app-menu__label">Posts</span>
            </a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="http://pratikborsadiya.in/vali-admin/dashboard.html#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="http://pratikborsadiya.in/vali-admin/dashboard.html#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="http://pratikborsadiya.in/vali-admin/dashboard.html#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
                <li><a class="treeview-item" href="http://pratikborsadiya.in/vali-admin/page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="http://pratikborsadiya.in/vali-admin/docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
    </ul>
</aside>