@extends('layouts.master', ['page' => 'leaderboards', 'title' => 'Leaderboards'])

@section('content')
    <main class="leaderboards">
        <div class="container">
            <div class="row">
                @foreach($games as $game)
                    <div class="col-md-6 col-lg-4">
                        <div class="game thumbnail">
                            <img src="{{ upload('games/' . $game->name . '.jpg') }}" alt="{{ $game->nice_name }}">
                            <div class="caption">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($game->leaderboard->count() > 0)
                                            @foreach($game->leaderboard as $playerGame)
                                                <tr>
                                                    <td><a href="{{ route('player', ['username' => $playerGame->player->username]) }}">{{ $playerGame->player->username }}</a></td>
                                                    <td class="text-right">{{ $playerGame->points }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2" class="text-center">No players found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@stop