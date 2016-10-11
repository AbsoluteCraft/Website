@extends('layouts.master', ['page' => 'leaderboards', 'title' => 'Leaderboards'])

@section('content')
    <main class="leaderboards">
        <div class="container">
            <div class="row">
                @foreach($games as $game)
                    <div class="col-md-4">
                        <div class="game panel panel-default">
                            <div class="panel-body">
                                <img src="{{ assets('game/' . $game->name . '.jpg') }}" alt="{{ $game->nice_name }}">
                                @if($game->leaderboard)
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
                                                        <td>{{ $playerGame->player->username }}</td>
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
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@stop