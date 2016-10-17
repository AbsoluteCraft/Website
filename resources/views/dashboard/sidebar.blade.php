<div class="sidebar">
    <div class="sidebar-inner">
        <ul>
            <li{!! $page == 'home' ? ' class="active"': '' !!}>
                <a href="{{ route('dashboard.home') }}">
                    <span class="fa fa-th-large"></span> <p>Dashboard</p>
                </a>
            </li>
            <li{!! $page == 'users' ? ' class="active"': '' !!}>
                <a href="{{ route('dashboard.users') }}">
                    <span class="fa fa-users"></span> <p>Users</p>
                </a>
            </li>
            <li{!! $page == 'donations' ? ' class="active"': '' !!}>
                <a href="{{ route('dashboard.donations') }}">
                    <span class="fa fa-gbp"></span>
                    <span class="label label-success pull-right">{{ $donations_count }}</span>
                    <p>Donations</p>
                </a>
            </li>

        </ul>
    </div>
</div>