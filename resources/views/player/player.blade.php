@extends('layouts.master', ['page' => 'player', 'title' => $player->username])

@section('content')
    <main class="player">
        <div class="container">
            <div class="player-headings">
                <div class="player-heading col-md-6">
                    <figure class="player-render" style="background-image: url({{ asset('/assets/profile-backgrounds/' . $player->background->url) }})">
                        <img src="{{ player_body($player->uuid) }}" alt="{{ $player->username }}">
                    </figure>
                    <div class="caption">
                        <h1>
                            {{ $player->username }}
                            @if($player->online)
                                <small></small>
                            @endif
                        </h1>
                        <div class="badge badge-{{ $player->rank->name }}">
                            {{ $player->rank->title }}
                        </div>
                    </div>
                </div>
                <div class="player-heading dynmap-grid col-md-6">
                    <figure>
                        <a href="{{ $player->dynmap->url }}">
                            {!! $player->dynmapGrid !!}
                        </a>
                        <p>
                            @if($player->online)
                                Online now<br>
                            @elseif($player->last_seen != null)
                                Last seen: {{ \Carbon\Carbon::parse($player->last_seen->left_at)->diffForHumans() }}<br>
                            @else
                                No location data
                            @endif
                            @if(isset($player->dynmap->worldname))
                                World: {{ $player->dynmap->worldname }}
                            @endif
                        </p>
                    </figure>
                    <span class="fa fa-map-marker"></span>
                    <div class="caption player-quickstats">
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58 58" width="80"><path d="M29 48c-14.36 0-26-2.962-26-6v6.996C3.008 52.032 14.645 55 29 55s25.992-2.968 26-6.004V42c0 3.038-11.64 6-26 6" fill="#E4AF18"/><path d="M26 37c-14.36 0-26-2.962-26-6v6.996C.008 41.032 11.645 44 26 44s25.992-2.968 26-6.004V31c0 3.038-11.64 6-26 6" fill="#F4BF1A"/><path d="M32 26c-14.36 0-26-2.962-26-6v6.996C6.008 30.032 17.645 33 32 33s25.992-2.968 26-6.004V20c0 3.038-11.64 6-26 6" fill="#E4AF18"/><path d="M52 8.13C52 11.167 40.36 14 26 14S0 11.167 0 8.13C0 5.092 11.64 3 26 3s26 2.092 26 5.13" fill="#FFD949"/><path d="M26 14C11.64 14 0 11.038 0 8v6.996C.008 18.032 11.645 21 26 21s25.992-2.968 26-6.004V8c0 3.038-11.64 6-26 6" fill="#F4BF1A"/><path d="M4 11.074v6.995c.608.223 1.274.44 2 .645V11.72c-.726-.207-1.392-.423-2-.646M46 11.72v6.995c.726-.206 1.392-.422 2-.646v-6.996c-.608.224-1.274.44-2 .645M9 12.445v6.997c.64.133 1.307.26 2 .378v-6.997c-.693-.12-1.36-.245-2-.378M41 12.823v6.998c.693-.12 1.36-.245 2-.378v-6.997c-.64.133-1.307.26-2 .378M14 13.27v6.997c.652.084 1.317.162 2 .232v-7c-.683-.07-1.348-.148-2-.23M36 13.502V20.5c.683-.07 1.348-.15 2-.232v-7c-.652.086-1.317.164-2 .234M19 13.76v6.998c.657.046 1.323.087 2 .12v-7c-.677-.033-1.343-.073-2-.12M31 13.878v7c.677-.033 1.343-.074 2-.12v-7c-.657.047-1.323.087-2 .12M26 14c-.335 0-.668-.003-1-.006v7c.332.003.665.006 1 .006s.668-.003 1-.006v-7c-.332.003-.665.006-1 .006" fill="#DCA815"/><path d="M10 23.074v6.995c.608.223 1.274.44 2 .645V23.72c-.726-.207-1.392-.423-2-.646M52 23.72v6.995c.726-.206 1.392-.422 2-.646v-6.996c-.608.224-1.274.44-2 .645M15 24.445v6.997c.64.133 1.307.26 2 .378v-6.997c-.693-.12-1.36-.245-2-.378M47 24.823v6.998c.693-.12 1.36-.245 2-.378v-6.997c-.64.133-1.307.26-2 .378M20 25.27v6.998c.652.084 1.317.162 2 .232v-6.998c-.683-.07-1.348-.15-2-.232M42 25.5v7c.683-.07 1.348-.15 2-.232V25.27c-.652.084-1.317.162-2 .23M25 25.76v6.998c.657.046 1.323.087 2 .12v-7c-.677-.033-1.343-.073-2-.12M37 25.878v7c.677-.033 1.343-.074 2-.12v-7c-.657.047-1.323.087-2 .12M32 26c-.335 0-.668-.003-1-.006v7c.332.003.665.006 1 .006s.668-.003 1-.006v-7c-.332.003-.665.006-1 .006" fill="#C49214"/><path d="M4 34.074v6.995c.608.223 1.274.438 2 .645V34.72c-.726-.207-1.392-.423-2-.646M46 34.72v6.995c.726-.206 1.392-.422 2-.646v-6.996c-.608.224-1.274.44-2 .645M9 35.445v6.997c.64.133 1.307.26 2 .378v-6.997c-.693-.12-1.36-.245-2-.378M41 35.823v6.998c.693-.12 1.36-.245 2-.378v-6.997c-.64.133-1.307.26-2 .378M14 36.27v6.998c.652.084 1.317.162 2 .232v-6.998c-.683-.07-1.348-.15-2-.232M36 36.5v7c.683-.07 1.348-.15 2-.232V36.27c-.652.084-1.317.162-2 .23M19 36.76v6.998c.657.046 1.323.087 2 .12v-7c-.677-.033-1.343-.073-2-.12M31 36.878v7c.677-.033 1.343-.074 2-.12v-7c-.657.047-1.323.087-2 .12M26 37c-.335 0-.668-.003-1-.006v7c.332.003.665.006 1 .006s.668-.003 1-.006v-7c-.332.003-.665.006-1 .006" fill="#DCA815"/><path d="M7 45.074v6.995c.608.223 1.274.438 2 .645V45.72c-.726-.207-1.392-.423-2-.646M49 45.72v6.995c.726-.206 1.392-.422 2-.646v-6.996c-.608.224-1.274.44-2 .645M12 46.445v6.997c.64.133 1.307.26 2 .378v-6.997c-.693-.12-1.36-.245-2-.378M44 46.823v6.998c.693-.12 1.36-.245 2-.378v-6.997c-.64.133-1.307.26-2 .378M17 47.27v6.998c.652.084 1.317.162 2 .232v-6.998c-.683-.07-1.348-.15-2-.232M39 47.5v7c.683-.07 1.348-.15 2-.232V47.27c-.652.084-1.317.162-2 .23M22 47.76v6.998c.657.046 1.323.087 2 .12v-7c-.677-.033-1.343-.073-2-.12M34 47.878v7c.677-.033 1.343-.074 2-.12v-7c-.657.047-1.323.087-2 .12M29 48c-.335 0-.668-.003-1-.006v7c.332.003.665.006 1 .006s.668-.003 1-.006v-7c-.332.003-.665.006-1 .006" fill="#C49214"/><path d="M51.212 39.372C48.372 41.87 38.162 44 26 44c-9.51 0-17.823-1.303-22.356-3.065-.417.378-.644.778-.644 1.195C3 45.168 14.64 48 29 48s26-2.832 26-5.87c0-1.047-1.385-1.983-3.788-2.758" fill="#FCC62D"/><path d="M32 33c-13.213 0-24.116-2.515-25.774-5.283C2.346 28.597 0 29.767 0 31.13 0 34.167 11.64 37 26 37s26-2.833 26-5.87c0-.134-.03-.265-.075-.395C47.155 32.077 40.002 33 32 33" fill="#FFD949"/><path d="M50.993 16.55C47.883 18.97 37.873 21 26 21c-7.668 0-14.56-.848-19.318-2.1-.44.39-.682.8-.682 1.23C6 23.168 17.64 26 32 26s26-2.832 26-5.87c0-1.452-2.663-2.687-7.007-3.58" fill="#FCC62D"/></svg>
                                515 Tokens
                            </li>
                            <li>
                                Joined {{ \Carbon\Carbon::parse($player->first_joined)->toFormattedDateString() }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="bio col-md-6">
                    <h3>Bio</h3>
                    <div class="well">
                        @if($player->user && $player->user->bio != null)
                            {!! nl2br($player->user->bio) !!}
                        @else
                            This player has not set their bio.
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Stats</h3>
                    <table class="table table-striped">
                        <tr>
                            <td>Rank</td>
                            <td><span class="text-{{ $player->rank->name }}">{{ $player->rank->title }}</span></td>
                        </tr>
                        <tr>
                            <td>Balance</td>
                            <td>#{{ $player->balance }}</td>
                        </tr>
                        @if($player->user)
                            @if($player->user->location != null && $player->user->public_location == true)
                                <tr>
                                    <td>Location</td>
                                    <td><img src="{{ asset('img/flags/' . strtoupper($player->user->location) . '.png') }}" alt="{{ strtoupper($player->user->location) }}"></td>
                                </tr>
                            @endif
                            @if($player->user->dob != null && $player->user->public_dob == true)
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{ \Carbon\Carbon::parse($player->user->dob)->format('F j, Y') }}</td>
                                </tr>
                            @endif
                            @if($player->user->gender != null && $player->user->public_gender == true)
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $player->user->gender == 'F' ? 'Female' : 'Male' }}</td>
                                </tr>
                            @endif
                        @endif
                    </table>
                </div>
            </div>
            <div class="stats">
                <h3>Gamemodes</h3>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="thumbnail">
                            <img src="{{ asset('img/rpg-aerial.jpg') }}" alt="AbsoluteRPG">
                            <div class="caption">
                                <h4>AbsoluteRPG</h4>
                                <p>300 points</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop