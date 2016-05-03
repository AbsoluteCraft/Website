<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>AbsoluteCraft</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <header class="header{{ $page == 'home' ? ' home' : '' }}">
        <div class="topbar">
            <div class="container">
                <nav class="social">
                    <a href="https://twitter.com/absolute_craft" title="Twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                    <a href="https://www.facebook.com/AbsoluteCraftMC" title="Facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                    <a href="https://www.youtube.com/AbsoluteCraftMC" title="YouTube"><span class="fa fa-youtube-play" aria-hidden="true"></span></a>
                    <a href="http://www.planetminecraft.com/TeamAbsolute" title="Planet Minecraft"><span class="fa fa-globe" aria-hidden="true"></span></a>
                </nav>
                <button type="button" class="btn btn-primary btn-sm btn-copy-ip">Copy IP</button>
            </div>
        </div>
        <div class="header-nav container">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png')}}" alt="AbsoluteCraft" class="logo">
            </a>
            <nav class="nav">
                <a href="{{ route('home') }}"{{ nav_active($page, 'home') }}>Home</a>
                <a href="shop"{{ nav_active($page, 'shop') }}>Token Shop</a>
                <a href="projects"{{ nav_active($page, 'projects') }}>Projects</a>
                <a href="players"{{ nav_active($page, 'players') }}>Players</a>
                <a href="leaderboards"{{ nav_active($page, 'leaderboards') }}>Leaderboards</a>
                <span class="divider"></span>
                @if(Auth::check())
                    <button type="button" class="btn btn-sm btn-user">
                        <img src="https://crafatar.com/avatars/{{ Auth::user()->uuid }}?size=16&overlay&default=371e57a02c0e4875ab952373447b63db" alt="{{ Auth::user()->username }}">
                    </button>
                @else
                    <a href="login" class="btn btn-user">
                        <img src="https://crafatar.com/avatars/371e57a02c0e4875ab952373447b63db?size=16&overlay" alt="Guest">
                    </a>
                @endif
                </button>
                <button type="button" class="btn btn-sm btn-cart"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button>
            </nav>
        </div>
        @if($page == 'home')
            <div class="hero container">
                <div class="col-sm-8 col-sm-offset-2">
                    <h3>We are TeamAbsolute</h3>
                    <h2>Build Great Things</h2>
                    <p>We're a Creative Minecraft server with a fantastic build team called TeamAbsolute. We also host unique survival worlds and exclusive games like Adapt and BuildIt!</p>
                    <a href="apply" class="btn btn-primary btn-lg">Join the team</a>
                </div>
            </div>
        @endif
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <img src="{{ asset('img/avatar.png') }}" alt="AbsoluteCraft Avatar" class="logo">
            <nav class="nav col-sm-4">
                <a href="support">Support</a>
                <a href="rules">Rules</a>
                <a href="status">Status</a>
                <a href="staff">Staff</a>
            </nav>
            <nav class="nav col-sm-4">
                <a href="terms">Terms of Service</a>
                <a href="privacy">Privacy Policy</a>
            </nav>
        </div>
    </footer>

    <div class="sticky-status online">
        <p>Server online</p>
        <span class="fa fa-check-circle-o" aria-hidden="true"></span>
    </div>
</body>
</html>
