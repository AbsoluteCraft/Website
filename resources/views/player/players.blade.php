@extends('layouts.master', ['page' => 'players', 'title' => 'Players'])

@section('content')
    <main class="players">
        <div class="player-strap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Join {{ $playerCount }} player{{ $playerCount != 1 ? 's' : '' }}!</h1>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('player.search') }}" method="get" class="form-inline">
                            <input type="text" name="username" class="form-control" placeholder="Search for a player by username..." maxLength="16">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row players">
                <div class="col-md-4">
                    @if(isset($staff['operator']) && count($staff['operator']))
                        <h2 class="title">Operators</h2>
                        <section class="operators">
                            @foreach($staff['operator'] as $player)
                                <a href="{{ route('player', ['name' => $player->username]) }}">
                                    <img src="https://crafatar.com/avatars/{{ $player->username }}?size=24&amp;default=https%3A%2F%2Fcrafatar.com%2Favatars%2FTeamAbsolute%3Fsize%3D24" width="24" alt="{{ $player->username }}" data-toggle="tooltip" title="{{ $player->username }}">
                                </a>
                            @endforeach
                        </section>
                    @endif
                    @if(count($staff['moderator']))
                        <h2 class="title">Moderators</h2>
                        <section class="moderators">
                            @foreach($staff['moderator'] as $player)
                                <a href="{{ route('player', ['name' => $player->username]) }}">
                                    <img src="https://crafatar.com/avatars/{{ $player->username }}?size=24&amp;default=https%3A%2F%2Fcrafatar.com%2Favatars%2FTeamAbsolute%3Fsize%3D24" width="24" alt="{{ $player->username }}" data-toggle="tooltip" title="{{ $player->username }}">
                                </a>
                            @endforeach
                        </section>
                    @endif
                    @if(count($staff['builder']))
                        <h2 class="title">Builders</h2>
                        <section class="builders">
                            @foreach($staff['builder'] as $player)
                                <a href="{{ route('player', ['name' => $player->username]) }}">
                                    <img src="https://crafatar.com/avatars/{{ $player->username }}?size=24&amp;default=https%3A%2F%2Fcrafatar.com%2Favatars%2FTeamAbsolute%3Fsize%3D24" width="24" alt="{{ $player->username }}" data-toggle="tooltip" title="{{ $player->username }}">
                                </a>
                            @endforeach
                        </section>
                    @endif
                </div>
                <div class="col-md-8">
                    <h2 class="title">Latest Players</h2>
                    <section class="players">
                        @if(count($players) > 0)
                            @foreach($players as $player)
                                <a href="{{ route('player', ['name' => $player->username]) }}">
                                    <img src="https://crafatar.com/avatars/{{ $player->username }}?size=24&amp;default=https%3A%2F%2Fcrafatar.com%2Favatars%2FTeamAbsolute%3Fsize%3D24" width="24" alt="{{ $player->username }}" data-toggle="tooltip" title="{{ $player->username }}">
                                </a>
                            @endforeach
                        @else
                            <p>No recent players!</p>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </main>
@stop