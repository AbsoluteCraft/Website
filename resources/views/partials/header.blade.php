<header class="header{{ $page == 'home' ? ' home' : '' }}{{ isset($motd) ? ' has-motd' : '' }}">
    <div class="topbar">
        <div class="container">
            <nav class="social">
                <a href="https://twitter.com/absolute_craft" title="Twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                <a href="https://www.facebook.com/AbsoluteCraftMC" title="Facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                <a href="https://www.youtube.com/AbsoluteCraftMC" title="YouTube"><span class="fa fa-youtube-play" aria-hidden="true"></span></a>
                <a href="http://www.planetminecraft.com/TeamAbsolute" title="Planet Minecraft"><span class="fa fa-globe" aria-hidden="true"></span></a>
            </nav>
            <button type="button" class="btn btn-primary btn-sm btn-copy-ip">Copy IP</button>
            <span class="hide" id="ip-address">{{ trans('general.ip') }}</span>
        </div>
    </div>
    <div class="header-nav container">
        <a href="{{ route('home') }}">
            <picture>
                <source srcset="{{ asset('img/logo.svg') }}">
                <img src="{{ asset('img/logo.png')}}" alt="{{ trans('general.name') }}" class="logo">
            </picture>
        </a>
        <button type="button" class="menu">
            <div class="bar"></div>
        </button>
        <nav class="nav">
            <a href="{{ route('home') }}"{{ nav_active($page, 'home') }}>{{ trans('nav.home') }}</a>
            <a href="shop"{{ nav_active($page, 'shop') }}>{{ trans('nav.shop') }}</a>
            <a href="projects"{{ nav_active($page, 'projects') }}>{{ trans('nav.projects') }}</a>
            <a href="players"{{ nav_active($page, 'players') }}>{{ trans('nav.players') }}</a>
            <a href="leaderboards"{{ nav_active($page, 'leaderboards') }}>{{ trans('nav.leaderboards') }}</a>
            <span class="divider"></span>
            @if(Auth::check())
                <button type="button" class="btn btn-sm btn-user">
                    <img src="https://crafatar.com/avatars/{{ Auth::user()->username }}?size=16&overlay&default=371e57a02c0e4875ab952373447b63db" alt="{{ Auth::user()->username }}">
                </button>
            @else
                <div class="dropdown">
                    <a href="{{ route('auth.login') }}" id="dropdown-user" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="btn btn-user">
                        <img src="{{ player_avatar('371e57a02c0e4875ab952373447b63db') }}" alt="Guest">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown-user">
                        <li><a href="{{ route('auth.login') }}">{{ trans('nav.login') }}</a></li>
                        <li><a href="{{ route('auth.register') }}">{{ trans('nav.register') }}</a></li>
                    </ul>
                </div>
            @endif
            <button type="button" class="btn btn-sm btn-cart"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button>
        </nav>
    </div>
    @if($page == 'home')
        <div class="hero container">
            <div class="col-sm-8 col-sm-offset-2">
                <h3>{{ trans('home.subtitle') }}</h3>
                <h2>{{ trans('home.title') }}</h2>
                <p>{{ trans('home.description') }}</p>
                <a href="{{ trans('home.discord.code') }}" target="_blank" class="btn btn-primary btn-lg">{{ trans('home.discord.apply') }}</a>
            </div>
        </div>
    @endif
    @if(isset($motd))
        <div class="motd motd-{{ $motd->type }}">
            <div class="container">
                @if($motd->icon)
                    <span class="fa fa-{{ $motd->icon }}"></span>
                @endif
                {!! $motd->message !!}
            </div>
        </div>
    @endif
</header>