@extends('layouts.dashboard', ['page' => 'users', 'title' => 'Users'])

@section('content')
    <main class="dashboard-users">
        <div class="container">
            <h2 class="page-title">Users</h2>
            <table id="table-users" class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Rank</th>
                        <th>Tokens</th>
                        <th>Date Joined</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center"><img src="{{ player_avatar($user->uuid) }}" alt="{{ $user->username }}"></td>
                            <td><a href="{{ route('player', ['player' => $user->username]) }}" target="_blank"><span class="text-{{ $user->rank->name }} usernameFilter">{{ $user->username }}</span></a></td>
                            <td data-order="{{ $user->rank->id }}"><span class="label label-{{ $user->rank->name }}">{{ $user->rank->title }}</span></td>
                            <td>{{ isset($user->player) ? $user->player->tokens : 0 }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @if(Auth::user()->rank->id > $user->rank->id || Auth::user()->rank->name == 'operator')
                                        <a href="{{ route('dashboard.users.get', ['id' => $user->id]) }}" class="btn btn-default">Edit</a>
                                        <a href="#" class="btn btn-info">Tokens</a>
                                    @else
                                        <button disabled class="btn btn-default">Edit</button>
                                        <button disabled class="btn btn-info">Tokens</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop
