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
                    @if($donations_count > 0)
                        <span class="label label-success pull-right">{{ $donations_count }}</span>
                    @endif
                    <p>Donations</p>
                </a>
            </li>
            <li{!! $page == 'motd' ? ' class="active"': '' !!}>
                <a href="{{ route('dashboard.motd') }}">
                    <span class="fa fa-commenting"></span> <p>MOTD</p>
                    @if($motds_count > 0)
                        <span class="label label-danger pull-right">{{ $motds_count }}</span>
                    @endif
                </a>
            </li>
            <li{!! $page == 'announcements' ? ' class="active"': '' !!}>
                <a href="{{ route('dashboard.announcements') }}">
                    <span class="fa fa-bullhorn"></span> <p>Announcements</p>
                </a>
            </li>
        </ul>
    </div>
</div>