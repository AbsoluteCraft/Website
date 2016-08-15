<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ route('dashboard.home') }}" class="logo">
                <span class="fa fa-area-chart"></span>
                <p>AbsoluteCraft</p>
            </a>
        </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="pull-left">
                <button class="button-menu-mobile open-left">
                    <span class="fa fa-bars"></span>
                </button>
                <span class="clearfix"></span>
            </div>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li>
                    <div class="notification-box">
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="right-bar-toggle">
                                    <span class="fa fa-bell-o"></span>
                                </a>
                                @if(isset($notifications) && count($notifications) > 0)
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle avatar" data-toggle="dropdown" aria-expanded="true">
                        <img src="{{ player_avatar(Auth::user()->uuid) }}" alt="{{ Auth::user()->username }}">
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ route('player', ['username' => Auth::user()->username]) }}"><span class="fa fa-user fa-fw"></span> Profile</a></li>
                        <li><a href="{{ route('home') }}"><i class="fa fa-external-link fa-fw"></i> Exit Dashboard</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
