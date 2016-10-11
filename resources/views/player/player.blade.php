@extends('layouts.master', ['page' => 'player', 'title' => $player->username])

@section('content')
    <main class="player">
        <div class="container">
            <div class="player-headings">
                <div class="player-heading col-md-6">
                    <figure class="player-render" style="background-image: url({{ assets('profile-backgrounds/' . $player->background->url) }})">
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
                                <img src="{{ assets('tokens.svg') }}" alt="Stack of Tokens">
                                {{ $player->tokens }} Tokens
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
                <h3>Gamemodes</h3><?php // TODO: Dynamic from games table ?>
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